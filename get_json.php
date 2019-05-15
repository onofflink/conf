<?php 
//error_reporting(E_ALL);

//ini_set("display_errors", 1);



include_once "inc_db_conn.php";

////////////////////////////////////////////////////////
if($_GET['mode']=='sel_acc3_list'){ // 
    $idx=$_GET['type'];
	$roomnum=$_GET['roomnum'];

	if($roomnum) {
		$sql="select cf_num from cfr_mon_1 where room_num='".$roomnum."'";
		$result = mysql_query($sql);
		$row=mysql_fetch_array($result);
		$idx=$row['cf_num'];
	}

	$sql="select * from acc_conf where idx='".$idx."'";
    $sql.=" order by regdate desc";
    $result = mysql_query($sql);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "idx"=>iconv('euc-kr','utf-8',$row['idx'])
            
            ,"ent_name"=>iconv('euc-kr','utf-8',$row['ent_name'])
            ,"pay_num"=>iconv('euc-kr','utf-8',$row['pay_num'])
            ,"pay_type"=>iconv('euc-kr','utf-8',$row['pay_type'])
            ,"pay_part"=>iconv('euc-kr','utf-8',$row['pay_part'])
            ,"dir_name"=>iconv('euc-kr','utf-8',$row['dir_name'])
            ,"cf_name"=>iconv('euc-kr','utf-8',$row['cf_name'])
            
            
            ,"stdate"=>iconv('euc-kr','utf-8',substr($row['stdate'],0,10))
            ,"enddate"=>iconv('euc-kr','utf-8',substr($row['enddate'],0,10))
            
            ,"cf_sche"=>iconv('euc-kr','utf-8',$row['cf_sche'])
            ,"cf_open_date"=>iconv('euc-kr','utf-8',$row['cf_open_date'])
			,"cf_open_time"=>iconv('euc-kr','utf-8',$row['cf_open_time'])
            
            ,"sp_pwd"=>iconv('euc-kr','utf-8',$row['sp_pwd'])
            ,"att_pwd"=>iconv('euc-kr','utf-8',$row['att_pwd'])
            
            ,"cf_mode"=>iconv('euc-kr','utf-8',$row['cf_mode'])
            ,"cf_kind"=>iconv('euc-kr','utf-8',$row['cf_kind'])
            ,"cf_form"=>iconv('euc-kr','utf-8',$row['cf_form'])
            
            ,"att_cnt"=>iconv('euc-kr','utf-8',$row['att_cnt'])
            ,"in_wav"=>iconv('euc-kr','utf-8',$row['in_wav'])
            ,"out_wav"=>iconv('euc-kr','utf-8',$row['out_wav'])
            ,"vol"=>iconv('euc-kr','utf-8',$row['vol'])
            ,"rec_type"=>iconv('euc-kr','utf-8',$row['rec_type'])
            ,"regdate"=>iconv('euc-kr','utf-8',$row['regdate'])
            
        );
        //echo $row['idx'];
    }
    echo json_encode($arr);
}
////////////////////////////////////////////////////////
if($_GET['mode']=='sel_acc4_list'){ //
    $qry="SELECT column_name
    FROM INFORMATION_SCHEMA.columns
    WHERE table_name='acc_user'";
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $col_arr[$i]=$row[0];
    }
    
    $idx=$_GET['type'];
    $sql="select * from acc_user where 1=1 and idx='".$idx."'";
    $sql.=" order by regdate desc";
    $result = mysql_query($sql);
    for($ii=0;$row=mysql_fetch_array($result);$ii++){
        for($k=0;$k<$i;$k++){
            $arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8',$row[ $col_arr[$k] ]);
        }
    }
    
    /*for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "idx"=>iconv('euc-kr','utf-8',$row['idx'])
            
            ,"ent_name"=>iconv('euc-kr','utf-8',$row['ent_name'])
            ,"pay_num"=>iconv('euc-kr','utf-8',$row['pay_num'])
            ,"pay_type"=>iconv('euc-kr','utf-8',$row['pay_type'])
            ,"pay_part"=>iconv('euc-kr','utf-8',$row['pay_part'])
            ,"dir_name"=>iconv('euc-kr','utf-8',$row['dir_name'])
            ,"cf_name"=>iconv('euc-kr','utf-8',$row['cf_name'])
            
            
            ,"stdate"=>iconv('euc-kr','utf-8',substr($row['stdate'],0,10))
            ,"enddate"=>iconv('euc-kr','utf-8',substr($row['enddate'],0,10))
            
            ,"cf_sche"=>iconv('euc-kr','utf-8',$row['cf_sche'])
            ,"cf_open"=>iconv('euc-kr','utf-8',$row['cf_open'])
            
            ,"sp_pwd"=>iconv('euc-kr','utf-8',$row['sp_pwd'])
            ,"att_pwd"=>iconv('euc-kr','utf-8',$row['att_pwd'])
            
            ,"cf_mode"=>iconv('euc-kr','utf-8',$row['cf_mode'])
            ,"cf_kind"=>iconv('euc-kr','utf-8',$row['cf_kind'])
            ,"cf_form"=>iconv('euc-kr','utf-8',$row['cf_form'])
            
            ,"att_cnt"=>iconv('euc-kr','utf-8',$row['att_cnt'])
            ,"in_wav"=>iconv('euc-kr','utf-8',$row['in_wav'])
            ,"out_wav"=>iconv('euc-kr','utf-8',$row['out_wav'])
            ,"vol"=>iconv('euc-kr','utf-8',$row['vol'])
            ,"rec_type"=>iconv('euc-kr','utf-8',$row['rec_type'])
            ,"regdate"=>iconv('euc-kr','utf-8',$row['regdate'])
            
        );
        //echo $row['idx'];
    }*/
    echo json_encode($arr);
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='acc3_list'){ // 
    $sql="select * from acc_conf where 1=1";
        if($_GET['type']=='1' && $_GET['type_str']!='')
            $sql.=" and ent_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
        if($_GET['type']=='2' && $_GET['type_str']!='')
            $sql.=" and dir_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
        if($_GET['type']=='3' && $_GET['type_str']!='')
            $sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
   //echo $sql;
            $sql.=" order by regdate desc";
    $result = mysql_query($sql);
    
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "idx"=>iconv('euc-kr','utf-8',$row['idx'])
            ,"ent_name"=>iconv('euc-kr','utf-8',$row['ent_name'])
            ,"dir_name"=>iconv('euc-kr','utf-8',$row['dir_name'])
            ,"cf_name"=>iconv('euc-kr','utf-8',$row['cf_name'])
        );
        //echo $row['idx'];
    }
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='acc4_list'){ //
    $qry="SELECT column_name
    FROM INFORMATION_SCHEMA.columns
    WHERE table_name='acc_user'";
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $col_arr[$i]=$row[0];
    }
    //echo $qry;echo '<br>';
    
    $sql="select * from acc_user where 1=1";
    if($_GET['type']=='1' && $_GET['type_str']!='')
        $sql.=" and cp_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    if($_GET['type']=='2' && $_GET['type_str']!='')
        $sql.=" and cp_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    if($_GET['type']=='3' && $_GET['type_str']!='')
        $sql.=" and name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    if($_GET['type']=='4' && $_GET['type_str']!='')
        $sql.=" and tel like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    if($_GET['type']=='5' && $_GET['type_str']!='')
        $sql.=" and id like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
                //echo $sql;
    $sql.=" order by regdate desc";
    $result = mysql_query($sql);
    //echo $sql;echo '<br>';
    
    for($ii=0;$row=mysql_fetch_array($result);$ii++){
        for($k=0;$k<$i;$k++){
            $arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8',$row[ $col_arr[$k] ]);
        }
    }
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='acc_save'){
    if($_GET['num']=='3')$TBNAME='acc_conf';
    if($_GET['num']=='4')$TBNAME='acc_user';
    
    $dataObject = json_decode( $_POST['json'] );
    //echo print_r($dataObject);
    //echo '<br>'.$_POST['json'];
    if($_GET['type']=='insert'){
        $qry="insert ".$TBNAME." set regdate=now()";
        foreach($dataObject as $key => $value){
            //echo $key." => ".$value."<br />";
            $qry.= ",".substr($key,5)."='".iconv('utf-8','euc-kr',$value)."'";
        }
    }else{
        $qry="update ".$TBNAME." set ";
        $ni=0;
        foreach($dataObject as $key => $value){
            //echo $key." => ".$value."<br />";
            if($ni==0)
                $qry.= substr($key,5)."='".iconv('utf-8','euc-kr',$value)."'";
            else
                $qry.= ",".substr($key,5)."='".iconv('utf-8','euc-kr',$value)."'";
            $ni++;
        }
        $qry.=" where idx='".$_GET['idx']."'";
    }
    echo $qry;
    mysql_query($qry);
    
    $qry="select max(idx) from ".$TBNAME;
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr = array(
            "idx"=>$row[0]
        );

		$my_idx=$row[0];
    }

	if($_GET['idx']!='')
		$my_idx=$_GET['idx'];
	

	// 회의 모니터링 추가
	if (($_GET['num']=='3') && ($_GET['type']=='insert')) {
		$qry="SELECT MIN(room) FROM chk_room WHERE room NOT IN (SELECT room_num FROM cfr_mon_1)";
		$result = mysql_query($qry);
	    $row2=mysql_fetch_array($result);
		$my_room=$row2[0];

		$qry ="insert cfr_mon_1 set";
		$qry.=" room_num='". $my_room ."'";
		$qry.=",cf_num='". $my_idx ."'";
		$qry.=",cf_name='". iconv('utf-8','euc-kr',$dataObject->{'acc3_cf_name'}) ."'";
		$qry.=",now_cnt='0'";
		$qry.=",max_cnt='". $dataObject->{'acc3_att_cnt'} ."'";
		$qry.=",mktime=now()";
		$qry.=",lock_yn='N'";
		$qry.=",mute_yn='N'";
		$qry.=",music_yn='N'";
		$qry.=",a_vol='". $dataObject->{'acc3_vol'} ."'";
		$qry.=",sp_pwd='". $dataObject->{'acc3_sp_pwd'} ."'";
		$qry.=",att_pwd='". $dataObject->{'acc3_att_pwd'} ."'";
		$qry.=",cf_state='0'";

		//echo $qry;
		mysql_query($qry);
	}
	else if (($_GET['num']=='3') && ($_GET['type']!=='insert')) {	
		$qry ="update cfr_mon_1 set";
		$qry.=" cf_name='". iconv('utf-8','euc-kr',$dataObject->{'acc3_cf_name'}) ."'";
		$qry.=",a_vol='". $dataObject->{'acc3_vol'} ."'";
		$qry.=",sp_pwd='". $dataObject->{'acc3_sp_pwd'} ."'";
		$qry.=",att_pwd='". $dataObject->{'acc3_att_pwd'} ."'";
		$qry.=",max_cnt='". $dataObject->{'acc3_att_cnt'} ."'";

		$qry.=" where cf_num='". $my_idx ."'";

		//echo $qry;
		mysql_query($qry);
	}

	if (($_GET['num']=='4') && ($_GET['type']!=='insert')) {
		$qry ="update cfr_mon_2 set";
		$qry.=" level='". iconv('utf-8','euc-kr',$dataObject->{'acc4_level'}) ."'";
		$qry.=",cp_name='". iconv('utf-8','euc-kr',$dataObject->{'acc4_cp_name'}) ."'";
		$qry.=",name='". iconv('utf-8','euc-kr',$dataObject->{'acc4_name'}) ."'";
		$qry.=",div_pos='". iconv('utf-8','euc-kr',$dataObject->{'acc4_div_pos'}) ."'";
		$qry.=",gender='". iconv('utf-8','euc-kr',$dataObject->{'acc4_gender'}) ."'";
		$qry.=",cid='". iconv('utf-8','euc-kr',$dataObject->{'acc4_tel'}) ."'";
		
		$qry.=" where user_idx='". $my_idx ."'";

		//echo $qry;
		mysql_query($qry);
	}
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
    
   ///
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='acc3_del'){
    $qry="delete from acc_conf where idx='".$_POST['idx']."'";
    mysql_query($qry);

	// 회의 모니터 삭제
	$qry="delete from cfr_mon_1 where cf_num='".$_POST['idx']."'";
	mysql_query($qry);

	$qry="delete from cfr_mon_2 where conf_idx='".$_POST['idx']."'";
	mysql_query($qry);

}


//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='acc4_del'){
    $qry="delete from acc_user where idx='".$_POST['idx']."'";
    mysql_query($qry);

	// 사용자 모니터 삭제
	$qry="delete from cfr_mon_2 where user_idx='".$_POST['idx']."'";
	mysql_query($qry);

}



//////////////////////////////////////////////////////////////////////////////////////////
/////////////////// DB3 DB3 DB3 DB3 DB3 DB3 DB3 DB3 ////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='db_list'){ //
    if($_GET['num']=='3')$TBNAME='acc_conf';
    if($_GET['num']=='4')$TBNAME='acc_user';
    if($_GET['num']=='5')$TBNAME='cfr_recfile';
    /////////////컬럼을구함.
    $qry="SELECT column_name
    FROM INFORMATION_SCHEMA.columns
    WHERE table_name='".$TBNAME."'";
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $col_arr[$i]=$row[0];
    }
    /////////////
    $sql="select * from ".$TBNAME." where 1=1";
    if($_GET['num']=='3'){
            if($_GET['type']=='1' && $_GET['type_str']!='')
                $sql.=" and ent_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='2' && $_GET['type_str']!='')
                $sql.=" and dir_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='3' && $_GET['type_str']!='')
                $sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    }
    if($_GET['num']=='4'){
            if($_GET['cp_name']!='')
                $sql.=" and cp_name like '%".iconv('utf-8','euc-kr',$_GET['cp_name'])."%'";
            if($_GET['div_name']!='')
                $sql.=" and div_name like '%".iconv('utf-8','euc-kr',$_GET['div_name'])."%'";
            if($_GET['div_pos']!='')
                $sql.=" and div_pos like '%".iconv('utf-8','euc-kr',$_GET['div_pos'])."%'";
            if($_GET['name']!='')
                $sql.=" and name like '%".iconv('utf-8','euc-kr',$_GET['name'])."%'";
            if($_GET['con_grp']!='')
                $sql.=" and con_grp like '%".iconv('utf-8','euc-kr',$_GET['con_grp'])."%'";
    }
    if($_GET['num']=='5'){
            if($_GET['type']=='1' && $_GET['type_str']!='')
                $sql.=" and cp_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='2' && $_GET['type_str']!='')
                $sql.=" and cp_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='3' && $_GET['type_str']!='')
                $sql.=" and cf_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='4' && $_GET['type_str']!='')
                $sql.=" and rec_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='5' && $_GET['type_str']!='')
                $sql.=" and play_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";

			$sql.=" and play_name <> ''";
    }
    
                //echo $sql;
    $sql.=" order by regdate desc";
    $result = mysql_query($sql);
    
    $num=0;
    for($ii=0;$row=mysql_fetch_array($result);$ii++){
        for($k=0;$k<$i;$k++){
            $arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8',$row[ $col_arr[$k] ]);
            //iconv('euc-kr','utf-8',$row[ $col_arr[$k] ])
        }
    }
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
    
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='db_list_del'){
    if($_GET['num']=='3')$TBNAME='acc_conf';
    if($_GET['num']=='4')$TBNAME='acc_user';
    if($_GET['num']=='5')$TBNAME='cfr_recfile';
    $idxes = $_POST['idxes'];
    $qry="delete from ".$TBNAME." where idx in(".$idxes.") ";
    echo $qry;
    mysql_query($qry);
    
}




//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='report_list'){ //
    if($_GET['num']=='3')$TBNAME='acc_conf';
    if($_GET['num']=='4')$TBNAME='acc_user';
    if($_GET['num']=='5')$TBNAME='cfr_recfile';
    
    
    if($_GET['num']=='3'){
		$col_cnt = 21;
		$sql="SELECT idx,ent_name,pay_num,'' AS grade,pay_type,pay_part,dir_name,cf_name,'' AS cf_id,'' AS saledam,cf_mode,'".$_GET['date_st']."' AS date_st,'".$_GET['date_ed']."' AS date_ed,'' AS prc_cnt,att_cnt";
		$sql.=",'0' AS tot1,'0' AS tot2,'0' AS tot3,'0' AS tot4,'0' AS tot5,'0' AS tot6 FROM acc_conf";

		if($_GET['type']=='3' && $_GET['type_str']!='')
			$sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    }
    if($_GET['num']=='4'){
		$col_cnt = 21;
		$sql="SELECT idx,ent_name,pay_num,'' AS grade,pay_type,pay_part,dir_name,cf_name,'' AS cf_id,'' AS saledam,cf_mode,'' AS time_st,'' AS time_ed,'' AS prc_cnt,att_cnt";
		$sql.=",'0' AS tot1,'0' AS tot2,'0' AS tot3,'0' AS tot4,'0' AS tot5,'0' AS tot6 FROM acc_conf";

		if($_GET['type']=='3' && $_GET['type_str']!='')
			$sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
    }
    if($_GET['num']=='5'){
		$sql="select * from ".$TBNAME." where 1=1";
		if($_GET['type']=='1' && $_GET['type_str']!='')
			$sql.=" and cp_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
		if($_GET['type']=='2' && $_GET['type_str']!='')
			$sql.=" and cp_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
		if($_GET['type']=='3' && $_GET['type_str']!='')
			$sql.=" and cf_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
		if($_GET['type']=='4' && $_GET['type_str']!='')
			$sql.=" and rec_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
		if($_GET['type']=='5' && $_GET['type_str']!='')
			$sql.=" and play_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";

		$sql.=" and play_name <> ''";
    }
    
    $sql.=" order by regdate desc";

	//echo $sql;
    $result = mysql_query($sql);
    
    $num=0;
    for($ii=0;$row=mysql_fetch_array($result);$ii++){
        for($k=0;$k<$col_cnt;$k++){
            $arr[$ii][$k] = iconv('euc-kr','utf-8',$row[$k]);
        }
    }
    
    if($col_cnt!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
    
}




//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon_save'){
    if($_GET['num']=='1')$TBNAME='acc_conf';
    if($_GET['num']=='2')$TBNAME='acc_user';
    
    $dataObject = json_decode( $_POST['json'] );

	//echo print_r($dataObject);
	//echo $dataObject->{'main1_cf_name'};
	//exit(0);

    //echo print_r($dataObject);
    //echo '<br>'.$_POST['json'];
    if($_GET['type']=='insert'){
        $qry="insert ".$TBNAME." set regdate=now()";
        foreach($dataObject as $key => $value){
            //echo $key." => ".$value."<br />";
            $qry.= ",".substr($key,6)."='".iconv('utf-8','euc-kr',$value)."'";
        }
    }else{
        $qry="update ".$TBNAME." set ";
        $ni=0;
        foreach($dataObject as $key => $value){
            //echo $key." => ".$value."<br />";
            if($ni==0)
                $qry.= substr($key,6)."='".iconv('utf-8','euc-kr',$value)."'";
            else
                $qry.= ",".substr($key,6)."='".iconv('utf-8','euc-kr',$value)."'";
            $ni++;
        }
        $qry.=" where idx='".$_GET['idx']."'";
    }
    //echo $qry;
	mysql_query($qry);
    
    $qry="select max(idx) from ".$TBNAME;
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr = array(
            "idx"=>$row[0]
        );
		$my_idx=$row[0];
    }

	if($_GET['idx']!='')
		$my_idx=$_GET['idx'];
	

	// 회의 모니터링 추가
	if (($_GET['num']=='1') && ($_GET['type']=='insert')) {
		$qry="SELECT MIN(room) FROM chk_room WHERE room NOT IN (SELECT room_num FROM cfr_mon_1)";
		$result = mysql_query($qry);
	    $row2=mysql_fetch_array($result);
		$my_room=$row2[0];

		$qry ="insert cfr_mon_1 set";
		$qry.=" room_num='". $my_room ."'";
		$qry.=",cf_num='". $my_idx ."'";
		$qry.=",cf_name='". iconv('utf-8','euc-kr',$dataObject->{'main1_cf_name'}) ."'";
		$qry.=",now_cnt='0'";
		$qry.=",max_cnt='". $dataObject->{'main1_att_cnt'} ."'";
		$qry.=",mktime=now()";
		$qry.=",lock_yn='N'";
		$qry.=",mute_yn='N'";
		$qry.=",music_yn='N'";
		$qry.=",a_vol='". $dataObject->{'main1_vol'} ."'";
		$qry.=",sp_pwd='". $dataObject->{'main1_sp_pwd'} ."'";
		$qry.=",att_pwd='". $dataObject->{'main1_att_pwd'} ."'";
		$qry.=",cf_state='0'";

		//echo $qry;
		mysql_query($qry);
	}
	else if (($_GET['num']=='1') && ($_GET['type']!=='insert')) {
		
		$qry ="update cfr_mon_1 set";
		$qry.=" cf_name='". iconv('utf-8','euc-kr',$dataObject->{'main1_cf_name'}) ."'";
		$qry.=",a_vol='". $dataObject->{'main1_vol'} ."'";
		$qry.=",sp_pwd='". $dataObject->{'main1_sp_pwd'} ."'";
		$qry.=",att_pwd='". $dataObject->{'main1_att_pwd'} ."'";
		$qry.=",max_cnt='". $dataObject->{'main1_att_cnt'} ."'";

		$qry.=" where cf_num='". $my_idx ."'";

		echo $qry;
		mysql_query($qry);
	}

	if (($_GET['num']=='2') && ($_GET['type']!=='insert')) {
		$qry ="update cfr_mon_2 set";
		$qry.=" level='". iconv('utf-8','euc-kr',$dataObject->{'main2_level'}) ."'";
		$qry.=",cp_name='". iconv('utf-8','euc-kr',$dataObject->{'main2_cp_name'}) ."'";
		$qry.=",name='". iconv('utf-8','euc-kr',$dataObject->{'main2_name'}) ."'";
		$qry.=",div_pos='". iconv('utf-8','euc-kr',$dataObject->{'main2_div_pos'}) ."'";
		$qry.=",cid='". iconv('utf-8','euc-kr',$dataObject->{'main2_tel'}) ."'";
		//$qry.=",skind='". iconv('utf-8','euc-kr',$dataObject->{'main2_skind'}) ."'";
		
		$qry.=" where user_idx='". $my_idx ."'";

		//echo $qry;
		mysql_query($qry);
	}


    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
    
   ///
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon_del'){
	if($_GET['num']=='1')$TBNAME='acc_conf';
    if($_GET['num']=='2')$TBNAME='acc_user';

    $qry="delete from ".$TBNAME." where idx='".$_POST['idx']."'";
    mysql_query($qry);

	// 회의 모니터 삭제
	if ($_GET['num']=='1') {
		$qry="delete from cfr_mon_1 where cf_num='".$_POST['idx']."'";
		mysql_query($qry);

		$qry="delete from cfr_mon_2 where conf_idx='".$_POST['idx']."'";
		mysql_query($qry);
	}
}

//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon5_pop'){ // 
    $sql="select * from acc_conf where enddate='0000-00-00'";
	if($_GET['ent_name']!='')
		$sql.=" and ent_name like '%".iconv('utf-8','euc-kr',$_GET['ent_name'])."%'";
	if($_GET['pay_num']!='')
		$sql.=" and pay_num like '%".iconv('utf-8','euc-kr',$_GET['pay_num'])."%'";
	if($_GET['cf_num']!='')
		$sql.=" and idx like '%".iconv('utf-8','euc-kr',$_GET['cf_num'])."%'";
	if($_GET['sp_pwd']!='')
		$sql.=" and sp_pwd like '%".iconv('utf-8','euc-kr',$_GET['sp_pwd'])."%'";
	if($_GET['att_pwd']!='')
		$sql.=" and att_pwd like '%".iconv('utf-8','euc-kr',$_GET['att_pwd'])."%'";

	$sql.=" order by regdate desc";

    $result = mysql_query($sql);
    
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "idx"=>iconv('euc-kr','utf-8',$row['idx'])
            ,"ent_name"=>iconv('euc-kr','utf-8',$row['ent_name'])
            ,"dir_name"=>iconv('euc-kr','utf-8',$row['dir_name'])
            ,"cf_name"=>iconv('euc-kr','utf-8',$row['cf_name'])
        );
        //echo $row['idx'];
    }
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
}


//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon5_pop_addr'){ // 
    $sql="select con_grp,count(*) as cnt from acc_user where 1=1";
	if($_GET['addr_name']!='')
		$sql.=" and con_grp like '%".iconv('utf-8','euc-kr',$_GET['addr_name'])."%'";
	$sql.=" group by con_grp order by cnt desc";

    $result = mysql_query($sql);
    
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "con_grp"=>iconv('euc-kr','utf-8',$row[0])
            ,"cnt"=>iconv('euc-kr','utf-8',$row[1])
        );
        //echo $row['idx'];
    }
    
    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
}


//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon5_list_user'){ //
    
	if($_GET['cp_num']!='')
		$sql="select * from acc_user where idx in (select user_idx from cfr_mon_2 where conf_idx='".$_GET['cp_num']."')";
	else
		$sql="select * from acc_user where con_grp='".iconv('utf-8','euc-kr',$_GET['addr_name'])."'";
	
	//echo $sql;

    $result = mysql_query($sql);
    
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $arr[] = array(
            "idx"=>iconv('euc-kr','utf-8',$row['idx'])
            
            ,"con_grp"=>iconv('euc-kr','utf-8',$row['con_grp'])
            ,"cp_name"=>iconv('euc-kr','utf-8',$row['cp_name'])
            ,"name"=>iconv('euc-kr','utf-8',$row['name'])
            ,"div_pos"=>iconv('euc-kr','utf-8',$row['div_pos'])
            ,"gender"=>iconv('euc-kr','utf-8',$row['gender'])
            ,"tel"=>iconv('euc-kr','utf-8',$row['tel'])
			,"email"=>iconv('euc-kr','utf-8',$row['email'])
        );
        //echo $row['idx'];
    }
    echo json_encode($arr);
}


//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='mon5_chk_save'){
    
    $dataObject = json_decode( $_POST['json'] );
    //echo '<br>'.$_POST['json'];

	foreach($dataObject as $key => $value){
		//echo $key." => ".$value."<br />";
		if($_GET['type']=='delete'){
			$qry = "delete from cfr_mon_2 where conf_idx='".$_GET['conf_idx']."' and user_idx='".$value."'";
			mysql_query($qry);
		}
		else if($_GET['type']=='insert'){
			
			$qry = "select count(*) from cfr_mon_2 where conf_idx='".$_GET['conf_idx']."' and user_idx='".$value."'";
			//echo $qry;
			$result = mysql_query($sql); $row=mysql_fetch_array($result);
			$mycnt = $row[0];
			if($mycnt==0) {
				$qry = "insert into cfr_mon_2 select '".$_GET['conf_idx']."',idx,level,cp_name,name,div_pos,gender,tel,'UNMUTE','5','-','' from acc_user where idx='".$value."'";
				//echo $qry;
				mysql_query($qry);
			}
		}
	}
}


//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='dup_acc3_sp_pwd'){
    
    $sql="select count(*) from acc_conf where 1=1";
	$sql.=" and sp_pwd = '".$_GET['pwd']."'";
	if($_GET['idx']!='')
		$sql.=" and idx <> '".$_GET['idx']."'";
    //echo $sql;

	$result = mysql_query($sql);
    $row=mysql_fetch_array($result);
	echo $row[0];
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='dup_acc3_att_pwd'){
    
    $sql="select count(*) from acc_conf where 1=1";
	$sql.=" and att_pwd = '".$_GET['pwd']."'";
	if($_GET['idx']!='')
		$sql.=" and idx <> '".$_GET['idx']."'";
    //echo $sql;

	$result = mysql_query($sql);
    $row=mysql_fetch_array($result);
	echo $row[0];
}
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='dup_acc4_id'){
    
    $sql="select count(*) from acc_user where 1=1";
	$sql.=" and id = '".$_GET['pwd']."'";
	if($_GET['idx']!='')
		$sql.=" and idx <> '".$_GET['idx']."'";
    //echo $sql;

	$result = mysql_query($sql);
    $row=mysql_fetch_array($result);
	echo $row[0];
}



//////////////////////////////////////////////////////////////////////////////////////////
/////////////////// Mon1 Mon1 Mon1 Mon1 Mon1 Mon1 Mon1 Mon1 Mon1 ////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
if($_GET['mode']=='lock_mon1'){ //
    $qry="update cfr_mon_1 set lock_yn='".$_GET['yn']."' where room_num='".$_GET['room_num']."'";
    //echo $qry;
    mysql_query($qry);
}

if($_GET['mode']=='mon_list'){ //
    if($_GET['num']=='1')$TBNAME='cfr_mon_'.$_GET['num'];
	if($_GET['num']=='2')$TBNAME='cfr_mon_'.$_GET['num'];
    if($_GET['num']=='3')$TBNAME='cfr_mon_'.$_GET['num'];
    /////////////컬럼을구함.
    $qry="SELECT column_name
    FROM INFORMATION_SCHEMA.columns
    WHERE table_name='".$TBNAME."'";
    $result = mysql_query($qry);
    for($i=0;$row=mysql_fetch_array($result);$i++){
        $col_arr[$i]=$row[0];
    }


    /////////////
    
    if($_GET['num']=='1'){
			$i=10;

			$sql="select room_num,cf_num,cf_name,now_cnt,max_cnt,mktime,lock_yn,mute_yn,music_yn,a_vol from ".$TBNAME." where cf_state='1'";
            if($_GET['type']=='1' && $_GET['type_str']!='')
             $sql.=" and ent_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='2' && $_GET['type_str']!='')
                $sql.=" and dir_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='3' && $_GET['type_str']!='')
                $sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";

			$sql.=" and now_cnt>0";
            
			$sql.=" order by mktime desc";
            //정렬
			/*
            if($_GET['type']=='1')$order_col='room_num';
            if($_GET['type']=='2')$order_col='cf_num';
            if($_GET['type']=='3')$order_col='cf_name';
            if($_GET['type']=='4')$order_col='now_cnt';
            if($_GET['type']=='5')$order_col='max_cnt';
            if($_GET['type']=='6')$order_col='mktime';
            
            if($_GET['type2']=='2')$asc_desc='desc';
            $sql.=" order by ".$order_col." ".$asc_desc;
			*/
    }
	if($_GET['num']=='2'){
			$qry="select cf_num from cfr_mon_1 where room_num='" . $_GET['roomnum'] . "'";
			$result_t = mysql_query($qry);
			$row_t=mysql_fetch_array($result_t);
			$conf_idx=$row_t[0];

			$sql="select * from ".$TBNAME." where conf_idx='" . $conf_idx . "'";
			/*
            if($_GET['type']=='1' && $_GET['type_str']!='')
             $sql.=" and ent_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='2' && $_GET['type_str']!='')
                $sql.=" and dir_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='3' && $_GET['type_str']!='')
                $sql.=" and cf_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            
            //정렬
            if($_GET['type']=='1')$order_col='room_num';
            if($_GET['type']=='2')$order_col='cf_num';
            if($_GET['type']=='3')$order_col='cf_name';
            if($_GET['type']=='4')$order_col='now_cnt';
            if($_GET['type']=='5')$order_col='max_cnt';
            if($_GET['type']=='6')$order_col='mktime';
            
            if($_GET['type2']=='2')$asc_desc='desc';
            $sql.=" order by ".$order_col." ".$asc_desc;
			*/
    }
    if($_GET['num']=='3'){
            /*if($_GET['type']=='1' && $_GET['type_str']!='')
                $sql.=" and cp_name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='2' && $_GET['type_str']!='')
                $sql.=" and cp_num like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='3' && $_GET['type_str']!='')
                $sql.=" and name like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='4' && $_GET['type_str']!='')
                $sql.=" and tel like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";
            if($_GET['type']=='5' && $_GET['type_str']!='')
                $sql.=" and id like '%".iconv('utf-8','euc-kr',$_GET['type_str'])."%'";*/
    }
    
    
    //echo $sql;
    //$sql.=" order by regdate desc";
    $result = mysql_query($sql);
    
	if($_GET['num']=='2'){
		$num=0;
		for($ii=0;$row=mysql_fetch_array($result);$ii++){
			$arr[$ii]['colnum']=$ii+1;
			for($k=0;$k<$i;$k++){
				if ($k==2)
					if ($row[ $col_arr[$k] ]=='1')
						$arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8','주최자');
					if ($row[ $col_arr[$k] ]=='4')
						$arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8','참석자');
				if ($k>0)
					$arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8',$row[ $col_arr[$k] ]);
			}
		}
	}
	else {
		$num=0;
		for($ii=0;$row=mysql_fetch_array($result);$ii++){
			for($k=0;$k<$i;$k++){
				$arr[$ii][ $col_arr[$k] ] = iconv('euc-kr','utf-8',$row[ $col_arr[$k] ]);
				//iconv('euc-kr','utf-8',$row[ $col_arr[$k] ])
			}
		}
	}


    if($i!=0){
        echo json_encode($arr);
    }else{
        echo 'null';
    }
    
}
?>
















