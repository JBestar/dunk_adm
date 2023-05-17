<?= $this->extend('header') ?>
<?= $this->section('content') ?>

<!--Sub Navbar-->
<div class="sub-navbar">
	<p><i class="glyphicon glyphicon-lock"></i> 기본설정::따라가기</p>
</div>
<!--Site Setting-->
<div class="confsite-password-panel">
	<div class="confsite-password-text-div" style="margin-top:20px">
		<p>따라가기 상태:</p>
		<input type="checkbox" id="confsite-follow-check-id" style="width:20px; zoom:120%;" <?= $mb_follow_check? "checked":""?>>
		<p style="width:200px;">승인</p>
	</div>

	<div class="confsite-password-text-div" style="margin-top:20px">
		<p>따라가기 아이디:</p> <input type="text" id="confsite-follow-input-id" value="<?= $mb_follow_id?>">
	</div>

	<div class="confsite-button-group">
		<button class="confsite-cancel-button" id="confsite-cancel-btn-id">취소</button>
		<button class="confsite-ok-button" id="confsite-ok-btn-id">저장</button>
	</div>
</div>


<!--main_navbar.php-->
</div>

<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo site_furl('/assets/js/conf_follow-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo site_furl('/assets/js/conf_follow-script.js?v=1');?>"></script>
<?php endif ?>
<?= $this->endSection() ?>