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


	$ccode ="cnt";
	$mngid ="mng1";

	//$szTel = $_GET['tel'];
	$szTel = $telnum;

	if(!$szTel) {
		echo "ERROR: RET-ERROR-PARAMETER(tel)";
		exit;
	}

	//$szDiv = $_GET['div'];
	$szDiv = '1';
	if(!$szDiv) {
		echo "ERROR: RET-ERROR-PARAMETER(div)";
		exit;
	}


	

	


	$rst = mysql_fetch_array(mysql_query("select * from acs_cfg where idx='1'"));

	if($szDiv=="1") {
		$szConRetry = $rst['con_retry'];
		$szConTime = $rst['con_time'];
		$szConWait = $rst['con_wait'];
		$szConCid = $rst['con_cid'];
	}

	else if($szDiv=="2") {
		$szConRetry = $rst['con_retry2'];
		$szConTime = $rst['con_time2'];
		$szConWait = $rst['con_wait2'];
		$szConCid = $rst['con_cid2'];
	}

	else {
		echo "ERROR: RET-ERROR-PARAMETER(div)";
		exit;
	}

	$szNow = date("Y-m-d H:i:s");
	$szFname = substr($szNow,0,4) . substr($szNow,5,2) . substr($szNow,8,2) . "_" . substr($szNow,11,2) . substr($szNow,14,2) . substr($szNow,17,2) . "_" . $szTel;

	$rst2 = mysql_fetch_array(mysql_query("select count(*) as cnt from acs_log where cid = '".$szTel."' and timestart = '".$szNow."'"));
	if ($rst2['cnt']>0) {
		echo "ERROR: RET-ERROR-DUPLICATION";
		exit;
	}
	

	$sql  = "insert into acs_log(custcode,tcode,cid,divinout,divcall,timestart,recfile,retry_max,call_cnt) values(";
	$sql .= "'".$ccode."','".$mngid."','".$szTel."'";
	$sql .= ",'" . $szDiv . "','1','".$szNow."','".$szFname."','". $szConRetry . "','0')";
	mysql_query($sql);

	$myKey = mysql_insert_id();

	//echo $sql."<br>";
	//echo $szNow."<br>";
	//echo $szFname."<br>";

	//echo "OK";
	//exit;

/*

Channel: SIP/TRK_45097482/01082055960
CallerID: 07011112222
MaxRetries: 1
RetryTime: 30
WaitTime: 10
Context: cnt-acs
Extension: 1111-key
Priority: 2
Archive: Yes
Set: PassedInfo=1111-key

*/

	
	
	

	$szFile = "/var/spool/asterisk/outgoing_tmp/" . $szFname . ".call";
	$szDest = "/var/spool/asterisk/outgoing/" . $szFname . ".call";

	// 키 : 멘트구분 + 전화번호
	$szData = $szDiv . "-" . $szNow . "-" . $szTel;

	$fp = fopen($szFile,"w");

	if($fp) {
		fputs($fp, "Channel: SIP/T_07045097486/" . $szTel);
		fputs($fp, "\n"."CallerID: " . $szConCid);
		fputs($fp, "\n"."MaxRetries: " . $szConRetry);
		fputs($fp, "\n"."RetryTime: " . $szConTime);
		fputs($fp, "\n"."WaitTime: " . $szConWait);
		fputs($fp, "\n"."Context: " . "req-acs");
		fputs($fp, "\n"."Extension: s");
		fputs($fp, "\n"."Priority: 2");
		fputs($fp, "\n"."Archive: Yes");
		fputs($fp, "\n"."Set: Key=" . $myKey);
		fputs($fp, "\n"."Set: UserIdx=" . $useridx);
		fputs($fp, "\n"."Set: Data=" . $szData ."\n");

		fclose($fp);

		
		if(file_exists($szFile)) { 
			if(!copy($szFile, $szDest)) { 
				echo "ERROR: RET-ERROR-COPY";
				exit;
			}
			else {	  
				if (file_exists($szDest)) { 
					if(!@unlink($szFile)){ 
						echo "ERROR: RET-ERROR-DELETE";
						exit;
					} 
					else {

						$query = "update cfr_mon_2 set k_con='calling' where user_idx='" . $useridx . "'";
						mysql_query($query);

						echo "SUCCESS"; 
						//echo "RET-SUCCESS-" . $myKey; 
					}
				}
				else {
					echo "ERROR: RET-ERROR-MOVE";
					exit;
				}
			}
		 } 

	}
	else {
		echo "ERROR: RET-ERROR-OPEN";
	}

	mysql_close($connect_db);

?>