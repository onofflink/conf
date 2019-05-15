<?php

header("Access-Control-Allow-Origin: *");

/*
function json_encode($data) {
	switch ($type = gettype($data)) {
		case 'NULL':
			return 'null';
		case 'boolean':
			return ($data ? 'true' : 'false');
		case 'integer':
		case 'double':
		case 'float':
			return $data;
		case 'string':
			return '"' . addslashes($data) . '"';
		case 'object':
			$data = get_object_vars($data);
		case 'array':
			$output_index_count = 0;
			$output_indexed = array();
			$output_associative = array();
			foreach ($data as $key => $value) {
				$output_indexed[] = json_encode($value);
				$output_associative[] = json_encode($key) . ':' . json_encode($value);
				if ($output_index_count !== NULL && $output_index_count++ !== $key) {
					$output_index_count = NULL;
				}
			}
			if ($output_index_count !== NULL) {
				return '[' . implode(',', $output_indexed) . ']';
			} else {
				return '{' . implode(',', $output_associative) . '}';
			}
		default:
			return ''; // Not supported
	}
}
*/



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
	die("ERROR: DB Connext");


$roomnum = $_GET['roomnum'];


$query = "select music_yn from cfr_mon_1 where room_num='" . $roomnum . "'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row) {
	$music_yn=$row['music_yn'];
}

?>

<?php
/* ============================ */
/*   PHP Asterisk Peer Status   */
/* ============================ */
/*    (C) 2009 Matt Riddell     */
/*     Daily Asterisk News      */
/* www.venturevoip.com/news.php */
/*      Public domain code      */
/* ============================ */

/* Connection details */
$manager_host = "127.0.0.1";
$manager_user = "usrami";
$manager_pass = "sc8899";

/* Default Port */
$manager_port = "5038";

/* Connection timeout */
$manager_connection_timeout = 30;

/* Connect to the manager */
$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
if ($fp) {

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

	//$query = "delete from mon_peers";
	//mysql_query($query);

    if (substr($response,0,9) == "Message: ") {
        /* We have got a response */
        $loginresponse = trim(substr($response,9));
        if (!$loginresponse == "Authentication Accepted") {
            echo "ERROR : Unable to log in: $loginresponse";
            fclose($fp);
            exit(0);
        } else {
            

			if ($music_yn=="N") {
				$result  = "Action: "	. "Originate" . "\r\n";
				$result .= "Channel: "	. "Local/do_play@amusic" . "\r\n";
				$result .= "Exten: do_spy" . "\r\n";
				$result .= "Context: amusic" . "\r\n";
				$result .= "Priority: 1" . "\r\n";
				$result .= "Variable: CfMC_ActionID=PlayBack" . "\r\n";
				//$result .= "Variable: CfMC_WhatToPlay=custom/ament/" . $_GET['ext'] . "-0" . $_GET['ment'] . "\r\n";
				$result .= "Variable: CfMC_WhoHear=" . $myChannel . "\r\n";
				$result .= "Variable: CfMC_Room=" . $roomnum . "\r\n";
				$result .= "ActionID: PlayBack" . "\r\n";
				$result .= "Async: true" . "\r\n";

				$result .= "\r\n";

				fwrite($fp,$result);

				echo "SUCCESS";
			}

			else if ($music_yn=="Y") {
				$checkpeer = "Action: command\r\n";
				$checkpeer .= "Command: meetme list $roomnum\r\n";
				$checkpeer .= "\r\n";
				fwrite($fp,$checkpeer);
				
				while ($line != "--END COMMAND--") {
					$line = trim(fgets($fp));
					//echo $line . "<br>";

					$p= preg_split('/ /', $line,-1,PREG_SPLIT_NO_EMPTY);
					//echo 'p0:' . $p[0] . "<br>";

					if ($p[0] == 'User') {
						$line_id =  $p[2];
						$line_ch =  $p[7];

						if(substr($line_ch,0,6) == "Local/") {
							$my_id = $line_id;
							break;
						}
					}
				}

				if($my_id) {
					$checkpeer = "Action: command\r\n";
					$checkpeer .= "Command: meetme kick $roomnum $my_id\r\n";
					$checkpeer .= "\r\n";
					fwrite($fp,$checkpeer);

					$query = "update cfr_mon_1 set music_yn='N' where room_num='" . $roomnum . "'";
					mysql_query($query);
					

					echo "SUCCESS";
				}
				else
					echo "ERROR: 음악 재생정보가 없습니다.";
			}

			mysql_close($connect_db);
           
        }
    } else {
        echo "ERROR: Unexpected response: $response";
        fclose($fp);
        exit(0);
    }
}


?>