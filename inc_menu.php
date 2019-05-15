
	
	<div class="header">
		<div class="layout">
			<div class="admin_logo">
				<?php echo $mb['login_levelname'] . ' - ' . $mb['login_id']?><a href="logout.php">LOGOUT</a>
			</div>
			<ul class="navi_wrap">
				<li class="<?php echo $main1?>">
					<a href="monitor.php?menu=1">모니터링</a>
					<div class="subnavi <?php echo $main1?>">
						<a href="monitor.php?menu=1" class="<?php if($main1=='on') echo $menu1?>">진행 회의</a>
						<!--
						<a href="monitor.php?menu=2" class="<?php if($main1=='on') echo $menu2?>">회의 정보</a>
						<a href="monitor.php?menu=3" class="<?php if($main1=='on') echo $menu3?>">응대/참석 목록</a>
						<a href="monitor.php?menu=4" class="<?php if($main1=='on') echo $menu4?>">참석자 정보</a>
						-->
						<a href="monitor.php?menu=5" class="<?php if($main1=='on') echo $menu5?>">참석자 배정</a>
					</div>
				</li>
				<li class="<?php echo $main2?>">
					<a href="account.php?menu=3">자료등록</a>
					<div class="subnavi <?php echo $main2?>">
						<!--
						<a href="account.php?menu=1" class="<?php if($main2=='on') echo $menu1?>">회사 등록</a>
						<a href="account.php?menu=2" class="<?php if($main2=='on') echo $menu2?>">과금 등록</a>
						-->
						<a href="account.php?menu=3" class="<?php if($main2=='on') echo $menu3?>">회의 등록</a>
						<a href="account.php?menu=4" class="<?php if($main2=='on') echo $menu4?>">사용자 등록</a>
					</div>
				</li>
				<li class="<?php echo $main3?>">
					<a href="db.php?menu=3">자료조회</a>
					<div class="subnavi <?php echo $main3?>">
						<!--<a href="db.php?menu=1" class="<?php if($main3=='on') echo $menu1?>">회사</a>
						<a href="db.php?menu=2" class="<?php if($main3=='on') echo $menu2?>">과금</a>
						-->
						<a href="db.php?menu=3" class="<?php if($main3=='on') echo $menu3?>">회의</a>
						<a href="db.php?menu=4" class="<?php if($main3=='on') echo $menu4?>">사용자</a>
						<a href="db.php?menu=5" class="<?php if($main3=='on') echo $menu5?>">녹음파일</a>
						<!--
						<a href="db.php?menu=6" class="<?php if($main3=='on') echo $menu6?>">통화내역</a>
						<a href="db.php?menu=7" class="<?php if($main3=='on') echo $menu7?>">국제전화</a>
						<a href="db.php?menu=8" class="<?php if($main3=='on') echo $menu8?>">문자 템플릿</a>
						-->

					</div>
				</li>
				<li class="<?php echo $main4?>">
					<a href="report.php?menu=4">리포트</a>
					<div class="subnavi <?php echo $main4?>">
						<!--
						<a href="report.php?menu=1" class="<?php if($main4=='on') echo $menu1?>">그룹</a>
						<a href="report.php?menu=2" class="<?php if($main4=='on') echo $menu2?>">회사</a>
						<a href="report.php?menu=3" class="<?php if($main4=='on') echo $menu3?>">과금번호</a>
						-->
						<a href="report.php?menu=4" class="<?php if($main4=='on') echo $menu4?>">회의번호</a>
						<a href="report.php?menu=5" class="<?php if($main4=='on') echo $menu5?>">회의상세</a>
						<!--
						<a href="report.php?menu=6" class="<?php if($main4=='on') echo $menu6?>">참석자상세</a>
						<a href="report.php?menu=7" class="<?php if($main4=='on') echo $menu7?>">메세지발송내역</a>
						-->
					</div>
				</li>
				<li class="<?php echo $main5?>">
					<a href="system.php?menu=1">시스템</a>
					<div class="subnavi <?php echo $main5?>">
						<a href="system.php?menu=1" class="<?php if($main5=='on') echo $menu1?>">시스템 정보</a>
						<!--<a href="system.php?menu=2" class="<?php if($main5=='on') echo $menu2?>">sys2</a>-->
					</div>
				</li>
			</ul>
			<div class="top_tb">
				<table id='div-mon-head'>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">Conference Call V.1.01-001</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="blue_bar"></div>
	</div>