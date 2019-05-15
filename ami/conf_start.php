<?php
	header("Access-Control-Allow-Origin: *");

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = 'ks8899!@';
	$mysql_db = 'conference';

	$connect_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
	$select_db = mysql_select_db($mysql_db, $connect_db);

	if (!$select_db) {
		echo "RET-ERROR-DBCONNECT";
		exit;
	}

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
		// 다이얼링 ...
		$sql = "select user_idx,replace(cid,'-','') from cfr_mon_2 where conf_idx='" . $confidx . "' and chan='' and level>3";
		$result = mysql_query($sql);
		for($i=0;$row=mysql_fetch_array($result);$i++){
			$useridx = $row[0];
			
			//$url="http://localhost/conf/ami/req_acs.php?useridx=" . $useridx;
			$url="http://localhost/conf/ami/act_dial.php?useridx=" . $useridx;
			$ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_HEADER, TRUE); 
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
            $head = curl_exec($ch); 
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
            curl_close($ch); 

			//echo $url.'<br>';
			//echo $head.'<br>';
			//echo $httpCode.'<br>';

			//sleep(1);
		}

		if($i==0) 
			echo "ERROR: No Data";
		else
			echo $i . "콜 다이얼 하였습니다.";
	}
	else {
		echo "ERROR: confidx";
	}
		


	mysql_close($connect_db);

?>