

<?php
	$t_mysqld = shell_exec("ps -ef | grep mysqld | grep -v grep");
	if($t_mysqld !='') $mysqld="OK";	else $mysqld="ERROR";

	$t_httpd = shell_exec("ps -ef | grep /usr/sbin/httpd | grep -v grep");
	if($t_httpd !='') $httpd="OK";	else $httpd="ERROR";

	$t_asterisk = shell_exec("ps -ef | grep /usr/sbin/asterisk | grep -v grep");
	if($t_asterisk !='') $asterisk="OK";	else $asterisk="ERROR";

	$t_sshd = shell_exec("ps -ef | grep /usr/sbin/sshd | grep -v grep");
	if($t_sshd !='') $sshd="OK";	else $sshd="ERROR";

	//$sip = str_replace("(","",shell_exec("asterisk -rx 'sip show peers' | grep 'T_' | awk -F' ' {'print $6 $7'}"));
	//$sip = str_replace(")","",$sip);

	$sys_st = "정상";
	if($mysqld=="ERROR" || $httpd=="ERROR" || $asterisk=="ERROR" || $sshd=="ERROR" || $sip=="ERROR") {
		$sys_st = "오류";
		$sys_css = " style='background:red'";
	}

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = 'ks8899!@';
	$mysql_db = 'conference';

	$connect_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
	$select_db = mysql_select_db($mysql_db, $connect_db);

	mysql_query("set session character_set_connection=euckr;");
	mysql_query("set session character_set_results=euckr;");
	mysql_query("set session character_set_client=euckr;");

	$c_cnt = "0";
	$query = "select count(*) from cfr_mon_2 where k_con = 'con'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	if($row) {
		$c_cnt=$row[0];
	}

	$w_cnt = "0";
	$query = "select count(*) from mon_web";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	if($row) {
		$w_cnt=$row[0];
	}

	$r_cnt = "0";
	$query = "select count(*) from mon_room";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	if($row) {
		$r_cnt=$row[0];
	}

	mysql_close($connect_db);

/*
					<tr>
						<td>200(접속)/500(최대)</td>
						<td>100(IP)/100(PSTN)</td>
					</tr>
					<tr>
						<td>20(녹취)/50(최대)</td>
						<td>하드웨어 알람</td>
					</tr>
					<tr>
						<td colspan="2">Conference Call V.1.01-001</td>
					</tr>
*/

	echo "<tr>";
	echo "<td>회의 - " . $c_cnt . " / 200</td>";
	echo "<td>웹페이지 - " . $w_cnt . " / 100</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>녹취 - " . $r_cnt . " / 100</td>";
	echo "<td". $sys_css . ">서비스 - " . $sys_st . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td colspan='2'>Conference Call V.1.01-001</td>";
	echo "</tr>";

?>