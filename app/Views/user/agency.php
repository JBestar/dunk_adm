<?= $this->extend('user/user_list') ?>
<?= $this->section('user-list-title') ?>총판<?= $this->endSection() ?>
<?= $this->section('user-list-new-reg') ?>
<a href="<?php echo base_url()."user/agency_edit/0";?>" class="user-panel-add-a" >총판 새로 등록</a>
<?= $this->endSection() ?>
<?= $this->section('user-list-table') ?>
	<Table class="user-table" id="user-agency-table-id">
<?= $this->endSection() ?>
<?= $this->section('user-list-modify-url') ?><?php $modifyUrl = 'user/agency_edit/'; ?><?= $this->endSection() ?>
<?= $this->section('user-list-script') ?>
<script src="<?php echo base_url('assets/js/agency-script.js?v=2');?>"></script>
<?= $this->endSection() ?>
