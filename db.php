<?php include_once "./inc_common.php"; ?>

<?php include_once "./inc_head.php"; ?>

<body>
<div class="wrap">

<?php 
	$main3="on";
	
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


<?php if($_GET['menu']==3) {?>
			<div id=div-db3 class="sub_box">
				<input type=hidden id='db3_list_idx' value=''>

				<div class="title_box">
					<span>회의</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="search_wrap">
					<input id=serch_db3_str type="text" name="" placeholder="회의명으로 검색하세요." OnKeyDown="EnterCheckEvent(this.value,3)">
					<a href="javascript:;" class="btn_search" onclick="db_list(3)"></a>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>사업자명</th>
								<th>과금번호</th>
								<th>과금유형</th>
								<th>담당자명</th>
								<th>회의명</th>
								<th style="width:100px;">등록일</th>
								<th style="width:100px;">종료일</th>
								<th>회의스케쥴</th>
								<th>회의개설일자</th>
								<th>회의개설시간</th>
								<th>주최자비밀번호</th>
								<th>참석자비밀번호</th>
								<th>회의모드</th>
								<th>회의종료</th>
								<th>회의형태</th>
								<th>참석인원</th>
								<th>임장음</th>
								<th>퇴장음</th>
								<th>회의음량</th>
								<th>회의녹음</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db3-tbody>
	        				</tbody>

						</table>
					</div>
					<div class="cR mt20">
						<a href="javascript:;" onclick="db_list_update(3)" class="btn_check m5">수정</a>
						<a href="javascript:;" onclick="db_list_del(3)" class="btnC ligh_grey">삭제</a>
					</div>
				</div>

			</div>

<?php }?>

<?php if($_GET['menu']==4) {?>

			<div id=div-db4 class="sub_box">
				<input type=hidden id='db4_list_idx' value=''>

				<div class="title_box">
					<span>사용자</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbB mt20">
						<table>
							<tr>
								<th>회사명</th>
								<td><input type=text id='cp_name'></td>
								<th>부서명</th>
								<td><input type=text id='div_name'></td>
								<th>직위</th>
								<td><input type=text id='div_pos'></td>
							</tr>
							
							<tr>
								<th>이름</th>
								<td><input type=text id='name'></td>
								<th>주소록 그룹</th>
								<td><input type=text id='con_grp'></td>
								<td colspan=2><a href="javascript:;" onclick="db_list(4)" class="btnA fgreen">검색</a></td>
							</tr>
						</table>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>권한</th>
								<th>회사명</th>
								<th>회사번호</th>
								<th>과금번호</th>
								<th>주최자비밀번호</th>
								<th>주소록그룹</th>
								<th>이름</th>
								<th>부서명</th>
								<th>직위</th>
								<th>성별</th>
								<th>전화번호</th>
								<th>FAX</th>
								<th>휴대폰</th>
								<th>이메일</th>
								<th>ID</th>
								<th>비밀번호</th>
								<th>개인비밀번호</th>
								<th>전화걸기</th>
								<th>회의제어</th>
								<th>회의생성</th>
								<th>녹음</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db4-tbody>
	        				</tbody>

						</table>
					</div>
					<div class="cR mt20">
						<!--
						<th>주소록 그룹명 : </th>
						<input type=text id='db4_addr' value=''>
						<a href="javascript:;" onclick="db_list_update(4)" class="btn_check m5">주소록에 추가</a>
						-->
						<a href="javascript:;" onclick="db_list_update(4)" class="btn_check m5">수정</a>
						<a href="javascript:;" onclick="db_list_del(4)" class="btnC ligh_grey">삭제</a>
					</div>
				</div>

			</div>

<?php }?>


<?php if($_GET['menu']==5) {?>

			<div id=div-db4 class="sub_box">
				<input type=hidden id='db5_list_idx' value=''>

				<div class="title_box">
					<span>녹음파일</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div class="search_wrap">
					<input id=serch_db5_str type="text" name="" placeholder="회의명으로 검색하세요." OnKeyDown="EnterCheckEvent(this.value,5)">
					<a href="javascript:;" class="btn_search" onclick="db_list(5)"></a>
				</div>

				<div class="sub_tb">
					<div class="tbA scroll_list_xy">
						<table>
							<tr>
								<th>NO</th>
								<th>회사명</th>
								<th>과금번호</th>
								<th>회의번호</th>
								<th>회의일자</th>
								<th>시작시간</th>
								<th>종료시간</th>
								<th>회의명</th>
								<th>녹음파일명</th>
								
								<th>파일듣기</th>
								<th>다운로드</th>
								<th>파일삭제</th>
							</tr>

							<tbody style="cursor: pointer;" id=div-db5-tbody>
	        				</tbody>

						</table>
					</div>
					<!--
					<div class="cR mt20">
						<a href="javascript:;" onclick="db_list_update(5)" class="btn_check m5">수정</a>
						<a href="javascript:;" onclick="db_list_del(5)" class="btnC ligh_grey">삭제</a>
					</div>
					-->
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