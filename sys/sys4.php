

<?php
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


	echo "<tr>";
	echo "<td class='systb1'>IN User</td>";
	echo "<td class='systb2'>" . $c_cnt . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>WEB User</td>";
	echo "<td class='systb2'>" . $w_cnt . "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td class='systb1'>Recording</td>";
	echo "<td class='systb2'>" . $r_cnt . "</td>";
	echo "</tr>";

?>