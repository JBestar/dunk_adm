<?= $this->extend('user/user_list') ?>
<?= $this->section('user-list-title') ?>부본사<?= $this->endSection() ?>
<?= $this->section('user-list-new-reg') ?>
<a href="<?php echo base_url()."user/company_edit/0";?>" class="user-panel-add-a" >부본사 새로 등록</a>
<?= $this->endSection() ?>
<?= $this->section('user-list-table') ?>
	<Table class="user-table" id="user-company-table-id">
<?= $this->endSection() ?>
<?= $this->section('user-list-script') ?>
<script src="<?php echo base_url('assets/js/company-script.js?v=2');?>"></script>
<?= $this->endSection() ?>
