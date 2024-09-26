<div class="photoUpload-zone">
	<div class="photoUpload-detail" id="iconUpload-preview"><img class="rounded" src="<?= @$iconDetail ?>" onerror="src='assets/images/noimage.png'" alt="Alt Icon" /></div>
	<label class="photoUpload-file" id="icon-zone" for="file-icon-zone">
		<input type="file" name="icon" id="file-icon-zone">
		<i class="fas fa-cloud-upload-alt"></i>
		<p class="photoUpload-drop">Kéo và thả icon vào đây</p>
		<p class="photoUpload-or">hoặc</p>
		<p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn icon</p>
	</label>
	<div class="photoUpload-dimension"><?= @$dimension ?></div>
</div>