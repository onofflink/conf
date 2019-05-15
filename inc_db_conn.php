<?php
session_start();
//ini_set('date.timezone', 'Asia/Seoul'); 
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'ks8899!@';
$mysql_db = 'conference';

$connect_db = mysql_connect($mysql_host, $mysql_user, $mysql_password);
$select_db = mysql_select_db($mysql_db, $connect_db);


mysql_query("set session character_set_connection=euckr;");
mysql_query("set session character_set_results=euckr;");
mysql_query("set session character_set_client=euckr;");

/*
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");
*/


if (!$select_db) 
die("<meta http-equiv='content-type' content='text/html; charset=euc-kr'><script language='JavaScript'> alert('DB 접속오류'); </script>");
?>