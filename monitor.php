<?php include_once "./inc_common.php"; ?>

<?php include_once "./inc_head.php"; ?>

<body>
<div class="wrap">

<?php 

	

	$main1="on";
	
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

			<div id="popup_layer_mon1_conf" style="position:absolute; border:double; top:100px; left:250px; width:700px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
				<div class="title_box">
					<span>팝업 - 검색결과</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_close" onclick="document.getElementById('popup_layer_mon1_conf').style.visibility='hidden'">X</a>
					</div>
				</div>
				<div class="tbA mt10">
					<table id=mon1_conf_pop>
						<thead>
							
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div> 

			<div id="popup_layer_mon1_user" style="position:absolute; border:double; top:100px; left:250px; width:700px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
				<div class="title_box">
					<span>팝업 - 검색결과</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_close" onclick="document.getElementById('popup_layer_mon1_user').style.visibility='hidden'">X</a>
					</div>
				</div>
				<div class="tbA mt10">
					<table id=mon1_user_pop>
						<thead>
							
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>

			<div id="popup_layer_mon1_addr" style="position:absolute; border:double; top:100px; left:450px; width:300px; top:300px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
				<div class="title_box">
					<span>팝업 - 주소록</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_close" onclick="document.getElementById('popup_layer_mon1_addr').style.visibility='hidden'">X</a>
					</div>
				</div>
				<div class="tbA mt10">
					<table id=mon1_addr_pop>
						<thead>
							
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>


			<ul class="main_wrap">
				<li>
					<div class="main_box" id=mmain1>
						<div class="title_box">
							<span>진행 회의</span>
							<div class="top_btn">
								<input type=hidden id=mmain1_max value=0> 
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(1)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(1)"></a>
							</div>
						</div>

						<div class="pd22" id=mmain1-1>
							<!--
							<a href="javascript:;" class="btnA fgreen">신규개설</a>
							<a href="javascript:;" class="btnA fgreen">회의수정</a>
							<a href="javascript:;" class="btnA fgreen">삭제</a>
							-->
							<input type=hidden id=NOW_SELROOM1 value=0>
							<a href="javascript:;" class="btnA fgreen" onclick="control_all('ALLLOCKONOFF')">LOCK / UNLOCK</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_all('ALLMUTEONOFF')">MUTE / UNMUTE</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_music('')">MUSIC / UNMUSIC</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_all('ALLVOLUP')">볼륨 ▲</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_all('ALLVOLDN')">볼륨 ▼</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_start()">회의 시작</a>
							<a href="javascript:;" class="btnA fgreen" onclick="control_end()">회의 종료</a>

							<div class="tbA mt10 scroll_main" id=mmain1-tbl>
								<table>
									<!--
									<colgroup>
										<col width="6%">
										<col width="10%">
										<col width="12%">
										<col width="*">
										<col width="8%">
										<col width="20%">
										<col width="12%">
										<col width="5%">
									</colgroup>
									-->

									<tr>
										<!--<th>선택</th>-->
										<th>룸번호</th>
										<th>회의번호</th>
										<th>회의명</th>
										<th>인원</th>
										<th>생성일자</th>
										<th>LOCK</th>
										<th>MUTE</th>
										<th>MUSIC</th>
										<th>볼륨</th>
									</tr>
									<tbody style="cursor: pointer;" id=div-main1-tbody>
			        				</tbody>
								</table>
							</div>
						</div>

					</div>
				</li>
				<li>
					<div class="main_box" id=mmain2>
						<div class="top_btn">
							<input type=hidden id=mmain2_max value=0>
							<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(2)"></a>
							<a href="javascript:;" class="btn_close" onclick="mon_layer_close(2)"></a>
						</div>
						<div id="tab_box01">
							<div id="tab_cnt" class="chk_1">
								<a href="javascript:;" class="tab_ov">참석자 목록</a>
								<a href="javascript:;">전화응대</a>
								<a href="javascript:;">교환원 호출</a>      
								<a href="javascript:;">알람</a>
							</div>
							<div class="grap">

								<div class="obj">
									<div class="pd22">
										<input type=hidden id=NOW_SELROOM2 value=0>
										<a href="javascript:;" class="btnA fgreen" onclick="control_one('MUTE')">참석자 MUTE / UNMUTE</a>
										<a href="javascript:;" class="btnA fgreen" onclick="control_one('VOLUP')">참석자 볼륨 ▲</a>
										<a href="javascript:;" class="btnA fgreen" onclick="control_one('VOLDN')">참석자 볼륨 ▼</a>
										<a href="javascript:;" class="btnA fgreen" onclick="control_etc('ban')">참석자 강제 퇴장/삭제</a>

										<div class="tbA mt10 scroll_main" id=mmain2-tbl>
											<table>
												<!--
												<colgroup>
													<col width="6%">
													<col width="*">
													<col width="25%">
													<col width="25%">
													<col width="25%">
												</colgroup>
												-->
												<tr>
													<!--<th>선택</th>-->
													<th>번호</th>
													<th>권한</th>
													<th>회사</th>
													<th>이름</th>
													<th>직급</th>
													<th>성별</th>
													<th>전화번호</th>
													<th>MUTE</th>
													<th>볼륨</th>
													<th>연결상태</th>
												<!--<th>채널</th>-->
												</tr>
												<tbody style="cursor: pointer;" id=div-main2-tbody>
						        				</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="obj">
									<div class="pd22">
										<a href="javascript:;" class="btnA fgreen">전화 받기</a>
										<a href="javascript:;" class="btnA fgreen">전화 끊기</a>
										<a href="javascript:;" class="btnA fgreen">통화 대기</a>
										<a href="javascript:;" class="btnA fgreen">참석자 회의방  이동</a>
										<a href="javascript:;" class="btnA fgreen">교환원 Talk/ MUTE</a>
										<div class="tbA mt10">
											<table>
												<colgroup>
													<col width="6%">
													<col width="*">
													<col width="25%">
													<col width="25%">
													<col width="25%">
												</colgroup>
												<tr>
													<th>선택</th>
													<th>상태</th>
													<th>수신번호</th>
													<th>발신번호</th>
													<th>응답상태</th>
												</tr>
												<tr>
													<td class="ct"><input type="checkbox" name=""></td>
													<td>Incoming</td>
													<td>031-818-7000</td>
													<td>02-0000-0000</td>
													<td>OP3 Response</td>
												</tr>
												<tr>
													<td class="ct"><input type="checkbox" name=""></td>
													<td>Incoming</td>
													<td>031-818-7000</td>
													<td>02-0000-0000</td>
													<td>OP3 Response</td>
												</tr>
												<tr>
													<td class="ct"><input type="checkbox" name=""></td>
													<td>Incoming</td>
													<td>031-818-7000</td>
													<td>02-0000-0000</td>
													<td>OP3 Response</td>
												</tr>
												<tr>
													<td class="ct"><input type="checkbox" name=""></td>
													<td>Incoming</td>
													<td>031-818-7000</td>
													<td>02-0000-0000</td>
													<td>OP3 Response</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								
								<!-- 교환원 호출 -->
								<div class="obj">
									<div class="pd22">
										
									</div>
								</div>

								<!-- 알람 -->
								<div class="obj">
									<div class="pd22">
										
									</div>
								</div>

							</div>
						</div>
						<script type="text/javascript">
							var param = "#tab_box01";
							var btn = ".chk_1>a";
							var obj = "#tab_box01 .obj";
							var img = false;
							var event = "click";
							document_tab(param,btn,obj,img,event);
						</script>

					</div>
				</li>

				 


				<li>
					<div class="main_box bom" id=mmain3>
						
						<div class="title_box">
							<span>회의 정보</span>
							<div class="top_btn">
								<input type=hidden id=mmain3_max value=0>
								<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(3)"></a>
								<a href="javascript:;" class="btn_close" onclick="mon_layer_close(3)"></a>
							</div>
						</div>

						

						<div class="pd22">
							<div class="tbB" style="">
								<table>
									<input type=hidden id='main1_list_idx' value=''>

									<tr>
										<th>사업자명</th>
										<td>
											<input type=text id='main1_ent_name'>
											<!--<a href="javascript:;" class="btnA fgreen" onclick="mon1_pop_conf()" >검색</a>-->
										</td>
										<th></th><td></td>
									</tr>
									
									<tr>
										<th>과금번호</th>
										<td><input type=text id='main1_pay_num'></td>
										<th>과금유형/구분</th>
										<td>일반 / 종량</td>
									</tr>
									
									<tr>
										<th>담당자명</th>
										<td><input type=text id='main1_dir_name'></td>
										<th>회의명</th>
										<td><input type=text id='main1_cf_name'></td>
										<td></td>
									</tr>
									
									<tr>
										<th>등록일</th>
										<td><input type=date id='main1_stdate' style="width:125px"></td>
										<th>종료일</th>
										<td><input type=date id='main1_enddate' style="width:125px" disabled></td>
									</tr>
									
									<tr>
										<th>회의스케쥴</th>
										<td>
											<select id='main1_cf_sche' >
											<option value=1>항상</option>
											<option value=2>매주</option>
											<option value=3>매월</option>
											<option value=4>1회</option>
											</select>
										</td>
										<th>회의 개설시간</th>
										<td><input type=date id='main1_cf_open_date' style="width:125px">&nbsp;&nbsp;<input type=time id='main1_cf_open_time' style="width:100px">
									</tr>
									
									<tr>
										<th>주최자 비밀번호</th>
										<td><input type=text id='main1_sp_pwd' style="width:50px" onchange="document.getElementById('main1_sp_pwd_ok').value='';">
											<a href="javascript:;" class="btnA fgreen" onclick="dup_main1_sp_pwd()">중복체크</a>
											<input type="text" id='main1_sp_pwd_ok' disabled value='' style="border:0px;background:white;margin:0px;padding:0px;width:40px">
										</td>
										<th>참석자 비밀번호</th>
										<td><input type=text id='main1_att_pwd' style="width:50px" onchange="document.getElementById('main1_att_pwd_ok').value='';">
											<a href="javascript:;" class="btnA fgreen" onclick="dup_main1_att_pwd()">중복체크</a>
											<input type="text" id='main1_att_pwd_ok' disabled value='' style="border:0px;background:white;margin:0px;padding:0px;width:40px">
										</td>
									</tr>
									
									<tr>
										<th>회의모드</th>
										<td>
											<input type="radio" name="chk_cmode" id='main1_cf_mode1' value="1"><label for=chk_cmode1>일반</label>
											<input type="radio" name="chk_cmode" id='main1_cf_mode2' value="2"><label for=chk_cmode2>세미나</label>
										</td>
										<th>회의종류</th>
										<td>
											<input type="radio" name="chk_ctype" id='main1_cf_kind1' value="1"><label for=chk_ctype1>기본</label>
											<input type="radio" name="chk_ctype" id='main1_cf_kind2' value="2"><label for=chk_ctype2>2중 보안</label>
										</td>
									</tr>
									
									<tr>
										<th>회의형태</th>
										<td>
											<input type="radio" name="chk_mode" id='main1_cf_form1' value="1"><label for=chk_mode1>일반</label>
											<input type="radio" name="chk_mode" id='main1_cf_form2' value="2"><label for=chk_mode2>호출</label>
										</td>
										<th>참석인원</th>
										<td>
											<input type=text id='main1_att_cnt'>
										</td>
									</tr>
									
									<tr>
										<th>입장소리</th>
										<td>
											<select id='main1_in_wav'>
											<option value='1'>알람</option>
											<option value='2'>묵음</option>
											<option value='3'>롤콜</option>
											</select>
										</td>
										<th>퇴장소리</th>
										<td>
											<select id='main1_out_wav'>
											<option value='1'>알람</option>
											<option value='2'>묵음</option>
											<option value='3'>롤콜</option>
											</select>
										</td>
									</tr>
									
									<tr>
										<th>회의음량</th>
										<td>
											<input type="number" id='main1_vol' value=5 min=0 max=10 id="con_vol" name="con_vol" style="width: 30%">
										</td>
										<th>회의녹음</th>
										<td>
											<select id='main1_rec_type'>
											<option value='1'>기본</option>
											<option value='2'>항상</option>
											</select>
										</td>
									</tr>

								</table>
							</div>
							<div class="cR mt20">
								<a href="javascript:;" onclick="mon_new(1)" class="btnC fblue">신규</a>
								<a href="javascript:;" onclick="mon_save(1)" class="btn_check m5">저장</a>
								<a href="javascript:;" onclick="mon_del(1)" class="btnC ligh_grey">삭제</a>
							</div>
						</div>

					</div>
				</li>
				<li>
					<div class="main_box bom" id=mmain4>
						<div class="top_btn">
							<!--<a href="javascript:;" class="btnB fgreen">주소록</a>-->

							<input type=hidden id=mmain4_max value=0>
							<a href="javascript:;" class="btn_ex" onclick="mon_layer_max(4)"></a>
							<a href="javascript:;" class="btn_close" onclick="mon_layer_close(4)"></a>
						</div>
						<div id="tab_box">
							<div id="tab_cnt" class="chk_2">
								<a href="javascript:;" class="tab_ov">참석자 정보</a>
								<a href="javascript:;">Q&A</a>
							</div>
							<div class="grap">
								<div class="obj">
									
									<div class="pd22">
										<div class="tbB">
											<table>
												<input type=hidden id='main2_list_idx' value=''>

												<tr>
													<th>권한</th>
													<td colspan=3>
														<input type="radio" name="chk_level" id='main2_level1' value="1"><label for=main2_level1>Admin</label>
														<input type="radio" name="chk_level" id='main2_level2' value="2"><label for=main2_level2>Operator</label>
														<input type="radio" name="chk_level" id='main2_level3' value="3"><label for=main2_level3>Host</label>
														<input type="radio" name="chk_level" id='main2_level4' value="4"><label for=main2_level4>Attendee</label>
														<input type="radio" name="chk_level" id='main2_level5' value="5"><label for=main2_level5>Guest</label>

														<!--<a href="javascript:;" class="btnA fgreen" onclick="mon1_pop_user()">검색</a>-->
													</td>
												</tr>
												
												<tr>
													<th>회사명</th>
													<td>
														<input type=text id='main2_cp_name'>
													</td>
													<th></th><td></td>
												</tr>
												
												<tr>
													<th>회사번호</th>
													<td>
														<input type=text id='main2_cp_num'>
													</td>
													<th>과금번호</th>
													<td>
														<input type=text id='main2_pay_num'>
													</td>
												</tr>
												<!--
												<tr>
													<th>주최자비밀번호</th>
													<td>
														<input type=text id='main2_sp_pwd'>
														<a href="javascript:;" class="btnA fgreen">검색</a>
													</td>
													<th></th><td></td>
												</tr>
												-->
												
												<tr>
													<th>주소록그룹</th>
													<td>
														<input type=text id='main2_con_grp'>
														<a href="javascript:;" class="btnA fgreen" onclick="mon1_pop_addr()">주소록</a>
													</td>
													<th></th><td></td>
												</tr>
												
												<tr>
													<th>이름</th>
													<td>
														<input type=text id='main2_name'>
													</td>
													<th></th><td></td>
												</tr>
												
												<tr>
													<th>부서명</th>
													<td>
														<input type=text id='main2_div_name'>
													</td>
													<th>직위</th>
													<td>
														<input type=text id='main2_div_pos'>
													</td>
												</tr>
												
												<tr>
													<th>전화번호</th>
													<td><input type=text id='main2_tel'></td>
													<th>FAX</th>
													<td><input type=text id='main2_fax'></td>
												</tr>
												
												<tr>
													<th>휴대폰</th>
													<td><input type=text id='main2_hp'></td>
													<th>E-Mail</th>
													<td><input type=text id='main2_email'></td>
												</tr>
											</table>
										</div>
										<div class="cR mt20">
											<a href="javascript:;" onclick="mon_save(2)" class="btn_check m5">저장</a>
										</div>
									</div>

								</div>
								
								<div class="obj">

									<div class="pd22">
										<div class="tbA mt10">
											<table>
												<colgroup>
													<col width="10%">
													<col width="*">
													<col width="12%">
													<col width="12%">
													<col width="12%">
												</colgroup>
												<tr>
													<th>NO</th>
													<th>제목</th>
													<th>등록자</th>
													<th>등록일</th>
													<th>답변상태</th>
												</tr>
												<tr>
													<td class="ct">01</td>
													<td>질문입니다.</td>
													<td class="ct">홍길동</td>
													<td class="ct">19.01.11</td>
													<td class="ct">답변완료</td>
												</tr>
												<tr>
													<td class="ct">02</td>
													<td>질문입니다.</td>
													<td class="ct">홍길동</td>
													<td class="ct">19.01.11</td>
													<td class="ct">미답변</td>
												</tr>
											</table>
										</div>
									</div>

								</div>
							 
							</div>
						</div>
						<script type="text/javascript">
							var param = "#tab_box";
							var btn = ".chk_2>a";
							var obj = "#tab_box .obj";
							var img = false;
							var event = "click";
							document_tab(param,btn,obj,img,event);
						</script>

					</div>
				</li>
			</ul>

<?php }?>


<?php if($_GET['menu']==5) {?>
			<div id=div-acc3 class="sub_box">
				<div class="title_box">
					<span>참석자 배정</span>
					<div class="top_btn">
						<a href="javascript:;" class="btn_ex">□</a>
						<a href="javascript:;" class="btn_close">X</a>
					</div>
				</div>

				<div id="popup_layer_acc_list" style="position:absolute; border:double; margin-top:35px; top:100px; left:300px; width:500px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
					<div class="title_box">
						<span>팝업 - 검색결과</span>
						<div class="top_btn">
							<a href="javascript:;" class="btn_close" onclick="acc_layer_close()">X</a>
						</div>
					</div>
					<div class="tbA mt10">
						<table id=mon5_list_pop_acc>
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div> 

				<div id="popup_layer_addr_list" style="position:absolute; border:double; margin-top:155px; top:100px; left:25px; width:300px; top:100px; padding:10px; z-index:1; visibility:hidden; background-color:white;">
					<div class="title_box">
						<span>팝업 - 주소록</span>
						<div class="top_btn">
							<a href="javascript:;" class="btn_close" onclick="document.getElementById('popup_layer_addr_list').style.visibility='hidden';">X</a>
						</div>
					</div>
					<div class="tbA mt10">
						<table id=mon5_list_pop_addr>
							<thead>
								
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div> 

				
				<div class="sub_tb">
					<div class="tbB mt20">
						<table>
							<input type=hidden id='mon5_pop_idx' value=''>

							<tr>
								<th>사업자명</th>
								<td><input type=text id='mon5_pop_ent_name'></td>
								<th>과금번호</th>
								<td><input type=text id='mon5_pop_pay_num'></td>
								<th>회의번호</th>
								<td><input type=text id='mon5_pop_cf_num'></td>
							</tr>
							
							<tr>
								<th>주최자비밀번호</th>
								<td><input type=text id='mon5_pop_sp_pwd'></td>
								<th>참석자비밀번호</th>
								<td><input type=text id='mon5_pop_att_pwd'></td>
								<td colspan=2><a href="javascript:;" onclick="mon5_pop_list()" class="btnA fgreen">회의 검색</a></td>
							</tr>

						</table>
					</div>
				</div>

				<div class="sub_tb">
					<div class="tbB">
						<table>
							<tr>
								<th>회의명</th>
								<td><input type=text id='mon5_cf_name' disabled></td>
								<th>회의 날짜</th>
								<td><input type=date id='mon5_cf_open_date' disabled></td>
								<th>회의 시작시간</th>
								<td><input type=time id='mon5_cf_open_time' disabled></td>
							</tr>
						</table>
					</div>
				</div>

				
				<div class="sub_tb">
					<div class="tbB">
						<table>
							<tr>
								<th>주소록 그룹</th>
								<td>
									<input type=text id='addr_name'>
									<a href="javascript:;" onclick="mon5_pop_addrlist()" class="btnA fgreen">주소록 검색</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="javascript:;" onclick="mon5_list_user('1','')" class="btnA fblue">참석자 조회</a>
									<a href="javascript:;" onclick="mon5_chk_save('insert')" class="btnA dblue">참석자 추가</a>
									<a href="javascript:;" onclick="mon5_chk_save('delete')" class="btnA ligh_grey">참석자 삭제</a>
									
								</td>
							</tr>
						</table>
					</div>
				
					<div class="tbA mt5" style="height:300px;overflow-Y:scroll;">
						<table>
							<!--
							<colgroup>
								<col width="6%">
								<col width="*">
								<col width="25%">
								<col width="25%">
								<col width="25%">
							</colgroup>
							-->
							<tr>
								<th><input type="checkbox" id="chk_mon5_all"></th>
								<th>번호</th>
								<th>주소록 그룹</th>
								<th>회사명</th>
								<th>이름</th>
								<th>직위</th>
								<th>성별</th>
								<th>전화번호</th>
								<th>이메일</th>
							</tr>
							<tbody id=div-main5-tbody>
								
							</tbody>

						</table>
					</div>

				</div>


				<div class="sub_tb">
					<div class="tbB">
						<table>
							<tr>
								<th>문자내용</th>
								<td>
									<TEXTAREA name="thetext" rows="8" cols="50">
메르스 관련 긴급 회의 진행예정이오니
아래 회의 정보 확인 하시고 참석하시기 바랍니다.
회의 제목:  메르스 관련 긴급 회의 
날짜: 00년 00월 00일
시간: 00시 00분
참석자 비밀번호: 000000
참석 방법: 000-0000-0000 전화를 건 후 비밀번호입력</TEXTAREA>
								</td>

								<td>
									<a href="javascript:;" onclick="alert('문자 연동 완료 후 가능합니다!')" class="btnC fblue">문자탬플릿 불러오기</a>
									<a href="javascript:;" onclick="alert('문자 연동 완료 후 가능합니다!')" class="btn_check m5">문자발송</a>
									<!--<a href="javascript:;" onclick="alert('협의중입니다.')" class="btn_check">메신저발송</a>-->
								</td>						
							</tr>
						</table>
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

	$('#chk_mon5_all').change(function () {
		var checked = $(this).prop('checked');
		$('input[name=chk_mon5]').prop('checked', checked);
	});

});


	
<?php 
	if($_GET['menu']=='1') {
		echo "mon_new(" . $_GET['menu'] . ");";
		echo "main_mon_list1();";

		echo "var v_main_mon_list1=setInterval('main_mon_list1()', 1000);";
		echo "var v_main_mon_list1=setInterval('main_mon_list2()', 1000);";
	}	
?>

</script>

</body>
</html>