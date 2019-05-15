<?php include_once "./inc_common.php"; ?>

<?php include_once "./inc_head.php"; ?>

<body>
<div class="wrap">

<?php 
	$main5="on";
	
	if($_GET['menu']==1) $menu1="on";
	if($_GET['menu']==2) $menu2="on";
	if($_GET['menu']==3) $menu3="on";
	if($_GET['menu']==4) $menu4="on";
	if($_GET['menu']==5) $menu5="on";
	if($_GET['menu']==6) $menu6="on";
	if($_GET['menu']==7) $menu7="on";
	if($_GET['menu']==8) $menu8="on";
	if($_GET['menu']==9) $menu9="on";
?>

<?php include_once "./inc_menu.php"; ?>

<!--  ################################################## -->


	<div class="contents_wrap">
		<div class="layout">
			
<?php if($_GET['menu']==1) {?>

			<ul class="main_wrap">
				<li>
					<div class="main_box" id=sys1>
						<div class="title_box2">
							<span>기본 정보 표시</span>
							<div class="top_btn">
								<input type=hidden id=sys1_max value=0> 
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(1)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(1)"></a>
							</div>
						</div>

						<div class="pd22">
							<div class="tbA mt10">
								<table>
									<tbody id=div-sys1-tbody>
			        				</tbody>
								</table>
							</div>
						</div>

					</div>
				</li>

				<li>
					<div class="main_box" id=sys2>
						<div class="title_box2">
							<span>작업관리자의 성능 표시</span>
							<div class="top_btn">
								<input type=hidden id=sys1_max value=0> 
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(2)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(2)"></a>
							</div>
						</div>

						<div class="pd22">
							<div class="tbA mt10">
								<table>
									<tbody id=div-sys2-tbody>
			        				</tbody>
								</table>
							</div>
						</div>

					</div>
				</li>

				<li>
					<div class="main_box" id=sys3>
						<div class="title_box2">
							<span>외부 등과의 연결 상태를 표시 (정기적으로 외부와 통신)</span>
							<div class="top_btn">
								<input type=hidden id=sys1_max value=0> 
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(3)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(3)"></a>
							</div>
						</div>

						<div class="pd22">
							<div class="tbA mt10">
								<table>
									<tbody id=div-sys3-tbody>
			        				</tbody>
								</table>
							</div>
						</div>

					</div>
				</li>

				<li>
					<div class="main_box" id=sys4>
						<div class="title_box2">
							<span>동시 접속자 표시</span>
							<div class="top_btn">
								<input type=hidden id=sys1_max value=0> 
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(4)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(4)"></a>
							</div>
						</div>

						<div class="pd22">
							<div class="tbA mt10">
								<table>
									<tbody id=div-sys4-tbody>
			        				</tbody>
								</table>
							</div>
						</div>

					</div>
				</li>
				
			</ul>

<?php }?>


		</div>
	</div>

<!--
	<div class="copy">
		<div class="layout">copyright 2019</div>
	</div>
-->

</div>

<script type="text/javascript">
	var param = "#tab_box";
	var btn = ".chk_2>a";
	var obj = "#tab_box .obj";
	var img = false;
	var event = "click";
	document_tab(param,btn,obj,img,event);
</script>


<script>
$(document).ready(function(){
	//$(".navi_wrap > li > a").on("mouseover",function(){
		
	//	$(this).parent().find(".subnavi").slideDown(100)();
	//	$(".subnavi").removeClass("on");
	//});
	//$(".navi_wrap > li > a").on("mouseout",function(){
	//	$(this).parent().find(".subnavi").addClass("on")();
	//});
	
	$(".navi_wrap li").on("mouseenter",function(){
		for(var i=0;i<$(".navi_wrap li").length;i++){
			if(i!=$(this).index()){
				$(".navi_wrap li").eq(i).find(".subnavi").hide();
			}
		}
		$(this).find(".subnavi").show();
	});
	$(".navi_wrap li").on("mouseleave",function(){
		$(this).find(".subnavi").hide();
	});
	$(".navi_wrap").on("mouseleave",function(){
		$(".navi_wrap li").each(function(){
			if($(this).hasClass("on")){
				$(this).find(".subnavi").show();
			}
		});
	});

	$(".fgrey").click(function(){
		$(".fgrey").removeClass("on");
		$(this).addClass("on");
	});

	$(".btn_ex").click(function (){
		$(this).parents(".main_box").addClass("on");
	});
	$(".btn_close").click(function (){
		$(this).parents(".main_box").removeClass("on");
	});
});


	
<?php 
	if($_GET['menu']=='1') {
		
		echo "sys_list1();";
		echo "sys_list2();";
		echo "sys_list3();";
		echo "sys_list4();";

		echo "var mon_sys2=setInterval('sys_list2()()', 1000);";
		echo "var mon_sys3=setInterval('sys_list3()()', 1000);";
		echo "var mon_sys4=setInterval('sys_list4()()', 1000);";

	}	
?>

</script>

</body>
</html>