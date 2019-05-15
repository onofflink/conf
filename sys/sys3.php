

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


	echo "<tr>";
	echo "<td class='systb1'>DB SERVER</td>";
	echo "<td class='systb2'>" . $mysqld . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>WEB SERVER</td>";
	echo "<td class='systb2'>" . $httpd . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>CALL SERVER</td>";
	echo "<td class='systb2'>" . $asterisk . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>SSH</td>";
	echo "<td class='systb2'>" . $sshd . "</td>";
	echo "</tr>";

/*
	echo "<tr>";
	echo "<td class='systb1'>SIP PING</td>";
	echo "<td class='systb2'>" . $sip . "</td>";
	echo "</tr>";
*/

?>
