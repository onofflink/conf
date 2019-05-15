<?php
$fname='/spool/asterisk/monitor/' . $_GET['fname'];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>녹음 청취</title>

</head>
<body>
<div id="bodyObject" style="overflow:hidden">
	<div id="Pop_title">
		<h3>
			<span>녹음 청취</span>
		</h3>
	</div>
	<div id="PopupWrap">
		<div id="Popup">
			<div id="tablearea">
<!-- http://121.78.118.17/spool/asterisk/monitor/<%//=request.getParameter("fname")%> -->
<!--[if IE]>
					<OBJECT ID="MediaPlayer1" WIDTH=290 HEIGHT=72 CLASSID="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" standby="Loading Microsoft?Windows?Media Player components..." type="application/x-oleobject">
						<PARAM NAME="transparentAtStart" VALUE="True">
						<PARAM NAME="transparentAtStop" VALUE="True">
						<PARAM NAME="AnimationAtStart" VALUE="False">
						<PARAM NAME="AutoStart" VALUE="True">
						<PARAM NAME="AutoRewind" VALUE="true">
						<PARAM NAME="SendMouseClickEvents" VALUE="True">
						<PARAM NAME="DisplaySize" VALUE="0">
						<PARAM NAME="AutoSize" VALUE="False">
						<PARAM NAME="ShowDisplay" VALUE="False">
						<PARAM NAME="ShowStatusBar" VALUE="True">
						<PARAM NAME="ShowControls" VALUE="True">
						<PARAM NAME="ShowTracker" VALUE="True">
						<param name="Filename" value="<%=temp%>/spool/asterisk/monitor/<%=request.getParameter("fname")%>">  
						<PARAM NAME="Enabled" VALUE="1">
						<PARAM NAME="Loop" VALUE="True">
						<PARAM NAME="EnableContextMenu" VALUE="0">
						<PARAM NAME="EnablePositionControls" VALUE="1">
						<PARAM NAME="EnableFullScreenControls" VALUE="1">
						<PARAM NAME="ShowPositionControls" VALUE="1">
						<PARAM NAME="Mute" VALUE="0">
						<PARAM NAME="Rate" VALUE="1">
						<PARAM NAME="SAMILang" VALUE="">
						<PARAM NAME="SAMIStyle" VALUE="">
						<PARAM NAME="SAMIFileName" VALUE="">

					</OBJECT> 
<!--<![endif]-->	
<!--[if !IE]>-->
<object type="video/x-ms-wmv" data="<?php echo $fname?>" width="290" height="52" id="theplayer"> 
<param name="src" value="<?php echo $fname?>" /> 
<param name="autostart" value="true" /> 
<param name="controller" value="true" /> 
<param name="Volume" value="100" /> 
<embed volume="100" controller="true" autostart="true" src="<?php echo $fname?>"> 
</object>
<!--<![endif]-->			
			</div>
		</div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">self.focus();</script>