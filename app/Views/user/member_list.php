<?= $this->extend('header') ?>
<?= $this->section('content') ?>
	
	<!--Sub Navbar-->
	<div class = "sub-navbar">
		<p><i class="glyphicon glyphicon-user"></i> 회원관리</p>
		<?php if($mb_level >= LEVEL_MASTER && $adm_fid > 0) :  ?>
			<a onclick="popupMemberEdit(<?=$adm_fid?>);" class="user-panel-add-a" style="margin-left:5px; cursor:pointer;">관리자정보</a>
		<?php endif ?>
	</div>
	<style>
			
	button.refresh_btn {
		float:right;
		margin-left: 1px;
		margin-right: 2px;
	}
	.user-table td{
		border-right:solid 0.4px #888;
	}
	.user-table input{
		width:50px;
		text-align:center;		
	}
	
	tr.hidden{
		display: none;
	}
	tr button[id^=exp-btn_]{
		border:none;
	}
	tr button.expand{
		color:blue;
		/* background:#00ffff; */
	}
	</style>
	<!--Site Setting-->
	<div class="user-panel">	
		<div>
			<?php if($mb_level >= LEVEL_ADMIN) :  ?>
				<a href="" onclick="popupMemberEdit(0);" class="user-panel-add-a" >회원 등록</a>
			<?php endif ?>
			<!-- <label>추천인</label>
            <input type="text" class="pbresult-text-input" id="userpanel-empid-input-id" value= "<?=$emp_uid ?>"> -->
			<select name="pbresult-level" class="pbresult-number-select" id="userpanel-type-select-id" stype="width:80px">
				<option value="0">아이디</option>
				<option value="1">닉네임</option>
				<option value="2">등록번호</option>
			</select>
            <input type="text" class="pbresult-text-input" id="userpanel-userid-input-id" style="width:150px" value= "<?=$emp_uid ?>" >

			<button class="pbresult-list-view-but" id="userpanel-list-view-but-id">검색</button>  
		</div>		
		<Table class="user-table" style="margin-top: 15px;">
			<thead>
				<tr>
					<th></th>
					<th>본사</th>
					<th>부본사</th>
					<th>총판</th>
					<th>매장</th>
					<th>회원</th>
					<th>추천인</th>
					<th>등록번호</th>
					<th>닉네임</th>
					<th>Lv</th>
					<th>현재금액</th>
					<th>포인트</th>
					<?php if ($mb_level >= LEVEL_ADMIN) :?>	
						<?php if(!$slot_deny) :?>
							<th style="width:130px;">공배팅</th>
						<?php endif ?> 
					<th>접속IP</th>
					<?php endif ?>
					<th>승인</th>
					<?php if ($mb_level >= LEVEL_ADMIN) :?>	
					<th>게임별설정</th>
					<?php endif ?>
				</tr>
			</thead>
			<tbody  id="user-member-table-id">
				
			</tbody>

		</Table>

		<div class="pbresult-list-page-div">
			
			<div class="pagination" id="list-page" style="display:none">
				<button class="list-page-button" id="page-first"  onclick="firstPage()"><<</button>
				<button class="list-page-button" id="page-prev"  onclick="prevPage()"><</button>
				<div class="pagination-div" id="pagination-num">
					<button class="active">1</button>
					<button class="">2</button>						
				</div>
				<button class="list-page-button" id="page-next"  onclick="nextPage()">></button>
				<button class="list-page-button" id="page-last"  onclick="lastPage()">>></button>
			</div>			
	
		</div>

	</div>

	
<!--main_navbar.php-main-container-->
</div>
<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo site_furl('/assets/js/page.js?t='.time());?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_common-script.js?t='.time());?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_util-script.js?t='.time());?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_list-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo site_furl('/assets/js/page.js?v=1');?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_common-script.js?v=1');?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_util-script.js?v=1');?>"></script>
    <script src="<?php echo site_furl('/assets/js/member_list-script.js?v=1');?>"></script>
<?php endif ?>

<?= $this->endSection() ?>