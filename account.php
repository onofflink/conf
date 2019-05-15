<?php include_once "./inc_common.php"; ?>

<?php include_once "./inc_head.php"; ?>

<body>
<div class="wrap">

<?php 
	$main2="on";
	
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
			<div id=div-acc3 class="sub_box">
				<div class="title_box">
					<span>회의등록</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div id="popup_layer_acc_list" style="position:absolute; border:double; top:100px; left:250px; width:300px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
					<div class="title_box">
						<span>팝업 - 검색결과</span>
						<div class="top_btn">
							<a href="javascript:;" class="btn_close" onclick="acc_layer_close()">X</a>
						</div>
					</div>
					<div class="tbA mt10">
						<table id=acc_list_pop_tb>
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div> 


				<div class="search_wrap">
					<input id=serch_acc3_str type="text" name="" placeholder="회의명으로 검색하세요." OnKeyDown="EnterCheckEvent3(this.value)">
					<a href="javascript:;" class="btn_search" onclick="acc3_list()"></a>
				</div>

				<div class="sub_tb">
					<div class="tbC">
						<table>
							<input type=hidden id='acc3_list_idx' value=''>

							<tr>
								<th>사업자명</th>
								<td>
									<input type=text id='acc3_ent_name'>
									<!--<a href="javascript:;" class="btnA fgreen">검색</a>-->
								</td>
								<th></th><td></td>
							</tr>
							
							<tr>
								<th>과금번호</th>
								<td><input type=text id='acc3_pay_num'></td>
								<th>과금유형/구분</th>
								<td>일반 / 종량</td>
							</tr>
							
							<tr>
								<th>담당자명</th>
								<td><input type=text id='acc3_dir_name'></td>
								<th>회의명</th>
								<td><input type=text id='acc3_cf_name'></td>
								<td></td>
							</tr>
							
							<tr>
								<th>등록일</th>
								<td><input type=date id='acc3_stdate'></td>
								<th>종료일</th>
								<td><input type=date id='acc3_enddate' disabled></td>
							</tr>
							
							<tr>
								<th>회의스케쥴</th>
								<td>
									<select id='acc3_cf_sche' >
									<option value=1>항상</option>
									<option value=2>매주</option>
									<option value=3>매월</option>
									<option value=4>1회</option>
									</select>
								</td>
								<th>회의 개설시간</th>
								<td><input type=date id='acc3_cf_open_date'>&nbsp;&nbsp;<input type=time id='acc3_cf_open_time'>
								</td>
							</tr>
							
							<tr>
								<th>주최자 비밀번호</th>
								<td><input type=text id='acc3_sp_pwd' onchange="document.getElementById('acc3_sp_pwd_ok').value='';">
									<a href="javascript:;" class="btnA fgreen" onclick="dup_acc3_sp_pwd()">중복체크</a>
									&nbsp;<input type="text" id='acc3_sp_pwd_ok' disabled value='' style="border:0px;background:white;">
								<th>참석자 비밀번호</th>
								<td><input type=text id='acc3_att_pwd' onchange="document.getElementById('acc3_att_pwd_ok').value='';">
									<a href="javascript:;" class="btnA fgreen" onclick="dup_acc3_att_pwd()">중복체크</a>
									&nbsp;<input type="text" id='acc3_att_pwd_ok' disabled value='' style="border:0px;background:white;">
								</td>
							</tr>
							
							<tr>
								<th>회의모드</th>
								<td>
									<input type="radio" name="chk_cmode" id='acc3_cf_mode1' value="1"><label for=chk_cmode1>일반</label>
									<input type="radio" name="chk_cmode" id='acc3_cf_mode2' value="2"><label for=chk_cmode2>세미나</label>
								</td>
								<th>회의종류</th>
								<td>
									<input type="radio" name="chk_ctype" id='acc3_cf_kind1' value="1"><label for=chk_ctype1>기본</label>
									<input type="radio" name="chk_ctype" id='acc3_cf_kind2' value="2"><label for=chk_ctype2>2중 보안</label>
								</td>
							</tr>
							
							<tr>
								<th>회의형태</th>
								<td>
									<input type="radio" name="chk_mode" id='acc3_cf_form1' value="1"><label for=chk_mode1>일반</label>
									<input type="radio" name="chk_mode" id='acc3_cf_form2' value="2"><label for=chk_mode2>호출</label>
								</td>
								<th>참석인원</th>
								<td>
									<input type=text id='acc3_att_cnt'>
								</td>
							</tr>
							
							<tr>
								<th>입장소리</th>
								<td>
									<select id='acc3_in_wav'>
									<option value='1'>알람</option>
									<option value='2'>묵음</option>
									<option value='3'>롤콜</option>
									</select>
								</td>
								<th>퇴장소리</th>
								<td>
									<select id='acc3_out_wav'>
									<option value='1'>알람</option>
									<option value='2'>묵음</option>
									<option value='3'>롤콜</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<th>회의음량</th>
								<td>
									<input type="number" id='acc3_vol' value=5 min=0 max=10 id="con_vol" name="con_vol" style="width: 30%">
								</td>
								<th>회의녹음</th>
								<td>
									<select id='acc3_rec_type'>
									<option value='1'>기본</option>
									<option value='2'>항상</option>
									</select>
								</td>
							</tr>

						</table>
					</div>
					<div class="cR mt20">
						<a href="javascript:;" onclick="acc_new(3)" class="btnC fblue">신규</a>
						<a href="javascript:;" onclick="acc_save(3)" class="btn_check m5">저장</a>
						<a href="javascript:;" onclick="acc_del(3)" class="btnC ligh_grey">삭제</a>
					</div>
				</div>

			</div>

<?php }?>

<?php if($_GET['menu']==4) {?>

			<div id=div-acc4 class="sub_box">
				<div class="title_box">
					<span>사용자등록</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div id="popup_layer_acc_list" style="position:absolute; border:double; top:100px; left:250px; width:700px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
					<div class="title_box">
						<span>팝업 - 검색결과</span>
						<div class="top_btn">
							<a href="javascript:;" class="btn_close" onclick="acc_layer_close()">X</a>
						</div>
					</div>
					<div class="tbA mt10">
						<table id=acc_list_pop_tb>
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div> 

				<div id="popup_layer_acc4_addr" style="position:absolute; border:double; top:100px; left:270px; width:300px; top:270px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
					<div class="title_box">
						<span>팝업 - 주소록</span>
						<div class="top_btn">
							<a href="javascript:;" class="btn_close" onclick="document.getElementById('popup_layer_acc4_addr').style.visibility='hidden'">X</a>
						</div>
					</div>
					<div class="tbA mt10">
						<table id=acc_addr_pop>
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>


				<div class="search_wrap">
					<input id=serch_acc4_str type="text" name="" placeholder="이름으로 검색하세요." OnKeyDown="EnterCheckEvent4(this.value)">
					<a href="javascript:;" class="btn_search" onclick="acc4_list()"></a>
				</div>

				<div class="sub_tb">
					<div class="tbC">
						<table>
							<input type=hidden id='acc4_list_idx' value=''>

							<tr>
								<th>권한</th>
								<td colspan=3>
									<input type="radio" name="chk_level" id='acc4_level1' value="1"><label for=acc4_level1>Admin</label>
									<input type="radio" name="chk_level" id='acc4_level2' value="2"><label for=acc4_level2>Operator</label>
									<input type="radio" name="chk_level" id='acc4_level3' value="3"><label for=acc4_level3>Host</label>
									<input type="radio" name="chk_level" id='acc4_level4' value="4"><label for=acc4_level4>Attendee</label>
									<input type="radio" name="chk_level" id='acc4_level5' value="5"><label for=acc4_level5>Guest</label>
									<!--<a href="javascript:;" class="btnA fgreen">검색</a>-->
								</td>
							</tr>
							
							<tr>
								<th>회사명</th>
								<td colspan=2>
									<input type=text id='acc4_cp_name'>
								</td>
								<td></td>
							</tr>
							
							<tr>
								<th>회사번호</th>
								<td>
									<input type=text id='acc4_cp_num'>
								</td>
								<th>과금번호</th>
								<td>
									<input type=text id='acc4_pay_num'>
								</td>
							</tr>
							
							<!--
							<tr>
								<th>주최자 비밀번호</th>
								<td colspan=2>
									<input type=text id='acc4_sp_pwd'>
									<a href="javascript:;" class="btnA fgreen">검색</a>
								</td>
								<td></td>
							</tr>
							-->
							
							<tr>
								<th>주소록 그룹</th>
								<td colspan=2>
									<input type=text id='acc4_con_grp'>
									<a href="javascript:;" class="btnA fgreen" onclick="acc4_pop_addr()">주소록</a>
								</td>
								<td></td>
							</tr>
							
							<tr>
								<th>이름</th>
								<td><input type=text id='acc4_name'></td>
								<th>성별</th>
								<td><input type=text id='acc4_gender'></td>
							</tr>
							
							<tr>
								<th>부서명</th>
								<td>
									<input type=text id='acc4_div_name'>
								</td>
								<th>직위</th>
								<td>
									<input type=text id='acc4_div_pos'>
								</td>
							</tr>
							
							<tr>
								<th>전화번호</th>
								<td><input type=text id='acc4_tel'></td>
								<th>FAX</th>
								<td><input type=text id='acc4_fax'></td>
							</tr>
							
							<tr>
								<th>휴대폰</th>
								<td><input type=text id='acc4_hp'></td>
								<th>E-Mail</th>
								<td><input type=text id='acc4_email'></td>
							</tr>
							
							<tr>
								<th>ID</th>
								<td><input type=text id='acc4_id' onchange="document.getElementById('acc4_id_ok').value='';">
									<a href="javascript:;" class="btnA fgreen" onclick="dup_acc4_id()">중복체크</a>
									<input type="text" id='acc4_id_ok' disabled value='' style="border:0px;background:white;margin:0px;padding:0px;width:40px">
								</td>

								<th>PASS WORD</th>
								<td><input type=text id='acc4_pwd'></td>
							</tr>
							
							<tr>
								<th>개인 비밀번호</th>
								<td colspan=2><input type=text id='acc4_pri_pwd'></td>
								<td></td>
							</tr>
							
							<tr>
								<th>전화걸기</th>
								<td>
									<select id='acc4_cf_call' >
										<option value=1>허용</option>
										<option value=2>불가</option>
									</select>
								</td>
								<th>회의제어</th>
								<td>
									<select id='acc4_cf_control' >
										<option value=1>허용</option>
										<option value=2>불가</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<th>회의생성</th>
								<td>
									<select id='acc4_cf_make' >
										<option value=1>허용</option>
										<option value=2>불가</option>
									</select>
								</td>
								<th>녹음</th>
								<td>
									<select id='acc4_cf_rec' >
										<option value=1>허용</option>
										<option value=2>불가</option>
									</select>
								</td>
							</tr>

						</table>
					</div>
					<div class="cR mt20">
						<a href="javascript:;" onclick="acc_new(4)" class="btnC fblue">신규</a>
						<a href="javascript:;" onclick="acc_save(4)" class="btn_check m5">저장</a>
						<a href="javascript:;" onclick="acc_del(4)" class="btnC ligh_grey">삭제</a>
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


function EnterCheckEvent1(val){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		acc1_list();
	}
}
function EnterCheckEvent2(val){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		acc2_list();
	}
}
function EnterCheckEvent3(val){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		acc3_list();
	}
}
function EnterCheckEvent4(val){
	if(event.keyCode == 13){ //눌렀다 땐 키값이 13(엔터키)라면
		acc4_list();
	}
}

<?php 
	if($_GET['idx']) {
		echo "sel_acc" . $_GET['menu'] . "_list(" . $_GET['idx'] . ");";
	}	
	else {
		echo "acc_new(" . $_GET['menu'] . ");";
	}
?>

</script>

	

</body>
</html>