
<!doctype html>
<!doctype html>
<html lang="ko">
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
<script src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<div class="wrap_login">

	<div class="login_box">
		<img src="img/logo.png">
		<br>
		<br>
		<div style="font-size:30px;">▦ 컨퍼런스콜 시스템 ▦</div>
		<div class="login_put">
		<form name='flogin' action='./login_check.php' method='post' onsubmit="return login_check()">
			<input type="text" id=login_id name='login_id' placeholder="아이디 입력" OnKeyDown="EnterCheckEvent(this.value)">
			<input type="password" id=login_pw name='login_pw' placeholder="비밀번호 입력" OnKeyDown="EnterCheckEvent(this.value)">

			<a href="javascript:;" class="btn_login" onclick="document.flogin.submit();">로그인</a>
			
			<!--
			<br>
			<input type='checkbox' id='savechk' value='1' name='save_chk' <?php echo ($savechk==1)?"checked='checked'":""?> />
			<label for='savechk'><span style='font-size:13px;letter-spacing:-1px;position:relative;top:-2px;'>로그인정보 저장</span>
			</label>
			-->
			
		</form>
		</div>
		<span class="login_txt">아이디와 패스워드를 입력하세요.</span>
	</div>

</div>

</body>
</html>



<script type='text/javascript'>

function EnterCheckEvent(val){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		document.flogin.submit();
	}
}

function login_check(){
		
		var fm = document.flogin;

		if(fm.login_id.value==''){
			alert("사용자 아이디를 입력해주세요");
			fm.login_id.focus();
			return false;
		}
		if(fm.login_pw.value==''){
			alert("비밀번호를 입력해주세요");
			fm.login_pw.focus();
			return false;
		}

}

/*
$(document).ready(function(){

	$("#login_box input[type='text'],#login_box input[type='password']").each(function(i){
		
		$value = $(this).val();
		
		if($value)
		$(this).attr('class','input');

	});
	$.noConflict();
	jQuery(document).ready(function(){
		jQuery('.input').defaultValue();
	});	
});

*/


</script>
