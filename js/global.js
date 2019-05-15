


// 권한
function get_level(num){ 
	var ret;

	if (num=='1')	ret="Admin";
	if (num=='2')	ret="Operator";
	if (num=='3')	ret="Host";
	if (num=='4')	ret="Attendee";
	if (num=='5')	ret="Guest";

	return ret;
}


//Monitor Timer 중지
function ref_stop(){
	clearInterval(mon_interval);
}


//Monitor 레이어

function mon_layer_max(num){ 
	$("#mmain" + num + "_max").val(num);

	document.getElementById("mmain1").style.visibility="hidden"; 
	document.getElementById("mmain2").style.visibility="hidden"; 
	document.getElementById("mmain3").style.visibility="hidden"; 
	document.getElementById("mmain4").style.visibility="hidden"; 
	document.getElementById("mmain" + num).style.visibility="visible"; 

	$("#mmain" + num + "-tbl").css("height","600px");
}

function mon_layer_close(num){ 
	$("#mmain" + num + "_max").val(0);

	document.getElementById("mmain1").style.visibility="visible"; 
	document.getElementById("mmain2").style.visibility="visible"; 
	document.getElementById("mmain3").style.visibility="visible"; 
	document.getElementById("mmain4").style.visibility="visible"; 

	$("#mmain" + num + "-tbl").css("height","226px");
}


/*
function mon_layer_max(num){ 
	if($("#mmain" + num + "_max").val() == '0') {
		$("#mmain" + num + "_max").val(num);

		document.getElementById("mmain1").style.visibility="hidden"; 
		document.getElementById("mmain2").style.visibility="hidden"; 
		document.getElementById("mmain3").style.visibility="hidden"; 
		document.getElementById("mmain4").style.visibility="hidden"; 
		document.getElementById("mmain" + num).style.visibility="visible"; 
	}
	else {
		$("#mmain" + num + "_max").val(0);

		document.getElementById("mmain1").style.visibility="visible"; 
		document.getElementById("mmain2").style.visibility="visible"; 
		document.getElementById("mmain3").style.visibility="visible"; 
		document.getElementById("mmain4").style.visibility="visible"; 
	}
}

function mon_layer_close(num){ 
	document.getElementById("mmain" + num).style.visibility="hidden"; 
}
*/



function sel_main_mon1_list(room_num){
	$("[id^='main_mon1tr_']").css("background-color","#fff");
	$("#NOW_SELROOM1").val(room_num);
	$("#main_mon1tr_"+room_num).css("background-color","#FFC19E");

	var params3 = {mode:'sel_acc3_list', roomnum:room_num};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
				$("#main1_"+"list_idx").val(req[i].idx);

				$("#main1_"+"ent_name").val(req[i].ent_name);
				$("#main1_"+"pay_num").val(req[i].pay_num);
				$("#main1_"+"pay_type").val(req[i].pay_type);
				$("#main1_"+"pay_part").val(req[i].pay_part);
				$("#main1_"+"dir_name").val(req[i].dir_name);
				$("#main1_"+"cf_name").val(req[i].cf_name);
				
				$("#main1_"+"stdate").val(req[i].stdate);
				$("#main1_"+"enddate").val(req[i].enddate);
				
				$("#main1_"+"cf_sche").val(req[i].cf_sche);
				$("#main1_"+"cf_open_date").val(req[i].cf_open_date);
				$("#main1_"+"cf_open_time").val(req[i].cf_open_time);
				
				$("#main1_"+"sp_pwd").val(req[i].sp_pwd);
				$("#main1_"+"att_pwd").val(req[i].att_pwd);
				
				/*$("#main1_"+"cf_mode1").prop("checked", false);
				$("#main1_"+"cf_mode2").prop("checked", false);
				$("#main1_"+"cf_kind1").prop("checked", false);
				$("#main1_"+"cf_kind2").prop("checked", false);
				$("#main1_"+"cf_form1").prop("checked", false);
				$("#main1_"+"cf_form2").prop("checked", false);*/
				
				$("input:radio[id^='main1_']").prop("checked", false);
				
				$("#main1_"+"cf_mode"+req[i].cf_mode).prop('checked',true);
				$("#main1_"+"cf_kind"+req[i].cf_kind).prop("checked", true);
				$("#main1_"+"cf_form"+req[i].cf_form).prop("checked", true);
				
				$("#main1_"+"att_cnt").val(req[i].att_cnt);
				$("#main1_"+"in_wav").val(req[i].in_wav);
				$("#main1_"+"out_wav").val(req[i].out_wav);
				$("#main1_"+"vol").val(req[i].vol);
				$("#main1_"+"rec_type").val(req[i].rec_type);

				$("#main1_sp_pwd_ok").val('▶완료');
				$("#main1_att_pwd_ok").val('▶완료');
			});
		}
	},'json');
}

function sel_main_mon2_list(idx){
	$("[id^='main_mon2tr_']").css("background-color","#e7f3f8");
	$("#NOW_SELROOM2").val(idx);
	$("#main_mon2tr_"+idx).css("background-color","#FFC19E");

	var params3 = {mode:'sel_acc4_list', type:idx};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
					
				var object = req[i];

				$("#main2_"+"list_idx").val(req[i].idx);
				
				$("input:radio[id^='main2_']").prop("checked", false);
				for( var key in object ) {
						  
					console.log( key + '=>' + object[key] );
					  
					if( key=='idx' || key=='regdate'){
						
					}else if(key=='level'){
						$("#main2_"+"level"+req[i].level).prop('checked',true);

					}else{
						$("#main2_"+key).val( object[key] ); 
					}
					  
				}
					
			});
		}
	},'json');
}

function main_mon_list1(){
	$sel_room1=$("#NOW_SELROOM1").val();
	$color="#e7f3f8";
	console.log('sel_room1:' + $sel_room1);
								//num중요 
	var params3 = {mode:'mon_list',num:'1', type:$("#serch_main_mon1").val(),type2:$("#serch_main_mon1_ad").val(),type_str:$("#serch_main_mon1_str").val()};
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//html_str+="<tr onclick=\"\">";
			//html_str+="<td colspan=20>검색결과가 없습니다.</td>";
			//html_str+="</tr>";
			$("#div-main1-tbody").html("");
		}else{
			var lock_str="";var yn="";
			$.each(req, function(i,item) {
				//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
				var object = req[i];//d+넘버체크+tr_
				if($sel_room1==req[i].room_num)$color='#FFC19E';
				else $color='none';
				html_str+="<tr id=main_mon1tr_"+req[i].room_num+" style=\"background-color: "+$color+"; \" >"; //두번째파라미터체크

				//html_str+="<td class='ct'><input type='checkbox' name=''></td>";

				for( var key in object ) {
					//console.log( key + '=>' + object[key] );
					if( key=='idx' || key=='regdate'|| key=='max_cnt'){
						  
					}/*else if(key=='level'){
						  html_str+="<td>"+$("label[for='acc4_"+key+object[key]+"']").text()+"</td>";
					}*/else if(key=='now_cnt'){
						html_str+="<td onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+object[key]+" / "+req[i].max_cnt+"</td>";
					}

					else if(key=='lock_yn'){
						if(object[key]=="N")
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/unlock.png'>"+"</td>";
						else
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/lock.png'>"+"</td>";
					}
					else if(key=='mute_yn'){
						if(object[key]=="N")
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/unmute.png'>"+"</td>";
						else
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/mute.png'>"+"</td>";
					}
					else if(key=='music_yn'){
						if(object[key]=="N")
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/unmusic.png'>"+"</td>";
						else
							html_str+="<td class='ct' onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+"<img src='icon/music.png'>"+"</td>";
					}

					else{
						html_str+="<td onclick=\"sel_main_mon1_list('"+req[i].room_num+"')\">"+object[key]+"</td>";
					}
				}

				html_str+="</tr>";

				//console.log('------------------------');
			});
			$("#div-main1-tbody").html(html_str);
		}
	},'json');
	
}


function main_mon_list2(){
	$sel_room2=$("#NOW_SELROOM2").val();
	$color="#e7f3f8";
	console.log('sel_room2:' + $sel_room2);
								//num중요 
	var params3 = {mode:'mon_list',num:'2', roomnum:$("#NOW_SELROOM1").val(),type:$("#serch_main_mon2").val(),type2:$("#serch_main_mon2_ad").val(),type_str:$("#serch_main_mon2_str").val()};
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			/*
			html_str+="<tr onclick=\"\">";
			html_str+="<td colspan=20>회의를 선택하십시오.</td>";
			html_str+="</tr>";
			$("#div-main2-tbody").html(html_str);
			*/
			$("#div-main2-tbody").html('');
		}else{
			var lock_str="";var yn="";
			$.each(req, function(i,item) {
				//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
				var object = req[i];//d+넘버체크+tr_
				if($sel_room2==req[i].user_idx)$color='#FFC19E';
				else $color='none';
				html_str+="<tr id=main_mon2tr_"+req[i].user_idx+" style=\"background-color: "+$color+"; \" >"; //두번째파라미터체크

				//html_str+="<td class='ct'><input type='checkbox' name=''></td>";

				for( var key in object ) {
					  //console.log( key + '=>' + object[key] );
					  if( key=='user_idx' || key=='regdate' || key=='max_cnt' || key=='chan'){
						  
					  }

					  else if(key=='level'){
					  
						 html_str+="<td onclick=\"sel_main_mon2_list('"+req[i].user_idx+"')\">"+get_level(object[key])+"</td>";
					  }

					  else if(key=='k_mute'){
						if(object[key]=="UNMUTE")
								html_str+="<td class='ct' onclick=\"sel_main_mon2_list('"+req[i].user_idx+"')\">"+"<img src='icon/unmute.png'>"+"</td>";
							else
								html_str+="<td class='ct' onclick=\"sel_main_mon2_list('"+req[i].user_idx+"')\">"+"<img src='icon/mute.png'>"+"</td>";
						}

					  else{
						  html_str+="<td onclick=\"sel_main_mon2_list('"+req[i].user_idx+"')\">"+object[key]+"</td>";
					  }
				}
				html_str+="</td>";
				html_str+="</tr>";
				//console.log('------------------------');
			});
			$("#div-main2-tbody").html(html_str);
		}
	},'json');
	
}





////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
//Acc레이어
function acc_layer_popup(num){ 
	var layer = document.getElementById("popup_layer_acc_list"); 
	layer.style.visibility="visible"; //반대는 hidden 
}
function acc_layer_close(num){ 
	var layer = document.getElementById("popup_layer_acc_list"); 
	layer.style.visibility="hidden"; //반대는 hidden 
}
////////////////////////////////////////////////////////////////////////////////////////////////////
//Acc3레이어 결과선택
function sel_acc3_list(idx){
	$("#acc3_list_idx").val(idx); 
	acc_layer_close();
	//$("#acc3_"+"stdate").val('2018-12-26');
	var params3 = {mode:'sel_acc3_list', type:idx};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
					
					$("#acc3_"+"ent_name").val(req[i].ent_name);
					$("#acc3_"+"pay_num").val(req[i].pay_num);
					$("#acc3_"+"pay_type").val(req[i].pay_type);
					$("#acc3_"+"pay_part").val(req[i].pay_part);
					$("#acc3_"+"dir_name").val(req[i].dir_name);
					$("#acc3_"+"cf_name").val(req[i].cf_name);
					
					$("#acc3_"+"stdate").val(req[i].stdate);
					$("#acc3_"+"enddate").val(req[i].enddate);
					
					$("#acc3_"+"cf_sche").val(req[i].cf_sche);
					$("#acc3_"+"cf_open_date").val(req[i].cf_open_date);
					$("#acc3_"+"cf_open_time").val(req[i].cf_open_time);
					
					$("#acc3_"+"sp_pwd").val(req[i].sp_pwd);
					$("#acc3_"+"att_pwd").val(req[i].att_pwd);
					
					/*$("#acc3_"+"cf_mode1").prop("checked", false);
					$("#acc3_"+"cf_mode2").prop("checked", false);
					$("#acc3_"+"cf_kind1").prop("checked", false);
					$("#acc3_"+"cf_kind2").prop("checked", false);
					$("#acc3_"+"cf_form1").prop("checked", false);
					$("#acc3_"+"cf_form2").prop("checked", false);*/
					
					$("input:radio[id^='acc3_']").prop("checked", false);
					
					$("#acc3_"+"cf_mode"+req[i].cf_mode).prop('checked',true);
					$("#acc3_"+"cf_kind"+req[i].cf_kind).prop("checked", true);
					$("#acc3_"+"cf_form"+req[i].cf_form).prop("checked", true);
					
					$("#acc3_"+"att_cnt").val(req[i].att_cnt);
					$("#acc3_"+"in_wav").val(req[i].in_wav);
					$("#acc3_"+"out_wav").val(req[i].out_wav);
					$("#acc3_"+"vol").val(req[i].vol);
					$("#acc3_"+"rec_type").val(req[i].rec_type);

					$("#acc3_sp_pwd_ok").val('▶완료');
					$("#acc3_att_pwd_ok").val('▶완료');
			});
		}
	},'json');
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
//Acc4레이어 결과선택
function sel_acc4_list(idx){
	$("#acc4_list_idx").val(idx); 
	acc_layer_close();
	//$("#acc3_"+"stdate").val('2018-12-26');
	var params3 = {mode:'sel_acc4_list', type:idx};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
					
					var object = req[i];
					
					$("input:radio[id^='acc4_']").prop("checked", false);
					for( var key in object ) {
							  
						console.log( key + '=>' + object[key] );
						  
						if( key=='idx' || key=='regdate'){
							
						}else if(key=='level'){
							$("#acc4_"+"level"+req[i].level).prop('checked',true);
						}else{
							$("#acc4_"+key).val( object[key] ); 
						}
						  
					}

					$("#acc4_id_ok").val('▶완료');
					
			});
		}
	},'json');
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
//Acc3등록
function acc3_list(){
	//$("#acc3_list_idx").val(''); //선택idx 초기화
	
	var params3 = {mode:'acc3_list', type:'3',type_str:$("#serch_acc3_str").val()};

	var thead_html='<tr><th>사업자명</th><th>담당자명</th><th>회의명</th></tr>';
	$("#acc_list_pop_tb thead").html(thead_html);
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_acc3_list('')\">";
			html_str+="<td colspan=3>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#acc_list_pop_tb tbody").html(html_str);
			acc_layer_popup();
		}else{
			$.each(req, function(i,item) {
				if(req[i].idx){
					html_str+="<tr onclick=\"sel_acc3_list('"+req[i].idx+"')\">";
					html_str+="<td>"+req[i].ent_name+"</td><td>"+req[i].dir_name+"</td>";
					html_str+="<td>"+req[i].cf_name+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#acc_list_pop_tb tbody").html(html_str);
			acc_layer_popup();
		}
	},'json');
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
//Acc4등록
function acc4_list(){
	//$("#acc4_list_idx").val(''); //선택idx 초기화
	
	var params3 = {mode:'acc4_list', type:'3',type_str:$("#serch_acc4_str").val()};

	var thead_html='<tr><th>회사명</th><th>회사번호</th><th>이름</th><th>연락처</th><th>아이디</th></tr>';
	$("#acc_list_pop_tb thead").html(thead_html);
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_acc4_list('')\">";
			html_str+="<td colspan=5>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#acc_list_pop_tb tbody").html(html_str);
			acc_layer_popup();
		}else{
			$.each(req, function(i,item) {
				if(req[i].idx){
					html_str+="<tr onclick=\"sel_acc4_list('"+req[i].idx+"')\">";
					html_str+="<td>"+req[i].cp_name+"</td><td>"+req[i].cp_num+"</td>";
					html_str+="<td>"+req[i].name+"</td>"+"<td>"+req[i].tel+"</td>"+"<td>"+req[i].id+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#acc_list_pop_tb tbody").html(html_str);
			acc_layer_popup();
		}
	},'json');
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function acc_new(num){
	$("#acc"+num+"_list_idx").val('');
		
	$("[id^='acc"+num+"_']").each(function (i, el) {
         //console.log(el.value);
         //console.log(el.id);
         //console.log(el.type);
         
         if(el.type!='radio' && el.type!='select-one' && el.type!='number' ){
        	 $("#"+el.id).val('');
         }else if(el.type=='radio'){
        	 $("#"+el.id).prop("checked", false);
         }else if(el.type=='select-one'){
        	 $("#"+el.id).val('1');
         }else if(el.type=='number'){
        	 $("#"+el.id).val('0');
         }
         
    });

	// 기본값 설정
	var d = new Date();
	var today = d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate();

	if(num=='3'){
		 $("#acc3_stdate").val(today);
		 //$("#acc3_cf_open_date").val(today);
		 $("#acc3_cf_mode1").prop('checked',true);
		 $("#acc3_cf_kind1").prop('checked',true);
		 $("#acc3_cf_form1").prop('checked',true);
		 $("#acc3_vol").val('5');
	}
	 
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function acc_save(num){
	if(num==3) {
		if($("#acc3_sp_pwd_ok").val()=='' || $("#acc3_att_pwd_ok").val()==''){
			alert("비밀번호 종복체크를 하여야 합니다.");
			return;
		}
	}
	if(num==4) {
		if($("#acc4_id_ok").val()==''){
			alert("아이디(ID) 종복체크를 하여야 합니다.");
			return;
		}
	}

	var type='';
	
	if($("#acc"+num+"_list_idx").val()=='' || $("#acc"+num+"_list_idx").val()==null){
		type='insert';
	}else{
		type='update';
	}
	
	var dataObject = new Object();
	$("[id^='acc"+num+"_']").each(function (i, el) {
		if(el.type=='radio'){
			var re_key=el.id;
			//console.log( '체크됨111>'+ el.id +'>>'+  re_key.substr(-1) +'//'+re_key.slice(0,-1));
			if($("#"+el.id).prop("checked")==true){ //체크박스 아이디때문에..ex> acc_cf_mode2가체크면 acc_cf_mode=2로 바꾸기위한 작업
				//console.log( '체크됨>'+ el.id +'>>'+  re_key.substr(-1) +'//'+re_key.slice(0,-1));
				dataObject[re_key.slice(0,-1)] = re_key.substr(-1);
			}
        }else if(el.id!="acc"+num+"_list_idx"){
			if(el.id!="acc3_sp_pwd_ok" && el.id!="acc3_att_pwd_ok" && el.id!="acc4_id_ok")
        		dataObject[el.id] = el.value;
        }
		
    });
	
	console.log(dataObject);
	dataObject = JSON.stringify( dataObject );
	
	
	
	$.ajax({ type: "POST", url: "get_json.php?&mode=acc_save&num="+num+"&type="+type+"&idx="+$("#acc"+num+"_list_idx").val(), data: {json:dataObject}, success: function(req){ 

		if(type=='insert'){
			//console.log(req);
			alert('[신규]저장되었습니다.');
				//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
				var jsonObj = JSON.parse(req);
				$("#acc"+num+"_list_idx").val(jsonObj.idx);
		}else{
			console.log(req);
			alert('[수정]수정되었습니다.');
		}
		
	}});
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function acc_del(num){
	if($("#acc"+num+"_list_idx").val()=='' || $("#acc"+num+"_list_idx").val()==null)
		type='insert';
	else
		type='update';
	
	if(type=='update'){
		var result = confirm('삭제하시겠습니까?'); 
		if(result){ //yes 
			$.ajax({ type: "POST", url: "get_json.php?&mode=acc"+num+"_del", data: {idx:$("#acc"+num+"_list_idx").val()}, success: function(req){ 

					alert('삭제되었습니다.');
					acc_new(num);
				
			}});
			///
		}else { //no 
			
		}
	}else{
		alert('삭제할 회의를 선택해주세요.');
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 팝업 - 회의 - 레이어
function acc4_pop_addr(){
	var addr_name = $("#acc4_con_grp").val();
	var params3 = {mode:'mon5_pop_addr', addr_name:addr_name};

	var thead_html='<tr><th>주소록 그룹</th><th>사용자수</th></tr>';
	$("#acc_addr_pop thead").html(thead_html);

	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_mon5_pop_addrlist('')\">";
			html_str+="<td colspan=3>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#acc_addr_pop tbody").html(html_str);
			
			var layer = document.getElementById("popup_layer_addr_list"); 
			layer.style.visibility="visible";
		}else{
			$.each(req, function(i,item) {
				if(req[i].con_grp){
					html_str+="<tr onclick=\"sel_acc4_pop_addr('"+req[i].con_grp+"')\">";
					html_str+="<td>"+req[i].con_grp+"</td><td>"+req[i].cnt+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#acc_addr_pop tbody").html(html_str);

			var layer = document.getElementById("popup_layer_acc4_addr"); 
			layer.style.visibility="visible";
		}
	},'json');
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 팝업 - 회의 - 검색
function sel_acc4_pop_addr(idx){
	document.getElementById('popup_layer_acc4_addr').style.visibility='hidden';

	$("#acc4_con_grp").val(idx);
}






////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 팝업 - 회의 - 레이어
function mon1_pop_addr(){
	var addr_name = $("#main2_con_grp").val();
	var params3 = {mode:'mon5_pop_addr', addr_name:addr_name};

	var thead_html='<tr><th>주소록 그룹</th><th>사용자수</th></tr>';
	$("#mon1_addr_pop thead").html(thead_html);

	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_mon5_pop_addrlist('')\">";
			html_str+="<td colspan=3>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#mon1_addr_pop tbody").html(html_str);
			
			var layer = document.getElementById("popup_layer_addr_list"); 
			layer.style.visibility="visible";
		}else{
			$.each(req, function(i,item) {
				if(req[i].con_grp){
					html_str+="<tr onclick=\"sel_mon1_pop_addr('"+req[i].con_grp+"')\">";
					html_str+="<td>"+req[i].con_grp+"</td><td>"+req[i].cnt+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#mon1_addr_pop tbody").html(html_str);

			var layer = document.getElementById("popup_layer_mon1_addr"); 
			layer.style.visibility="visible";
		}
	},'json');
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 팝업 - 회의 - 검색
function sel_mon1_pop_addr(idx){
	document.getElementById('popup_layer_mon1_addr').style.visibility='hidden';

	$("#main2_con_grp").val(idx);
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//증복체크 - 주최자 비번
function dup_acc3_sp_pwd() {
	var mypwd = $("#acc3_sp_pwd").val();
	if(mypwd.length!=6) {
		alert("6자리로 입력 하셔야 합니다!");
		return;
	}

	var params3 = {mode:'dup_acc3_sp_pwd', idx:$("#acc3_list_idx").val(), pwd:$("#acc3_sp_pwd").val()};

	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			alert("오류가 발생하였습니다. 다시 시도하여 주십시오.");
		}else{
			if(req=="0"){
				$("#acc3_sp_pwd_ok").val('▶완료');
				alert("체크완료 되었습니다.");
			}
			else {
				$("#acc3_sp_pwd_ok").val('');
				alert("중복된 패스워드가 있습니다!");
			}
		}
	},'json');
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//증복체크 - 참석자 비번
function dup_acc3_att_pwd() {
	var mypwd = $("#acc3_att_pwd").val();
	if(mypwd.length!=6) {
		alert("6자리로 입력 하셔야 합니다!");
		return;
	}

	var params3 = {mode:'dup_acc3_att_pwd', idx:$("#acc3_list_idx").val(), pwd:$("#acc3_att_pwd").val()};

	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			alert("오류가 발생하였습니다. 다시 시도하여 주십시오.");
		}else{
			if(req=="0"){
				$("#acc3_att_pwd_ok").val('▶완료');
				alert("체크완료 되었습니다.");
			}
			else {
				$("#acc3_att_pwd_ok").val('');
				alert("중복된 패스워드가 있습니다!");
			}
		}
	},'json');
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//증복체크 - 주최자 비번
function dup_main1_sp_pwd() {
	var mypwd = $("#main1_sp_pwd").val();
	if(mypwd.length!=6) {
		alert("6자리로 입력 하셔야 합니다!");
		return;
	}

	var params3 = {mode:'dup_acc3_sp_pwd', idx:$("#main1_list_idx").val(), pwd:$("#main1_sp_pwd").val()};

	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			alert("오류가 발생하였습니다. 다시 시도하여 주십시오.");
		}else{
			if(req=="0"){
				$("#main1_sp_pwd_ok").val('▶완료');
				alert("체크완료 되었습니다.");
			}
			else {
				$("#main1_sp_pwd_ok").val('');
				alert("중복된 패스워드가 있습니다!");
			}
		}
	},'json');
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//증복체크 - 참석자 비번
function dup_main1_att_pwd() {
	var mypwd = $("#main1_att_pwd").val();
	if(mypwd.length!=6) {
		alert("6자리로 입력 하셔야 합니다!");
		return;
	}

	var params3 = {mode:'dup_acc3_att_pwd', idx:$("#main1_list_idx").val(), pwd:$("#main1_att_pwd").val()};

	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			alert("오류가 발생하였습니다. 다시 시도하여 주십시오.");
		}else{
			if(req=="0"){
				$("#main1_att_pwd_ok").val('▶완료');
				alert("체크완료 되었습니다.");
			}
			else {
				$("#main1_att_pwd_ok").val('');
				alert("중복된 패스워드가 있습니다!");
			}
		}
	},'json');
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//증복체크 - 사용자 아이디
function dup_acc4_id() {
	var myID = $("#acc4_id").val();
	/*
	if(myID.length!=6) {
		alert("6자리로 입력 하셔야 합니다!");
		return;
	}
	*/

	var params3 = {mode:'dup_acc4_id', idx:$("#acc4_list_idx").val(), pwd:$("#acc4_id").val()};

	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			alert("오류가 발생하였습니다. 다시 시도하여 주십시오.");
		}else{
			if(req=="0"){
				$("#acc4_id_ok").val('▶완료');
				alert("체크완료 되었습니다.");
			}
			else {
				$("#acc4_id_ok").val('');
				alert("중복된 패스워드가 있습니다!");
			}
		}
	},'json');
}



////////////////////////////////////////////////////////////////////////////////////////////////////
function mon_new(num){
	
	$("#NOW_SELROOM1").val('');

	$("#main"+num+"_list_idx").val('');
	
	 $("[id^='main"+num+"_']").each(function (i, el) {
         //console.log(el.value);
         //console.log(el.id);
         //console.log(el.type);
         
         if(el.type!='radio' && el.type!='select-one' && el.type!='number' ){
        	 $("#"+el.id).val('');
         }else if(el.type=='radio'){
        	 $("#"+el.id).prop("checked", false);
         }else if(el.type=='select-one'){
        	 $("#"+el.id).val('1');
         }else if(el.type=='number'){
        	 $("#"+el.id).val('0');
         }
         
     });

	 // 기본값 설정
	var d = new Date();
	var today = d.getFullYear() + '-' + d.getMonth() + 1 + '-' + d.getDate();

	if(num=='1'){
		 $("#main1_stdate").val(today);
		 //$("#main1_cf_open_date").val(today);
		 $("#main1_cf_mode1").prop('checked',true);
		 $("#main1_cf_kind1").prop('checked',true);
		 $("#main1_cf_form1").prop('checked',true);
		 $("#main1_vol").val('5');
	}
	 
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function mon_save(num){

	if(num=='1') {
		if($("#main1_sp_pwd_ok").val()=='' || $("#main1_att_pwd_ok").val()==''){
			alert("비밀번호 종복체크를 하여야 합니다.");
			return;
		}
	}

	var type='';
	
	if($("#main"+num+"_list_idx").val()=='' || $("#main"+num+"_list_idx").val()==null){
		type='insert';
	}else{
		type='update';
	}
	
	var dataObject = new Object();
	$("[id^='main"+num+"_']").each(function (i, el) {
		if(el.type=='radio'){
			var re_key=el.id;
			//console.log( '체크됨111>'+ el.id +'>>'+  re_key.substr(-1) +'//'+re_key.slice(0,-1));
			if($("#"+el.id).prop("checked")==true){ //체크박스 아이디때문에..ex> main_cf_mode2가체크면 main_cf_mode=2로 바꾸기위한 작업
				//console.log( '체크됨>'+ el.id +'>>'+  re_key.substr(-1) +'//'+re_key.slice(0,-1));
				dataObject[re_key.slice(0,-1)] = re_key.substr(-1);
			}
        }else if(el.id!="main"+num+"_list_idx"){
			if(el.id!="main1_sp_pwd_ok" && el.id!="main1_att_pwd_ok")
        		dataObject[el.id] = el.value;
        }
		
    });
	
	console.log(dataObject);
	dataObject = JSON.stringify( dataObject );
	
	
	
	$.ajax({ type: "POST", url: "get_json.php?mode=mon_save&num="+num+"&type="+type+"&idx="+$("#main"+num+"_list_idx").val(), data: {json:dataObject}, success: function(req){ 

		if(type=='insert'){
			alert('[신규]저장되었습니다.');
				//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
				var jsonObj = JSON.parse(req);
				$("#main3_list_idx").val(jsonObj.idx);
		}else{
			alert('[수정]수정되었습니다.');
		}
		
	}});
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function mon_del(num){
	if($("#main"+num+"_list_idx").val()=='' || $("#main"+num+"_list_idx").val()==null)
		type='insert';
	else
		type='update';
	
	if(type=='update'){
		var result = confirm('삭제하시겠습니까?'); 
		if(result){ //yes 
			$.ajax({ type: "POST", url: "get_json.php?mode=mon_del&num="+num, data: {idx:$("#main"+num+"_list_idx").val()}, success: function(req){ 

					alert('삭제되었습니다.');
					mon_new(num);
				
			}});
			///
		}else { //no 
			
		}
	}else{
		alert('삭제할 회의를 선택해주세요.');
	}
}



////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 회의검색
function mon5_pop_list(){
	//$("#mon5_pop_idx").val(''); //선택idx 초기화
	
	var params3 = {mode:'mon5_pop', ent_name:$("#mon5_pop_ent_name").val(), pay_num:$("#mon5_pop_pay_num").val(), cf_nu:$("#mon5_pop_cf_num").val(), sp_pwd:$("#mon5_pop_sp_pwd").val(), att_pwd:$("#mon5_pop_att_pwd").val()};

	var thead_html='<tr><th>사업자명</th><th>담당자명</th><th>회의명</th></tr>';
	$("#mon5_list_pop_acc thead").html(thead_html);
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_mon5_pop_list('')\">";
			html_str+="<td colspan=3>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#mon5_list_pop_acc tbody").html(html_str);
			acc_layer_popup();
		}else{
			$.each(req, function(i,item) {
				if(req[i].idx){
					html_str+="<tr onclick=\"sel_mon5_pop_list('"+req[i].idx+"')\">";
					html_str+="<td>"+req[i].ent_name+"</td><td>"+req[i].dir_name+"</td>";
					html_str+="<td>"+req[i].cf_name+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#mon5_list_pop_acc tbody").html(html_str);
			acc_layer_popup();
		}
	},'json');
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 레이어 결과선택
function sel_mon5_pop_list(idx){
	$("#mon5_pop_idx").val(idx); 
	acc_layer_close();

	var params3 = {mode:'sel_acc3_list', type:idx};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
				$("#mon5_"+"cf_name").val(req[i].cf_name);
				$("#mon5_"+"cf_open_date").val(req[i].cf_open_date);
				$("#mon5_"+"cf_open_time").val(req[i].cf_open_time);				
			});
		}
	},'json');

	
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 주소록
function mon5_pop_addrlist(){
	if($("#mon5_pop_idx").val()=="") {
		alert("회의검색을 하여 회의를 선택하셔야 합니다.");
		return;
	}

	//$("#mon5_pop_idx").val(''); //선택idx 초기화
	
	var params3 = {mode:'mon5_pop_addr', addr_name:$("#addr_name").val()};

	var thead_html='<tr><th>주소록 그룹</th><th>사용자수</th></tr>';
	$("#mon5_list_pop_addr thead").html(thead_html);
	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			html_str+="<tr onclick=\"sel_mon5_pop_addrlist('')\">";
			html_str+="<td colspan=3>검색결과가 없습니다.</td>";
			html_str+="</tr>";
			$("#mon5_list_pop_addr tbody").html(html_str);
			
			var layer = document.getElementById("popup_layer_addr_list"); 
			layer.style.visibility="visible";
		}else{
			$.each(req, function(i,item) {
				if(req[i].con_grp){
					html_str+="<tr onclick=\"sel_mon5_pop_addrlist('"+req[i].con_grp+"')\">";
					html_str+="<td>"+req[i].con_grp+"</td><td>"+req[i].cnt+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#mon5_list_pop_addr tbody").html(html_str);

			var layer = document.getElementById("popup_layer_addr_list"); 
			layer.style.visibility="visible";
		}
	},'json');
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 주소록 레이어 결과선택
function sel_mon5_pop_addrlist(addr_name){
	var layer = document.getElementById("popup_layer_addr_list"); 
	layer.style.visibility="hidden";

	mon5_list_user('',addr_name);
}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 참석자 검색
function mon5_list_user(gubun, addr_name){
	if($("#mon5_pop_idx").val()=="") {
		alert("회의검색을 하여 회의를 선택하셔야 합니다.");
		return;
	}

	if (gubun=='1')
		cp_num = $("#mon5_pop_idx").val();
	else
		cp_num = '';

	var params3 = {mode:'mon5_list_user', cp_num:cp_num, addr_name:addr_name};

	var html_str='';
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			$("#div-main5-tbody").html(html_str);
		}else{
			$.each(req, function(i,item) {
				if(req[i].idx){
					html_str+="<tr>";
					html_str+="<td class='ct'><input type='checkbox' name='chk_mon5' value='"+req[i].idx+"'></td>";
					html_str+="<td>"+req[i].idx+"</td>";
					html_str+="<td>"+req[i].con_grp+"</td>";
					html_str+="<td>"+req[i].cp_name+"</td>";
					html_str+="<td>"+req[i].name+"</td>";
					html_str+="<td>"+req[i].div_pos+"</td>";
					html_str+="<td>"+req[i].gender+"</td>";
					html_str+="<td>"+req[i].tel+"</td>";
					html_str+="<td>"+req[i].email+"</td>";
					html_str+="</tr>";
				}else{
					
				}
			});
			$("#div-main5-tbody").html(html_str);
			$("#chk_mon5_all").attr("checked", false);
		}
	},'json');
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////
//Monitor 참석자 추가
function mon5_chk_save(type){
	if($("#mon5_pop_idx").val()=="") {
		alert("회의검색을 하여 회의를 선택하셔야 합니다.");
		return;
	}

	conf_idx = $("#mon5_pop_idx").val();

	var dataObject = new Object();

	$("input[name=chk_mon5]:checked").each(function(i, el) {
		var chk_idx = $(this).val();
       	dataObject[i+1] = chk_idx;
	
    });
	
	console.log(dataObject);
	dataObject = JSON.stringify( dataObject );

	$.ajax({ type: "POST", url: "get_json.php?&mode=mon5_chk_save&type="+type+"&conf_idx="+conf_idx, data: {json:dataObject}, success: function(req){ 

		if(type=='insert'){
			alert('추가 되었습니다.');
		}else if(type=='delete'){
			alert('삭제 되었습니다.');
		}

		mon5_list_user('1','');
		
	}});
}




function mon5_list(idx){
	var params3 = {mode:'sel_acc3_list', type:idx};
	$.get("get_json.php", params3, function(req,data){
		if(req==null){
			//$("#reslist").append("<tr><td colspan='7'>예약리스트가 없습니다.</td></tr>");
		}else{
			$.each(req, function(i,item) {
				$("#mon5_"+"cf_name").val(req[i].cf_name);
				$("#mon5_"+"cf_open_date").val(req[i].cf_open_date);
				$("#mon5_"+"cf_open_time").val(req[i].cf_open_time);				
			});
		}
	},'json');
}


////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
function db_list(num){

	if (num==3) {

		$("#db3_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'db_list',num:'3', type:'3',type_str:$("#serch_db3_str").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=19>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db3-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d3tr_"+req[i].idx+" onclick=\"sel_db_list('"+req[i].idx+"',3)\">";//두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
					  //console.log( key + '=>' + object[key] );
					   if( key=='idx' || key=='regdate'|| key=='pay_part'){
						  
					  }else if(key=='stdate'||key=='enddate'){
						  html_str+="<td>"+object[key].substring(0,10)+"</td>";
					  }else if(key=='cf_sche'){
						  if(object[key]=='1')html_str+="<td>항상</td>";
						  else if(object[key]=='2')html_str+="<td>매주</td>";
						  else if(object[key]=='3')html_str+="<td>매월</td>";
						  else if(object[key]=='4')html_str+="<td>1회</td>";
						  else html_str+="<td></td>";
					  }else if(key=='in_wav' || key=='out_wav' ){
						  if(object[key]=='1')html_str+="<td>알람</td>";
						  else if(object[key]=='2')html_str+="<td>묵음</td>";
						  else if(object[key]=='3')html_str+="<td>롤콜</td>";
						  else html_str+="<td></td>";
					  }else if(key=='rec_type'){
						  if(object[key]=='1')html_str+="<td>기본</td>";
						  else if(object[key]=='2')html_str+="<td>항상</td>";
						  else html_str+="<td></td>";
					  }else if(key=='cf_mode'){
						  if(object[key]=='1')html_str+="<td>일반</td>";
						  else if(object[key]=='2')html_str+="<td>세미나</td>";
						  else html_str+="<td></td>";
					  }else if(key=='cf_kind'){
						  if(object[key]=='1')html_str+="<td>기본</td>";
						  else if(object[key]=='2')html_str+="<td>2중보안</td>";
						  else html_str+="<td></td>";
					  }else if(key=='cf_form'){
						  if(object[key]=='1')html_str+="<td>일반</td>";
						  else if(object[key]=='2')html_str+="<td>호출</td>";
						  else html_str+="<td></td>";
					  }else{
						  html_str+="<td>"+object[key]+"</td>";
					  }
					  
					}
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db3-tbody").html(html_str);
			}
		},'json');
	}
	
	if (num==4) {

		$("#db4_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'db_list', num:'4', cp_name:$("#cp_name").val(), div_name:$("#div_name").val(), div_pos:$("#div_pos").val(), name:$("#name").val(), con_grp:$("#con_grp").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=20>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db4-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d4tr_"+req[i].idx+" onclick=\"sel_db_list('"+req[i].idx+"',4)\">"; //두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
						  //console.log( key + '=>' + object[key] );
						  if( key=='idx' || key=='regdate'){
							  
						  }else if(key=='level'){
							  html_str+="<td>"+get_level(object[key])+"</td>";



						  }else if(key=='cf_call' || key=='cf_control' || key=='cf_make'|| key=='cf_rec'){
							  html_str+="<td>"+$("#acc4_"+key).find("option[value='"+object[key]+"']").text()+"</td>";
						  }else{
							  html_str+="<td>"+object[key]+"</td>";
						  }
					  
					}
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db4-tbody").html(html_str);
			}
		},'json');
	}

	if (num==5) {
	
		$("#db5_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'db_list',num:'5', type:'4',type_str:$("#serch_db5_str").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=12>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db5-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d5tr_"+req[i].idx+" onclick=\"sel_db_list('"+req[i].idx+"',5)\">"; //두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
						  //console.log( key + '=>' + object[key] );
						  if( key=='idx' || key=='regdate'){
							  
						  }else{
							  html_str+="<td>"+object[key]+"</td>";
						  }
					  
					}
					//파일듣기,다운 두줄
					if(req[i].play_name!='') {
						html_str+="<td><input type='button' value='듣기' onclick=pop_play('"+req[i].play_name+"')></td>";
						html_str+="<td><input type='button' value='다운' onclick=pop_down('"+req[i].play_name+"')></td>";
						html_str+="<td><input type='button' value='삭제' onclick=pop_del('"+req[i].play_name+"')></td>";
					}
					else {
						html_str+="<td></td><td></td>";
					}
					
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db5-tbody").html(html_str);
			}
		},'json');
	}		
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function sel_db_list(idx,num){
	$("[id^=d"+num+"tr_]").css('background-color','#fff');
	$("#db"+num+"_list_idx").val(idx);
	$("#d"+num+"tr_"+idx).css("background-color","#FFC19E");

	/*
	console.log( $("#d"+num+"tr_"+idx).css('background-color')  );
	console.log( $("#d"+num+"tr_"+idx).css('color')  );
	if( $("#d"+num+"tr_"+idx).css('background-color')=='rgb(255, 255, 255)' ){
		$("#d"+num+"tr_"+idx).css('background-color','rgb(171, 188, 239)');
	}else{
		$("#d"+num+"tr_"+idx).css('background-color','#fff');
	}
	*/
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function sel_db_list_all(mode,num){
	if(mode==1){
		$("[id^=d"+num+"tr_]").css('background-color','rgb(171, 188, 239)');
	}else{
		$("[id^=d"+num+"tr_]").css('background-color','#fff');
	}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////
function db_list_del(num){
	var myidx = $("#db"+num+"_list_idx").val();

	if(myidx=="")
		alert("목록에서 선택 하셔야 합니다.");
	else {
		var result = confirm('선택한 항목을 삭제하시겠습니까?'); 
		if(result){ //yes 			
			$.ajax({ type: "POST", url: "get_json.php?&mode=acc"+num+"_del", data: {idx:myidx}, success: function(req){ 
				alert('삭제되었습니다.');
				db_list(num);
			}});
		}
	}
}


////////////////////////////////////////////////////////////////////////////////////////////////////
function db_list_update(num){
	$myidx = $("#db"+num+"_list_idx").val();

	if($myidx==''){
		alert("목록에서 선택 하셔야 합니다.");return;
	}else{
		window.location.href="account.php?menu="+num+"&idx=" + $myidx;
	}
}




////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
function report_list(num){

	if (num==4) {

		$("#db3_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'report_list',num:'3', type:'3',type_str:$("#serch_db3_str").val(),date_st:$("#date_st").val(),date_ed:$("#date_ed").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=19>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db4-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d3tr_"+req[i][0]+" onclick=\"sel_db_list('"+req[i][0]+"',3)\">";//두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
					  //console.log( key + '=>' + object[key] );
					  if(key=='0'){

					  }
					  else if(key=='10'){
						  if(object[key]=='1')html_str+="<td>일반</td>";
						  else if(object[key]=='2')html_str+="<td>세미나</td>";
						  else html_str+="<td></td>";
					  }else{
						  html_str+="<td>"+object[key]+"</td>";
					  }
					  
					}
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db4-tbody").html(html_str);
			}
		},'json');
	}
	
	if (num==5) {

		$("#db3_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'report_list',num:'4', type:'3',type_str:$("#serch_db3_str").val(),date_st:$("#date_st").val(),date_ed:$("#date_ed").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=19>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db5-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d3tr_"+req[i][0]+" onclick=\"sel_db_list('"+req[i][0]+"',3)\">";//두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
					  //console.log( key + '=>' + object[key] );
					  if(key=='0'){

					  }else if(key=='10'){
						  if(object[key]=='1')html_str+="<td>일반</td>";
						  else if(object[key]=='2')html_str+="<td>세미나</td>";
						  else html_str+="<td></td>";
					  }else{
						  html_str+="<td>"+object[key]+"</td>";
					  }
					  
					}
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db5-tbody").html(html_str);
			}
		},'json');
	}

	if (num==6) {
	
		$("#db5_list_idx").val(''); //선택idx 초기화
									//num중요 
		var params3 = {mode:'db_list',num:'5', type:'4',type_str:$("#serch_db5_str").val()};

		var html_str='';
		var rowcnt=0;
		$.get("get_json.php", params3, function(req,data){
			if(req==null){
				html_str+="<tr onclick=\"sel_db_list('')\">";
				html_str+="<td colspan=12>검색결과가 없습니다.</td>";
				html_str+="</tr>";
				$("#div-db5-tbody").html(html_str);
			}else{
				$.each(req, function(i,item) {
					//console.log( 'i=>'+i+'//item=>'+item+'//req[i]=>'+Object.keys(req[i]) );
					var object = req[i];//d+넘버체크+tr_
					html_str+="<tr id=d5tr_"+req[i].idx+" onclick=\"sel_db_list('"+req[i].idx+"',6)\">"; //두번째파라미터체크

					rowcnt++;
					html_str+="<td>"+rowcnt+"</td>";
					for( var key in object ) {
						  //console.log( key + '=>' + object[key] );
						  if( key=='idx' || key=='regdate'){
							  
						  }else{
							  html_str+="<td>"+object[key]+"</td>";
						  }
					  
					}
					//파일듣기,다운 두줄
					if(req[i].play_name!='') {
						html_str+="<td><input type='button' value='듣기' onclick=pop_play('"+req[i].play_name+"')></td>";
						html_str+="<td><input type='button' value='다운' onclick=pop_down('"+req[i].play_name+"')></td>";
					}
					else {
						html_str+="<td></td><td></td>";
					}
					
					html_str+="</tr>";
					//console.log('------------------------');
				});
				$("#div-db5-tbody").html(html_str);
			}
		},'json');
	}		
}











////////////////////
function chfont_dbtb(dbtype){
	$size=$("#chfont_db"+dbtype).val();
	$("#contb-d"+dbtype+" td").css('font-size',$size+"px");
	//$("#contb-d3").css('font-size','');
}
function chfont_dbtb_normal(dbtype){
	$("#chfont_db"+dbtype).val(16);
	chfont_dbtb(dbtype);
}










////////////////////////////////////////////////////////////////////////////////////////////////////
function control_one(mode){
	
	if($("#NOW_SELROOM2").val()==null){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM2").val()==""){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM2").val()=="0"){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}

	var useridx = $("#NOW_SELROOM2").val();
	var idxes='';

	$.ajax({ type: "POST", url: "ami/control.php?isweb=2&useridx="+useridx+"&MODE="+mode, data: {idxes:idxes}, success: function(req){ 

		if (req=="SUCCESS"){
			alert('처리 되었습니다.');
		}else{
			alert(req);
		}
		
	}});
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////
function control_all(mode){
	if($("#NOW_SELROOM1").val()==null){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()==""){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()=="0"){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}

	var roomnum = $("#NOW_SELROOM1").val();

	var idxes='';

	$.ajax({ type: "POST", url: "ami/control.php?isweb=1&roomnum="+roomnum+"&MODE="+mode, data: {idxes:idxes}, success: function(req){ 

		if (req=="SUCCESS"){
			alert('처리 되었습니다.');
		}else{
			alert(req);
		}
		
	}});
	
}


////////////////////////////////////////////////////////////////////////////////////////////////////
function control_start(){
	
	if($("#NOW_SELROOM1").val()==null){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()==""){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()=="0"){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}

	var roomnum = $("#NOW_SELROOM1").val();

	var idxes='';

	var result = confirm('회의시작을 하시겠습니까?'); 

	if(result){ //yes 
		//alert('테스트용 데이타로 종료를 못하게 했습니다.');

		$.ajax({ type: "POST", url: "ami/conf_start.php?roomnum="+roomnum, data: {idxes:idxes}, success: function(req){ 

			if (req=="SUCCESS"){
				alert('처리 되었습니다.');
			}else{
				alert(req);
			}
			
		}});
	}

}

////////////////////////////////////////////////////////////////////////////////////////////////////
function control_end(){
	
	if($("#NOW_SELROOM1").val()==null){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()==""){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()=="0"){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}

	var roomnum = $("#NOW_SELROOM1").val();

	var idxes='';

	var result = confirm('회의종료를 하시겠습니까?'); 

	if(result){ //yes 
		//alert('테스트용 데이타로 종료를 못하게 했습니다.');

		$.ajax({ type: "POST", url: "ami/conf_end.php?roomnum="+roomnum, data: {idxes:idxes}, success: function(req){ 

			if (req=="SUCCESS"){
				$("#NOW_SELROOM1").val("");
				alert('처리 되었습니다.');
			}else{
				alert(req);
			}
			
		}});
	}

}


////////////////////////////////////////////////////////////////////////////////////////////////////
function control_etc(mode){
	
	if($("#NOW_SELROOM2").val()==null){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM2").val()==""){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM2").val()=="0"){
		alert('회의자를 선택 하셔야 합니다.');
		return;
	}

	var useridx = $("#NOW_SELROOM2").val();
	var idxes='';

	$.ajax({ type: "POST", url: "ami/" + mode + ".php?isweb=2&useridx="+useridx, data: {idxes:idxes}, success: function(req){ 

		if (req=="SUCCESS"){
			alert('처리 되었습니다.');
		}else{
			alert(req);
		}
		
	}});
}


////////////////////////////////////////////////////////////////////////////////////////////////////
function control_music(mode){
	if($("#NOW_SELROOM1").val()==null){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()==""){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}
	if($("#NOW_SELROOM1").val()=="0"){
		alert('회의룸을 선택 하셔야 합니다.');
		return;
	}

	var roomnum = $("#NOW_SELROOM1").val();

	var idxes='';

	$.ajax({ type: "POST", url: "ami/auto_music.php?roomnum="+roomnum+"&MODE="+mode, data: {idxes:idxes}, success: function(req){ 

		if (req=="SUCCESS"){
			alert('처리 되었습니다.');
		}else{
			alert(req);
		}
		
	}});
	
}


var popup_obj = null;

function popupOpen(url, name, width, height, top, left, scrollbars, mode) {
	if(mode == 1) {
		popup_obj = window.open(url, name, 'top='+top+', left='+left+', width='+width+', height='+height+', scrollbars='+scrollbars);
	} else {
		var sc_left = (screen.width-width)/2;
		var sc_top = (screen.height-height)/2;
		popup_obj = window.open(url, name, 'top='+sc_top+', left='+sc_left+', width='+width+', height='+height+', scrollbars='+scrollbars);
	}
	return popup_obj;
}

////////////////////////////////////////////////////////////////////////////////////////////////////
function pop_play(myfile) {
	var szUrl ="pop_media.php?fname=" + myfile;
	popup=window.open(szUrl,'newwindow','width=350,height=250,toolbar=0,directories=0,status=0,menuber=0,scrollbars=0,resizable=0');
}

function pop_down(myfile) {
	var PopPlay = popupOpen('pop_down.php?fname='+myfile,'PopDown',310,150);
	PopPlay.focus();
}

function pop_del(myfile) {
	var szUrl ="pop_del.php?fname=" + myfile;
	popup=window.open(szUrl,'newwindow','width=550,height=250,toolbar=0,directories=0,status=0,menuber=0,scrollbars=0,resizable=0');
}



function sys_list1(){
	var params3 = {};
	var html_str='';
	$.get("sys/sys1.php", params3, function(req,data){
		if(req==null){
			html_str+="";
			$("#div-sys1-tbody").html(html_str);
		}else{
			html_str+=req;
			$("#div-sys1-tbody").html(html_str);
		}
	});
	
}

function sys_list2(){
	var params3 = {};
	var html_str='';
	$.get("sys/sys2.php", params3, function(req,data){
		if(req==null){
			html_str+="";
			$("#div-sys2-tbody").html(html_str);
		}else{
			html_str+=req;
			$("#div-sys2-tbody").html(html_str);
		}
	});
}

function sys_list3(){
	var params3 = {};
	var html_str='';
	$.get("sys/sys3.php", params3, function(req,data){
		if(req==null){
			html_str+="";
			$("#div-sys3-tbody").html(html_str);
		}else{
			html_str+=req;
			$("#div-sys3-tbody").html(html_str);
		}
	});
}

function sys_list4(){
	var params3 = {};
	var html_str='';
	$.get("sys/sys4.php", params3, function(req,data){
		if(req==null){
			html_str+="";
			$("#div-sys4-tbody").html(html_str);
		}else{
			html_str+=req;
			$("#div-sys4-tbody").html(html_str);
		}
	});
}


function mon_head(){
	var params3 = {};
	var html_str='';
	$.get("sys/mon_head.php", params3, function(req,data){
		if(req==null){
			html_str+="";
			$("#div-mon-head").html(html_str);
		}else{
			html_str+=req;
			$("#div-mon-head").html(html_str);
		}
	});
}


