<?php if ($about) { ?>
	<section class="section-about padding">
		<div class="container">
			<div class="row row_about">
				<div class="about_left col-md-6 col-sm-6 col-xs-12">
					<div class="about_img">
						<img class="img-responsive" onerror="this.src='<?= THUMBS ?>/580x390x1/assets/images/noimage.png';"
							src="<?= UPLOAD_NEWS_L . $about['photo'] ?>" alt="image about" />
					</div>
				</div>
				<div class="about_right col-md-6 col-sm-6 col-xs-12">
					<h2 class="title-about">
						<p><?= (isset($info_about['text1' . $lang]) && $info_about['text1' . $lang] != '') ? $info_about['text1' . $lang] : '' ?>
						</p>
						<span><?= (isset($info_about['text2' . $lang]) && $info_about['text2' . $lang] != '') ? $info_about['text2' . $lang] : '' ?></span>
					</h2>
					<div class="about_des">
						<?= (isset($about['mota' . $lang]) && $about['mota' . $lang] != '') ? htmlspecialchars_decode($about['mota' . $lang]) : '' ?>
					</div>
					<div class="about_seemore">
						<a href="gioi-thieu" title="<?= _viewmore ?>"><?= _viewmore ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php if (isset($dichvu) && count($dichvu) > 0) { ?>
	<section class="section-dichvu padding">
		<div class="container">
			<h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
				<?= dichvucuachungtoi ?>
			</h2>
			<?php $func->showServiceRow($dichvu, '', 'dichvu-item-reverse'); ?>
		</div>
	</section>
<?php } ?>

<?php if (isset($pronb) && count($pronb) > 0) { ?>
	<section class="section-pronb padding">
		<div class="container">
			<h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
				<?= sanphamnoibat ?>
			</h2>
			<?php $func->showProductRow($pronb, 'pronb-slick row', 'col-md-3'); ?>
		</div>
	</section>
<?php } ?>

<section class="section-media padding">
	<div class="container">
		<h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
			<?= tintucnoibat ?>
		</h2>
		<div class="flex_row row_news_index">
			<?php if ($tintuc_first) { ?>
				<div class="news_index_left">
					<div class="news_first_box">
						<div class="news_first_img">
							<a href="<?= $tintuc_first[$sluglang] ?>" title="<?= $tintuc_first['ten' . $lang] ?>">
								<img class="img-responsive" onerror="this.src='<?= THUMBS ?>/600x380x1/assets/images/noimage.png';" src="<?= THUMBS ?>/600x380x1/<?= UPLOAD_NEWS_L . $tintuc_first['photo'] ?>" alt="<?= $tintuc_first['ten' . $lang] ?>" />
							</a>
						</div>
						<div class="news_first_name">
							<a href="<?= $tintuc_first[$sluglang] ?>" title="<?= $tintuc_first['ten' . $lang] ?>">
								<?= $tintuc_first['ten' . $lang] ?>
							</a>
						</div>
						<div class="news_first_describe">
							<p><?= $tintuc_first['mota' . $lang] ?></p>
						</div>
						<div class="news_first_sm">
							<a href="<?= $tintuc_first[$sluglang] ?>" title="<?= timhieuthem ?>">
								<?= timhieuthem ?> >>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if (isset($tintuc) && count($tintuc) > 0) { ?>
				<div class="news_index_right">
					<?php foreach ($tintuc as $k => $v) {   ?>
						<div class="news_index_box flex_row">
							<div class="news_index_img">
								<a href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
									<img class="img-responsive" onerror="this.src='<?= THUMBS ?>/200x120x1/assets/images/noimage.png';" src="<?= THUMBS ?>/200x120x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
								</a>
							</div>
							<div class="news_index_content ">
								<div class="news_index_name">
									<a href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
										<?= $v['ten' . $lang] ?>
									</a>
								</div>
								<div class="news_index_describe">
									<p><?= $v['mota' . $lang] ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<?php if (isset($rs_video) && count($rs_video) > 0) { ?>
	<section class="section-video padding">
		<div class="container">
			<h2 class="title-home fadeInUp" data-wow-duration="0.2s" data-wow-delay="0.2s">
				Video - Clips
			</h2>
			<div class="slick-video">
				<?php foreach ($rs_video as $k => $v) { ?>
					<div class=" col-md-3">
						<div class="video-item-home video_img">
							<a class="video text-decoration-none" data-fancybox="video" data-src="<?= $v['link_video'] ?>"
								title="<?= $v['ten' . $lang] ?>">
								<img onerror="this.src='<?= THUMBS ?>/380x280x2/assets/images/noimage.png';"
									src="https://img.youtube.com/vi/<?= $func->getYoutube($v['link_video']) ?>/0.jpg"
									alt="<?= $v['ten' . $lang] ?>" />
								<h3 class="video_name "><?= $v['ten' . $lang] ?></h3>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>



<?php if (isset($doitac) && count($doitac) > 0) { ?>
	<section class="section-doitac padding">
		<div class="container">
			<h2 class="title-home fadeInUp" data-wow-duration="0.2s" data-wow-delay="0.2s">
				<?= doitac ?>
			</h2>
			<div class="slick-doitac">
				<?php foreach ($doitac as $k => $v) { ?>
					<div class=" col-md-3">
						<div class="doitac_img">
							<a href="<?= $v['link'] ?>" target="_blank">
								<img class="img-responsive"
									onerror="this.src='<?= THUMBS ?>/220x150x2/assets/images/noimage.png';"
									src="<?= THUMBS ?>/220x150x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>"
									alt="<?= $v['ten' . $lang] ?>" />
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>