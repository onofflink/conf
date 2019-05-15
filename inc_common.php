<?php

$cookie_domain = "";

// 쿠키변수 생성
function set_cookie($cookie_name, $value, $expire)
{
	global $cookie_domain;
    setcookie(md5($cookie_name), base64_encode($value), time() + (60 * 60 * 24 * $expire), '/', $cookie_domain);
}

// 쿠키변수값 얻음
function get_cookie($cookie_name)
{
    return base64_decode($_COOKIE[md5($cookie_name)]);
}


// 페이지 이동
function goto_url($url)
{
    echo "<script type='text/javascript'> location.replace('$url'); </script>";
    exit;
}
// 페이지 이동
function goto_top_url($url)
{
    echo "<script type='text/javascript'> parent.location.replace('$url'); </script>";
    exit;
}
// 얼럿 창 
function alert($msg='', $url='',$opener='')
{
    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';
    
    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=euc-kr\">";
    echo "<script type='text/javascript'>alert('$msg');";
	if($opener==1)
		echo "opener.document.location.reload();";

	if (!$url)
            echo "history.go(-1);";
            echo "</script>";
    if ($url)
            goto_url($url);
    exit;
}

function alert_close($msg='', $url='')
{
    if (!$msg) $msg = '올바른 방법으로 이용해 주십시오.';
    
    echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=euc-kr\">";
    echo "<script type='text/javascript'>alert('$msg');";
    if (!$url){            
			echo "opener.document.location.reload();";
			echo "window.close();";
	}
            echo "</script>";
    if ($url)
            goto_url($url);
    exit;
}

/*
function auth($_SESSION){
	$auth = $_SESSION;
	return $auth;
}
*/

?>