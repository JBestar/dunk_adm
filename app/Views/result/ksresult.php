<?= $this->extend('result/bet_result')?>
<?= $this->section('bet-result-title') ?>키노사다리<?= $this->endSection() ?>
<?= $this->section('bet-result-round-name') ?>회차<?= $this->endSection() ?>
<?= $this->section('bet-result-edit') ?>
<a href="<?php echo base_url().'result/ksresult_edit/0';?>" class="user-panel-add-a" >회차등록</a>
<?= $this->endSection() ?>
<?= $this->section('bet-result-table-header') ?>
	<th>추첨일</th>
	<th>회차</th>
	<th>좌우</th>
	<th>줄수</th>
	<th>홀짝</th>	
	<th>게임관리</th>			
<?= $this->endSection() ?>
<?= $this->section('bet-result-script') ?>
<script src="<?php echo base_url('assets/js/ksresult-script.js?v=1');?>"></script>
<?= $this->endSection() ?>