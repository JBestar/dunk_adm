<?= $this->extend('user/user_list') ?>
<?= $this->section('user-list-title') ?>매장<?= $this->endSection() ?>
<?= $this->section('user-list-new-reg') ?>
<a href="<?php echo base_url()."user/employee_edit/0";?>" class="user-panel-add-a" >부본사 새로 등록</a>
<?= $this->endSection() ?>
<?= $this->section('user-list-table') ?>
	<Table class="user-table" id="user-employee-table-id">
<?= $this->endSection() ?>
<?= $this->section('user-list-script') ?>
<script src="<?php echo base_url('assets/js/employee-script.js?v=2');?>"></script>
<?= $this->endSection() ?>