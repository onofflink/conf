<?php

include_once "./inc_db_conn.php";
include_once "./inc_common.php";

$chk = mysql_fetch_array(mysql_query("select * from acc_user where id = '".$_POST['login_id']."' and pwd = '".$_POST['login_pw']."'"));

if($chk['id']) {
	// Admin  Operator  Host  Attendee  Guest
	if($chk['level']=='1')
		$level_name = 'Admin';
	if($chk['level']=='2')
		$level_name = 'Operator';
	if($chk['level']=='3')
		$level_name = 'Host';
	if($chk['level']=='4')
		$level_name = 'Attendee';
	if($chk['level']=='5')
		$level_name = 'Guest';

	$_SESSION['pcode'] = "login";
	$_SESSION['login_id'] = $chk['id'];
	$_SESSION['login_name'] = iconv('euc-kr','utf-8',$chk['name']);
	$_SESSION['login_level'] = $chk['level'];
	$_SESSION['login_levelname'] = $level_name;
	
	set_cookie('pcode',"login",7);
	set_cookie("login_id",$chk['id'],7);
	set_cookie('login_name',iconv('euc-kr','utf-8',$chk['name']),7);
	set_cookie('login_level',$chk['level'],7);
	set_cookie('login_levelname',$level_name,7);
	
	if($_POST['save_chk']){
		set_cookie('a_member_id',$chk['id'],7);
		set_cookie("a_savechk",1,7);
	} else {
		set_cookie('a_member_id','',0);
		set_cookie("a_savechk",0,0);
	}
	
	set_cookie('login_state','1',7);
	set_cookie('login_time',date("Y-m-d H:i:s"),7);
	
	
	$query = "insert web_log set id='".$chk['id']."', ipaddr='" . $_SERVER['REMOTE_ADDR'] . "', gubun='1', time=now()";
	mysql_query($query);

	$query = "delete from mon_web where id='".$chk['id']."'";
	mysql_query($query);

	$query = "insert mon_web set id='".$chk['id']."', login_ip='" . $_SERVER['REMOTE_ADDR'] . "', login_time=now()";
	mysql_query($query);
	
	//alert($chk['name']);
	
	goto_url("./monitor.php?menu=1");
	
} else {
	
	alert('로그인에 실패하였습니다. 다시 로그인해주시기 바랍니다.');	
}

?>