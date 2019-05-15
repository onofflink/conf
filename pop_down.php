
<?php 
// 파일 Path를 지정합니다.
// id값등을 이용해 Database에서 찾아오거나 GET이나 POST등으로 가져와 주세요.
$filePath = $_GET['fname'];

$file = $_SERVER['DOCUMENT_ROOT']."/spool/asterisk/monitor/".$filePath;


$file_size = filesize($file);
$filename = urlencode($filePath);
// 접근경로 확인 (외부 링크를 막고 싶다면 포함해주세요)
/*
if (!eregi($_SERVER['HTTP_HOST'], $_SERVER['HTTP_REFERER']))
{
echo "<script>alert('외부 다운로드는 불가능합니다.');</script>";
	return;
}
*/

//echo $file;
//exit;

if (is_file($file)) // 파일이 존재하면
{
	// 파일 전송용 HTTP 헤더를 설정합니다.
	if(strstr($HTTP_USER_AGENT, "MSIE 5.5"))
	{
		header("Content-Type: doesn/matter");
		Header("Content-Length: ".$file_size);
		header("Content-Disposition: filename=".$filename);
		header("Content-Transfer-Encoding: binary");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
	else
	{
	Header("Content-type: file/unknown");
	Header("Content-Disposition: attachment; filename=".$filename);
	Header("Content-Transfer-Encoding: binary");
	Header("Content-Length: ".$file_size);
	Header("Content-Description: PHP3 Generated Data");
	header("Pragma: no-cache");
	header("Expires: 0");
	}

/*
	$file_extension="wav";
	switch( $file_extension ) {
		case "pdf": $ctype="application/pdf"; break;
		case "exe": $ctype="application/octet-stream"; break;
		case "zip": $ctype="application/zip"; break;
		case "doc": $ctype="application/msword"; break;
		case "xls": $ctype="application/vnd.ms-excel"; break;
		case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		case "gif": $ctype="image/gif"; break;
		case "png": $ctype="image/png"; break;
		case "jpeg":
		case "jpg": $ctype="image/jpg"; break;
		case "mp3": $ctype="audio/mpeg"; break;
		case "wav": $ctype="audio/x-wav"; break;
		case "mpeg":
		case "mpg":
		case "mpe": $ctype="video/mpeg"; break;
		case "mov": $ctype="video/quicktime"; break;
		case "avi": $ctype="video/x-msvideo"; break;
		case "php":$ctype="application/force-download";break;
		case "htm":
		case "hwp":$ctype="application/force-download";break;
		case "html":
		case 'txt' : $mime = "text/plain"; break;
		// case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
		default: $ctype="application/force-download";
	}
	//header("Content-Type: $ctype");
*/

	header('Content-Type: application/octet-stream');

	ob_clean();
	flush();
	readfile($file);

	//파일을 열어서, 전송합니다.
	//$fp = fopen($file, "rb");
	//if (!fpassthru($fp))
	//fclose($fp);
}
else {
	echo "<script>alert('파일이 존재하지 않습니다.');window.close();</script>";
	return;
}

?>