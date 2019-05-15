
<?php
	//$mb = auth($_SESSION);
	$mb['pcode'] = get_cookie('pcode');
	$mb['login_id'] = get_cookie('login_id');
	$mb['login_name'] = get_cookie('login_name');
	$mb['login_level'] = get_cookie('login_level');
	$mb['login_levelname'] = get_cookie('login_levelname');

	if(!$mb['login_id']) goto_url("./login.php");

	$main1="off";
	$main2="off";
	$main3="off";
	$main4="off";
	$main5="off";


	$menu1="off";
	$menu2="off";
	$menu3="off";
	$menu4="off";
	$menu5="off";
	$menu6="off";
	$menu7="off";
	$menu8="off";
	$menu9="off";

?>

<!doctype html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Expires" content="0"/>
<meta http-equiv="Imagetoolbar" content="no">
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta http-equiv="Pragma" content="no-cache"/>
<title>▦ 컨퍼런스콜 시스템 ▦</title>
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" /> 

<?php 
	$characters = '0123456789';$charactersLength = strlen($characters);
	$randomString = "";
	for ($i = 0; $i < 5; $i++){$randomString .= $characters[rand(0, $charactersLength - 1)];}
?>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/global.js<?php echo '?'.$randomString;?>"></script>
<script type="text/javascript" src="js/tab.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<script>
<?php 
	echo "mon_head();";
	//echo "var v_mon_head=setInterval('mon_head()', 5000);";
?>
</script>
