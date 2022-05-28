<?= $this->extend('/bet/history') ?>
<?= $this->section('history-active') ?>"카지노"<?= $this->endSection() ?>
<?= $this->section('history-title') ?>		
	카지노 배팅내역
<?= $this->endSection() ?>
<?= $this->section('history_game_options') ?>	
	<?php if($kgon_enable) :?>
		<select class="pbresult-game-select" id="pbhistory-game-select-id">
			<option value="-1">::업체선택::</option>	
			<?php foreach ($prds as $prd):?>
				<option value="<?=$prd->vendor_id?>"><?=$prd->name?></option>
			<?php endforeach;?>
		</select>
	<?php endif ?>   
<?= $this->endSection() ?>
<?= $this->section('history-bet-table-headers') ?>		
	<th>ID</th>
	<th>아이디</th>
	<th>닉네임</th>	
	<th>배팅시간</th>
	<th>업체명</th>
	<th>게임종류</th>
	<th>게임방</th>
	<th>배팅금액</th>
	<th>배팅결과</th>
	<th>당첨금액</th>
	<th>포인트</th>
<?= $this->endSection() ?>
<?= $this->section('history_script') ?>
<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo site_furl('/assets/js/cshistory-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo site_furl('/assets/js/cshistory-script.js?v=1');?>"></script>
<?php endif ?>
<?= $this->endSection() ?>