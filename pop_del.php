<?php

include_once "inc_db_conn.php";
//include_once "inc_common.php";

	$filePath = $_GET['fname'];
	$file = "/var/spool/asterisk/monitor/".$filePath;

	//echo $file;

	/* $file 에 저장된 이미지가 있으면 삭제한다 */
	if(is_file($file))
	{ 
		unlink($file); 
		$msg = "녹음파일이 삭제 되었습니다.";
	}
	else {
		$msg = "녹음파일이 없습니다.";
	}

	$qry="update cfr_recfile set play_name='' ";
    $qry.=" where play_name='".$filePath."'";
    mysql_query($qry);

	//echo $qry;


	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=euc-kr\">";
	echo "<script type='text/javascript'>alert('$msg');";
	echo "opener.document.location.reload();";
	echo "window.close();";
    echo "</script>";


?>