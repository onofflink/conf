<?php
	
	//$hostsipaddress = str_replace("\n","",shell_exec("ifconfig eth0 | grep 'inet addr' | awk -F':' {'print $2'} | awk -F' ' {'print $1'}"));

	$ip = str_replace("\n","",shell_exec("cat /etc/sysconfig/network-scripts/ifcfg-eth0 | grep 'IPADDR' | awk -F'=' {'print $2'}"));
	$mask = str_replace("\n","",shell_exec("cat /etc/sysconfig/network-scripts/ifcfg-eth0 | grep 'SUBNET' | awk -F'=' {'print $2'}"));
	$gw = str_replace("\n","",shell_exec("cat /etc/sysconfig/network-scripts/ifcfg-eth0 | grep 'GATEWAY' | awk -F'=' {'print $2'}"));

	$dns = str_replace("","",shell_exec("cat /etc/resolv.conf | grep 'nameserver' | awk -F' ' {'print $2'} | awk -F' ' {'print $1'}"));

	$mac = str_replace("\n","",shell_exec("ifconfig eth0 | grep 'ether' | awk -F' ' {'print $2'}"));

	$sip = "200 Channels";

/*
	echo $ip . "<br>";
	echo $mask . "<br>";
	echo $gw . "<br>";
	echo $dns . "<br>";
	echo $mac . "<br>";
	echo $sip . "<br>";
*/

	echo "<tr>";
	echo "<td class='systb1'>IP</td>";
	echo "<td class='systb2'>" . $ip . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>SUBNET</td>";
	echo "<td class='systb2'>" . $mask . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>GATEWAY</td>";
	echo "<td class='systb2'>" . $gw . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>DNS</td>";
	echo "<td class='systb2'>" . $dns . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>MAC</td>";
	echo "<td class='systb2'>" . $mac . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>SIP</td>";
	echo "<td class='systb2'>" . $sip . "</td>";
	echo "</tr>";

?>

