<?php
$ms['path'] = ".";

include_once "./inc_db_conn.php";
include_once "./inc_common.php";

$mb['login_id'] = get_cookie('login_id');
$nowtime=date("Y-m-d H:i:s");

$query = "insert web_log set id='".$mb['login_id']."', ipaddr='" . $_SERVER['REMOTE_ADDR'] . "', gubun='2', time=now()";
mysql_query($query);

$query = "delete from mon_web where id='".$mb['login_id']."'";
mysql_query($query);

/*
$query = "update log_login set  timeend = '".$nowtime."',timeuse='".$timesec."'";
$query .= " where agtid = '".$mb['login_id']."' and timestart='".$ts_re."'";
$query .= " and divstate='1'";
//echo $query;
mysql_query($query);
//exit;
*/

/*
session_unregister('login_id');
session_unregister('login_name');
session_unregister('login_level');
*/

set_cookie('login_id','',0);

goto_url($ms['path']."/login.php");

?>