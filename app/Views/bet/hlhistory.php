<?= $this->extend('/bet/history') ?>
<?= $this->section('history-active') ?><?=$game_name?><?= $this->endSection() ?>
<?= $this->section('history-title') ?><?=$game_name?> 배팅내역<?= $this->endSection() ?>
<?= $this->section('history-bet-table-headers') ?>		
	<th>번호</th>
	<th>아이디</th>
	<th>배팅시간</th>
	<th>배팅금</th>
	<th>적중금</th>
	<th>배팅결과</th>
	<th>포인트</th>
<?= $this->endSection() ?>
<?= $this->section('history_script') ?>
<script>var mGameId = <?=$game_id?></script>
<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo site_furl('/assets/js/hlhistory-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo site_furl('/assets/js/hlhistory-script.js?v=1');?>"></script>
<?php endif ?>
<?= $this->endSection() ?>