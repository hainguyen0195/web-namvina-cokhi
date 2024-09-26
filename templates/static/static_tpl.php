<div class="container">
	<h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><span><?= $row_detail['ten' . $lang] ?></span></h2>
	<div class="content-main"><?= (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') ? htmlspecialchars_decode($row_detail['noidung' . $lang]) : '' ?></div>
	<?php include TEMPLATE . "layout/share.php"; ?>
</div>