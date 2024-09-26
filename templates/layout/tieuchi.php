<?php
$tieuchi = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo from #_news where type = ? and hienthi > 0 order by stt,id desc", array('tieu-chi'));

if (isset($tieuchi)) { ?>
	<section class="section-tieuchi padding">
		<div class="container">
			<div class="tieuchi-slick row">
				<?php foreach ($tieuchi as $k => $v) { ?>
					<div class="col-tieuchi wow fadeInUp" data-wow-duration="<?= ($k + 1) / 10 + 0.4 ?>s" data-wow-delay="<?= ($k + 1) / 10 + 0.4 ?>s">
						<div class="tieuchi-item">
							<div class="tieuchi-img">
								<img class="img-responsive" onerror="this.src='<?= THUMBS ?>/100x100x2/assets/images/noimage.png';" src="<?= THUMBS ?>/100x100x2/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
							</div>
							<div class="tieuchi-name">
								<span>
									<?= $v['ten' . $lang] ?>
								</span>
								<p><?= $v['mota' . $lang] ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>