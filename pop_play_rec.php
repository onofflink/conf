<?php

$fname='/conf/spool/asterisk/monitor/' . $_GET['fname'];

?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- main wavesurfer.js lib -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
	<!-- wavesurfer.js timeline -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/plugin/wavesurfer.timeline.min.js"></script>

</head>

<body onresize=fit_size()>

	<title>녹음 파일 청취</title>


	<div id="waveform" style="background-image: url('wave-bg.jpg'); width:330px"></div>
	<div id="waveform-timeline" style="background-color:white;"></div>

	<div style="text-align: left; width:50px; margin-top:10px; float:left">
		<img id="btnPlay" src="wave-play.jpg" onclick="Chg_State();">
	</div>

	<div style="text-align: left; width:150px; margin-top:12px; float:left">
		<label id="lblTime"></label>
	</div>

	<div style="text-align: right; width:130px; margin-top:12px; float:left">
		<img id="btnVol" src="wave-vol.jpg" onclick="Chg_Mute();">
		<input id="rngVol" type="range" min="0" max="100" value="100" style="width: 50px;" onchange="Chg_Volume(this.value);">
	</div>

</body>
</html>


<script type="text/javascript">

var prevVol = 0;
var timeDur = "";

var wavesurfer = WaveSurfer.create({ 
	container: '#waveform', 
	waveColor: '#4bf3a7',
	progressColor: '#efefef',
	cursorColor: 'red',
	cursorWidth: 1.5,
	//barHeight: 3,
	barHeight: 1.5,
	
	//barWidth: '0.1',
	height:  window.outerHeight - 140,
});

wavesurfer.load('<?php echo $fname?>');

wavesurfer.on('ready', function () {

	var timeline = Object.create(WaveSurfer.Timeline);

	timeline.init({
	wavesurfer: wavesurfer,
	container: '#waveform-timeline'
	});

	timeDur = sec_to_min(Math.round(wavesurfer.getDuration()));
	
	wavesurfer.setVolume(1);
	prevVol = 100;
	document.getElementById("btnVol").alt="unmute";

	wavesurfer.play();

	document.getElementById("btnPlay").src="wave-pause.jpg";
	document.getElementById("btnPlay").alt="play";

	//alert(wavesurfer.height);

});


wavesurfer.on('audioprocess', function () {
	var timeCur = sec_to_min(Math.round(wavesurfer.getCurrentTime()))
    document.getElementById("lblTime").innerText = timeCur + " / " + timeDur;
});

wavesurfer.on('seek', function () {
    var timeCur = sec_to_min(Math.round(wavesurfer.getCurrentTime()))
    document.getElementById("lblTime").innerText = timeCur + " / " + timeDur;
});

function Chg_Mute(){
	if(document.getElementById("btnVol").alt=="unmute") {
		wavesurfer.setVolume(0);
		document.getElementById("btnVol").src="wave-mute.jpg";
		document.getElementById("btnVol").alt="mute";
		document.getElementById("rngVol").value="0";
	}
	else {
		document.getElementById("btnVol").src="wave-vol.jpg";
		document.getElementById("btnVol").alt="unmute";
		document.getElementById("rngVol").value=prevVol;
		Chg_Volume(prevVol);
	}
}


function Chg_Volume(newVal){
	wavesurfer.setVolume(newVal/100);
	prevVol = newVal;
	//console.log(newVal/100);

	if(newVal==0) {
		if(document.getElementById("btnVol").alt=="unmute") {
			document.getElementById("btnVol").src="wave-mute.jpg";
			document.getElementById("btnVol").alt="mute";
		}
	}
	else {
		if(document.getElementById("btnVol").alt=="mute") {
			document.getElementById("btnVol").src="wave-vol.jpg";
			document.getElementById("btnVol").alt="unmute";
		}
	}
}

function Chg_State(newVal){
	if(document.getElementById("btnPlay").alt=="pause") {
		wavesurfer.play();
		document.getElementById("btnPlay").src="wave-pause.jpg";
		document.getElementById("btnPlay").alt="play";
		
	}
	else {
		wavesurfer.pause();
		document.getElementById("btnPlay").src="wave-play.jpg";
		document.getElementById("btnPlay").alt="pause";
	}
}


function sec_to_min(seconds) {
  var pad = function(x) { return (x < 10) ? "0"+x : x; }
  return pad(parseInt(seconds / 60)) + ":" +
         pad(seconds % 60)
}

function sec_to_time(seconds) {
  var pad = function(x) { return (x < 10) ? "0"+x : x; }
  return pad(parseInt(seconds / (60*60))) + ":" +
         pad(parseInt(seconds / 60 % 60)) + ":" +
         pad(seconds % 60)
}


//alert('ok');

//fit_size();

document.getElementById("waveform").style.width = window.outerWidth - 35;


function fit_size(){
	window.location.reload();
	
}



</script>