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

$roomnum = $_GET['roomnum'];

$query = "select cf_num from cfr_mon_1 where room_num='" . $roomnum . "'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row) {
	$confidx=$row['cf_num'];
}

if($confidx) {
	// 채널 종료
	$sql = "select chan from cfr_mon_2 where conf_idx='" . $confidx . "' and chan<>''";
	$result = mysql_query($sql);
	for($i=0;$row=mysql_fetch_array($result);$i++){
		$myChannel = $row[0];

		$manager_host = "127.0.0.1";
		$manager_user = "usrami";
		$manager_pass = "sc8899";
		$manager_port = "5038";
		$manager_connection_timeout = 30;
		$fp = fsockopen($manager_host, $manager_port, $errno, $errstr, $manager_connection_timeout);
		if ($fp) {
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
				
				$loginresponse = trim(substr($response,9));
				if ($loginresponse == "Authentication accepted") {
					$checkpeer = "Action: Redirect\r\n";
					$checkpeer .= "Channel: " . $myChannel . "\r\n";
					$checkpeer .= "Exten: confend" . "\r\n";  
					$checkpeer .= "Context: inb_redirect" . "\r\n";
					$checkpeer .= "Priority: 1" . "\r\n";
					$checkpeer .= "\r\n";

					//echo $checkpeer;

					fwrite($fp,$checkpeer);
					$line = trim(fgets($fp));
				}
			}
		}
		fclose($fp);

		//$url = "php /var/www/html/conf/ami/confend_ch.php?chan=" . $row[0];
		//$ret = exec($url);
		//echo $url. "\n". $ret;
	}

	$query = "update acc_conf set enddate=now() where idx='" . $confidx . "'";
	mysql_query($query);

	$query = "delete from cfr_mon_1 where cf_num='" . $confidx . "'";
	//mysql_query($query);

	$query = "delete from cfr_mon_2 where conf_idx='" . $confidx . "'";
	//mysql_query($query);

	echo "SUCCESS";
}
else {
	echo "ERROR - 회의번호 오류";
}

mysql_close($connect_db);

?>