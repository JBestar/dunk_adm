<?= $this->extend('/bet/history') ?>
<?= $this->section('history-active') ?>"파워볼"<?= $this->endSection() ?>
<?= $this->section('history-title') ?>파워볼 배팅내역<?= $this->endSection() ?>
<?= $this->section('history_game_options') ?>		
	<option value="1">파워볼 단폴</option>
	<option value="2">파워볼 조합</option>
	<option value="3">일반볼 대중소</option>
<?= $this->endSection() ?>
<?= $this->section('history-add-round-search') ?>
	<label>회차</label>
	<input type="text" class="pbresult-text-input" id="pbhistory-roundid-input-id" >
<?= $this->endSection() ?>
<?= $this->section('history-bet-table-headers') ?>
	<th>ID</th>
	<th>배팅시간</th>
	<th>회차</th>
	<th>아이디</th>
	<th>구분</th>
	<th>배팅금액</th>
	<th>배당율</th>
	<th>배팅선택</th>
	<th>경기결과</th>
	<th>당첨금액</th>
	<th>배팅결과</th>
	<th>포인트</th>
	<th>매장</th>
	<th>총판</th>
	<th>부본사</th>
<?= $this->endSection() ?>
<?= $this->section('history_script') ?>
	<script src="<?php echo base_url('assets/js/pbhistory-script.js?v=2');?>"></script>
<?= $this->endSection() ?>