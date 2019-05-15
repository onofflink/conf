<?php 
/* ============================ */
/*   PHP Asterisk Peer Status   */
/* ============================ */
/*    (C) 2009 Matt Riddell     */
/*     Daily Asterisk News      */
/* www.venturevoip.com/news.php */
/*      Public domain code      */
/* ============================ */

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'ks8899!@';
$mysql_db = 'conference';

$connect_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
$select_db = mysql_select_db($mysql_db, $connect_db);

mysql_query("set session character_set_connection=euckr;");
mysql_query("set session character_set_results=euckr;");
mysql_query("set session character_set_client=euckr;");

$useridx = $_GET['useridx'];

$query = "select replace(cid,'-','') from cfr_mon_2 where user_idx='" . $useridx . "'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row) {
	$telnum=$row[0];
}

if($telnum=="") {
	echo "ERROR: 전화번호가 없어서 전화연결할 수 없습니다.\n";
	exit(0);
}

$szprefix="";

if(strlen($telnum)==4) {
	$szcid="9494";
}
else {
	$szcid="0437199494";
	$szprefix="5";
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

			/*
			$checkpeer = "Action: Hangup\r\n";
			$checkpeer .= "Channel: $myChannel\r\n";
			$checkpeer .= "\r\n";
			*/

			//$query = "update cfr_mon_2 set k_con='calling' where user_idx='" . $useridx . "'";
			//mysql_query($query);
			//mysql_close($connect_db);

			$checkpeer = "Action: Originate\r\n";
			$checkpeer .= "Channel: SIP/T_LGPBX/" . $szprefix . $telnum . "\r\n";
			$checkpeer .= "Exten: " . $telnum . "\r\n";	
			$checkpeer .= "Context: from-outcall\r\n";	
			$checkpeer .= "Priority: 1\r\n";
			$checkpeer .= "WaitTime: 30\r\n";
			$checkpeer .= "CallerID: " . $szcid . "\r\n";
			$checkpeer .= "\r\n";

			fwrite($fp,$checkpeer);
			//echo $checkpeer . "<br>";
			
			//$line = trim(fgets($fp));
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
