<?= $this->extend('user/user_edit') ?>
<?= $this->section('user-edit-title') ?>총판<?= $this->endSection() ?>
<?= $this->section('user-edit-check-level') ?>
<?php if($mb_level > LEVEL_COMPANY) ?>
<?= $this->endSection() ?>
<?= $this->section('user-edit-form-section0') ?>
	<div class="useredit-text-div">
		<p>분류:</p> 
		<?php if($mb_level > LEVEL_COMPANY) {  ?>
		<select type = "text" id="useredit-sort-select-id">
		<?php } else { ?>
		<select type = "text" id="useredit-sort-select-id" disabled>
		<?php } ?>

			<?php foreach ($arrEmpName as $objEmpName):?>
				<?php if(is_null($objMember) || ($objMember->mb_emp_fid != $objEmpName->mb_fid)) {  ?>
				<option value="<?=$objEmpName->mb_fid?>"><?=$objEmpName->mb_name?></option>
				<?php } else {?>
				<option value="<?=$objEmpName->mb_fid?>" selected><?=$objEmpName->mb_name?></option>
				<?php } ?>
			<?php endforeach;?>
		</select>
	</div>
<?= $this->endSection() ?>
<?= $this->section('user-edit-form-section2') ?>
		<div class="useredit-text-div">
			<p>색깔:</p> 
			<?php if(is_null($objMember) || is_null($objMember->mb_color)) {  ?>
			<input type="color" value="#ffffff" id="useredit-color-input-id">
			<?php } else {?>
			<input type="color" value="<?=$objMember->mb_color?>" id="useredit-color-input-id" >
			<?php } ?>
		</div>
		<div class="useredit-check-div">			 
			<?php if(is_null($objMember) || $objMember->mb_emp_permit == 0) {  ?>	
			<input type="checkbox" id="useredit-modify-check-id">
			<?php } else {?>
			<input type="checkbox" id="useredit-modify-check-id" checked>
			<?php } ?>
			<label> 하부매장회원정보수정</label>
		</div>
<?= $this->endSection() ?>
<?= $this->section('user-edit-script') ?>
	<script src="<?php echo base_url('assets/js/agency_edit-script.js?v=2');?>"></script>
<?= $this->endSection() ?>
