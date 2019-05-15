<?php 
/* ============================ */
/*   PHP Asterisk Peer Status   */
/* ============================ */
/*    (C) 2009 Matt Riddell     */
/*     Daily Asterisk News      */
/* www.venturevoip.com/news.php */
/*      Public domain code      */
/* ============================ */




if($_GET['isweb']) {

	if($_GET['isweb']=='1')
		$useridx = $_GET['roomnum'];
	else
		$useridx = $_GET['useridx'];

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = 'ks8899!@';
	$mysql_db = 'conference';

	$connect_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
	$select_db = mysql_select_db($mysql_db, $connect_db);

	mysql_query("set session character_set_connection=euckr;");
	mysql_query("set session character_set_results=euckr;");
	mysql_query("set session character_set_client=euckr;");

	if (!$select_db) 
		die("ERROR: DB Connect");

	// 회의방 전체 처리
	if($_GET['isweb']=='1') {
		$conf_code = $_GET['roomnum'];
		$mode = $_GET['MODE'];

		if ($mode=="ALLLOCKONOFF") {
			$query = "update cfr_mon_1 set lock_yn = IF(lock_yn='Y', 'N', 'Y') where room_num='" . $conf_code . "'";
			mysql_query($query);

			mysql_close($connect_db);
			//echo $query;
			echo "SUCCESS";
			exit(1);
		}
		else {
			$query = "select now_cnt from cfr_mon_1 where room_num='" . $conf_code . "'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			if($row) {
				$now_cnt=$row['now_cnt'];
			}

			if($now_cnt==0) {
				mysql_close($connect_db);
				//echo $query;
				echo "ERROR: 회의방이 없어서 처리할 수 없습니다.";
				exit(1);
			}

			if ($mode=="ALLMUTEONOFF") {
				$query = "select mute_yn from cfr_mon_1 where room_num='" . $conf_code . "'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
				if($row) {
					$mute_yn=$row['mute_yn'];
				}

				if ($mute_yn=="N")
					$mode="ALLMUTE";
				else
					$mode="ALLUNMUTE";
			}
		}
		
		$chan = "";
	}

	// 개인 처리
	else {
		$query = "select conf_idx,chan,k_mute from cfr_mon_2 where user_idx='" . $useridx . "' and chan<>''";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if($row) {
			$confidx=$row['conf_idx'];
			$myChannel=$row['chan'];
			$myMute=$row['k_mute'];
		}
		else
			die("ERROR: 참석자가 통화상태가 아닙니다.");

		$query = "select room_num from cfr_mon_1 where cf_num='" . $confidx . "'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if($row)
			$myRoom=$row['room_num'];
		else
			die("ERROR: 회의정보가 없습니다.");
			//die($query);
			

		$conf_code = $myRoom;
		
		if (($_GET['MODE']=="MUTE")||($_GET['MODE']=="UNMUTE")) {
			if ($myMute=="MUTE")
				$mode = 'UNMUTE';
			else if ($myMute=="UNMUTE")
				$mode = 'MUTE';
		}
		else {
			$mode = $_GET['MODE'];
		}

		$chan = $myChannel;
	}


	mysql_close($connect_db);
}

// 전화로 처리
else {
	$conf_code = $_GET['ROOMNUM'];
	$mode = $_GET['MODE'];
	$chan = $_GET['CHAN'];
}


/* Connection details */
$manager_host = "127.0.0.1";
$manager_user = "usrami";
$manager_pass = "sc8899";

/* Default Port */
$manager_port = "5038";

/* Connection timeout */
$manager_connection_timeout = 30;

//$id = $_GET['ID'];

/* Connect to the manager */
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if (!$fp) {
    echo "There was an error connecting to the manager: $errstr (Error Number: $errno)\n";
} else {
    //echo "-- Connected to the Asterisk Manager" . "<br>";
    //echo "-- About to log in" . "<br>";

    $login = "Action: login\r\n";
    $login .= "Username: $manager_user\r\n";
    $login .= "Secret: $manager_pass\r\n";
    $login .= "Events: Off\r\n";
    $login .= "\r\n";
    fwrite($fp,$login);

    $manager_version = fgets($fp);

    $cmd_response = fgets($fp);

    $response = fgets($fp);

    $blank_line = fgets($fp);

    if (substr($response,0,9) == "Message: ") {
        /* We have got a response */
        $loginresponse = trim(substr($response,9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "-- Unable to log in: $loginresponse\n";
            fclose($fp);
            exit(0);
        } else {
            //echo "-- Logged in Successfully" . "<br>";
			
			$channel = 'Local/' . $conf_code . '@meetmecmd';
			$priority = '1';
			$variable='MCMD_ACT=' . $mode;
			$async='true';

			$checkpeer = "Action: Originate\r\n";
			$checkpeer .= "Channel: $channel\r\n";
			$checkpeer .= "Priority: $priority\r\n";
			$checkpeer .= "Variable: $variable\r\n";
			$checkpeer .= "Variable: MCMD_CH=$chan\r\n";
			$checkpeer .= "Async: $async\r\n";
			
			$checkpeer .= "\r\n";
			fwrite($fp,$checkpeer);
			
			$line = trim(fgets($fp));
			//echo $line . "<br>";
		
			fclose($fp);

			echo "SUCCESS";
		

            
        }
    } else {
        echo "ERROR - Unexpected response: $response\n";
        fclose($fp);
        exit(0);
    }
}
?>