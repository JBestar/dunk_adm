<?= $this->extend('/home/conf_site') ?>
<?= $this->section('confsite-active') ?>알람설정<?= $this->endSection() ?>

<?= $this->section('confsite-navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('confsite-content') ?>
		<!---->
		<h4><i class="glyphicon glyphicon-hand-right"></i> 알람설정</h4>
		
		<div class="confother-sound-div">
			<label>신규회원 알림음:</label> 
			<select name="pbresult-number" class="pbresult-number-select" id="confsound-alarm1-select-id" style="width: 150px; float: left;">
				<option value="sound_reg.mp3">신규알림음</option>
				<option value="sound1.mp3">알림음1</option>
				<option value="sound2.mp3">알림음2</option>
				<option value="sound3.mp3">알림음3</option>
				<option value="sound4.mp3">알림음4</option>
				<option value="sound5.mp3">알림음5</option>
				<option value="sound6.mp3">알림음6</option>
				<option value="sound7.mp3">알림음7</option>
				<option value="sound8.mp3">알림음8</option>
				<option value="sound9.mp3">알림음9</option>
				<option value="sound10.mp3">알림음10</option>
				<option value="sound11.mp3">알림음11</option>
				<option value="sound12.mp3">알림음12</option>
			</select>
			<audio id="confsound-alarm1-audio-id" controls>
			  <source id="confsound-alarm1-source-id" >
			  Your browser does not support the audio element.
			</audio>
		</div>
		
		<div class="confother-sound-div">
			<label>머니충전 알림음:</label> 
			<select name="pbresult-number" class="pbresult-number-select" id="confsound-alarm2-select-id" style="width: 150px; float: left;">
				<option value="sound_dep.mp3">신규알림음</option>
				<option value="sound1.mp3">알림음1</option>
				<option value="sound2.mp3">알림음2</option>
				<option value="sound3.mp3">알림음3</option>
				<option value="sound4.mp3">알림음4</option>
				<option value="sound5.mp3">알림음5</option>
				<option value="sound6.mp3">알림음6</option>
				<option value="sound7.mp3">알림음7</option>
				<option value="sound8.mp3">알림음8</option>
				<option value="sound9.mp3">알림음9</option>
				<option value="sound10.mp3">알림음10</option>
				<option value="sound11.mp3">알림음11</option>
				<option value="sound12.mp3">알림음12</option>
			</select>
			<audio id="confsound-alarm2-audio-id" controls>
			  
			  <source id="confsound-alarm2-source-id" >
			  Your browser does not support the audio element.
			</audio>
			
		</div>

		<div class="confother-sound-div">
			<label>머니환전 알림음:</label> 
			<select name="pbresult-number" class="pbresult-number-select" id="confsound-alarm3-select-id" style="width: 150px; float: left;">
				<option value="sound_wit.mp3">신규알림음</option>
				<option value="sound1.mp3">알림음1</option>
				<option value="sound2.mp3">알림음2</option>
				<option value="sound3.mp3">알림음3</option>
				<option value="sound4.mp3">알림음4</option>
				<option value="sound5.mp3">알림음5</option>
				<option value="sound6.mp3">알림음6</option>
				<option value="sound7.mp3">알림음7</option>
				<option value="sound8.mp3">알림음8</option>
				<option value="sound9.mp3">알림음9</option>
				<option value="sound10.mp3">알림음10</option>
				<option value="sound11.mp3">알림음11</option>
				<option value="sound12.mp3">알림음12</option>
			</select>
			<audio id="confsound-alarm3-audio-id" controls>
			  
			  <source id="confsound-alarm3-source-id" >
			  Your browser does not support the audio element.
			</audio>
			
		</div>

		<div class="confother-sound-div">
			<label>새쪽지 알림음:</label> 
			<select name="pbresult-number" class="pbresult-number-select" id="confsound-alarm4-select-id" style="width: 150px; float: left;">
				<option value="sound_msg.mp3">신규알림음</option>
				<option value="sound1.mp3">알림음1</option>
				<option value="sound2.mp3">알림음2</option>
				<option value="sound3.mp3">알림음3</option>
				<option value="sound4.mp3">알림음4</option>
				<option value="sound5.mp3">알림음5</option>
				<option value="sound6.mp3">알림음6</option>
				<option value="sound7.mp3">알림음7</option>
				<option value="sound8.mp3">알림음8</option>
				<option value="sound9.mp3">알림음9</option>
				<option value="sound10.mp3">알림음10</option>
				<option value="sound11.mp3">알림음11</option>
				<option value="sound12.mp3">알림음12</option>
			</select>
			<audio id="confsound-alarm4-audio-id" controls>
			  
			  <source id="confsound-alarm4-source-id" >
			  Your browser does not support the audio element.
			</audio>
			
		</div>

		<div class = "confsite-button-group">
			<button class="confsite-cancel-button"  id="confsite-cancel-btn-id">취소</button>
			<button class="confsite-ok-button" id="confsite-ok-btn-id">저장</button>
		</div>
	
<?= $this->endSection() ?>

<?= $this->section('confsite-script') ?>
<?php if(array_key_exists("app.produce", $_ENV)) :?>
    <script src="<?php echo site_furl('/assets/js/confsound-script.js?t='.time());?>"></script>
<?php else : ?>
    <script src="<?php echo site_furl('/assets/js/confsound-script.js?v=1');?>"></script>
<?php endif ?>
<?= $this->endSection() ?>