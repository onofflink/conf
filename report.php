<?php include_once "./inc_common.php"; ?>

<?php include_once "./inc_head.php"; ?>

<body>
<div class="wrap">

<?php 
	$main4="on";
	
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


<?php if($_GET['menu']==4) {?>
			<div id=div-db3 class="sub_box">
				<input type=hidden id='db3_list_idx' value=''>

				<div class="title_box">
					<span>회의번호</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbB mt20">
						<table>
							<tr>
								<th>기간</th>
								<td width='500'>
									<input type=date id='date_st'> ~ <input type=date id='date_ed'>
								</td>
								<th>회의명</th>
								<td>
									<input type=text id='div_name'>
									<a href="javascript:;" onclick="report_list(4)" class="btnA fgreen" style="margin-left:100px;">검색</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>사업자명</th>
								<th>과금번호</th>
								<th>등급</th>
								<th>과금유형</th>
								<th>과금구분</th>
								<th>담당자명</th>
								<th>회의명</th>
								<th>회의번호</th>
								<th>영업담당</th>
								<th>회의모드</th>
								<th style="width:100px;">검색시작일</th>
								<th style="width:100px;">검색종료일</th>
								<th>진행회의수</th>
								<th>참석인원</th>
								<th>총사용분</th>
								<th>서비스비용</th>
								<th>국내통화료</th>
								<th>국제통화료</th>
								<th>부가서비스</th>
								<th>총비용합계</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db4-tbody>
	        				</tbody>

						</table>
					</div>


					<div class="tbE cR mt20">
						<table>
							<tr>
								<th width='100' style="border-top:1px solid #767676;">총매출합계</th>
								<td width='100' style="border-top:1px solid #767676;">0</td>
								
								<td style='border:0px;'>
									<a href="javascript:;" onclick="db_list_update(3)" class="btn_check m5">수정</a>
									<a href="javascript:;" onclick="db_list_del(3)" class="btnC ligh_grey">삭제</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

			</div>

<?php }?>

<?php if($_GET['menu']==5) {?>

			<div id=div-db3 class="sub_box">
				<input type=hidden id='db3_list_idx' value=''>

				<div class="title_box">
					<span>참석자상세</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbB mt20">
						<table>
							<tr>
								<th>기간</th>
								<td width='500'>
									<input type=date id='date_st'> ~ <input type=date id='date_ed'>
								</td>
								<th>회의명</th>
								<td>
									<input type=text id='div_name'>
									<a href="javascript:;" onclick="report_list(5)" class="btnA fgreen" style="margin-left:100px;">검색</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>사업자명</th>
								<th>과금번호</th>
								<th>등급</th>
								<th>과금유형</th>
								<th>과금구분</th>
								<th>담당자명</th>
								<th>회의명</th>
								<th>회의번호</th>
								<th>영업담당</th>
								<th>회의모드</th>
								<th style="width:100px;">시작시간</th>
								<th style="width:100px;">종료시간</th>
								<th>진행회의수</th>
								<th>참석인원</th>
								<th>총사용분</th>
								<th>서비스비용</th>
								<th>국내통화료</th>
								<th>국제통화료</th>
								<th>부가서비스</th>
								<th>총비용합계</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db5-tbody>
	        				</tbody>

						</table>
					</div>
					<div class="tbE cR mt20">
						<table>
							<tr>
								<th width='100' style="border-top:1px solid #767676;">총매출합계</th>
								<td width='100' style="border-top:1px solid #767676;">0</td>
								
								<td style='border:0px;'>
									<a href="javascript:;" onclick="db_list_update(3)" class="btn_check m5">수정</a>
									<a href="javascript:;" onclick="db_list_del(3)" class="btnC ligh_grey">삭제</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

			</div>

<?php }?>


<?php if($_GET['menu']==6) {?>

			<div id=div-db6 class="sub_box">
				<input type=hidden id='db6_list_idx' value=''>

				<div class="title_box">
					<span>회의</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbB mt20">
						<table>
							<tr>
								<th>기간</th>
								<td width='500'>
									<input type=date id='date_st'> ~ <input type=date id='date_ed'>
								</td>
								<th>회의명</th>
								<td>
									<input type=text id='div_name'>
									<a href="javascript:;" onclick="report_list(6)" class="btnA fgreen" style="margin-left:100px;">검색</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>사업자명</th>
								<th>과금번호</th>
								<th>예약번호</th>
								<th>회의번호</th>
								<th>과금유형</th>						
								<th>영업담당</th>
								<th style="width:100px;">회의날짜</th> 
								<th style="width:100px;">시작시간</th>
								<th style="width:100px;">종료시간</th>
								<th>연결번호</th>
								<th>전화번호</th>
								<th>회사명</th>
								<th>참석자명</th>
								<th>직급</th>
								<th>권한</th>
								<th>기본요금</th>
								<th>서비스단가</th>
								<th>사용분</th>
								<th>서비스합계</th>
								<th>국내통화료</th>
								<th>국제통화료</th>
								<th>부가서비스</th>
								<th>총비용합계</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db6-tbody>
	        				</tbody>

						</table>
					</div>
					<div class="cR mt20">
						<a href="javascript:;" onclick="db_list_update(6)" class="btn_check m5">수정</a>
						<a href="javascript:;" onclick="db_list_del(6)" class="btnC ligh_grey">삭제</a>
					</div>
				</div>

			</div>
<?php }?>

		</div>
	</div>

<!--
	<div class="copy">
		<div class="layout">copyright 2019</div>
	</div>
-->

</div>

<script>
$(document).ready(function(){

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
});


function EnterCheckEvent(val, menu){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		db_list(menu);
	}
}

</script>

</body>
</html>