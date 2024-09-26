<?php
$camnhan = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo,text from #_news where type = ? and hienthi > 0 order by stt asc", array('cam-nhan'));
if (isset($camnhan) && count($camnhan) > 0) { ?>
    <section class="section-camnhan padding">
        <div class="container">
            <h2 class="title-home fadeInUp" data-wow-duration="0.2s" data-wow-delay="0.2s">
                <?= (isset($title_['camnhanvi']) && $title_['camnhanvi'] != '') ? $title_['camnhanvi'] : '' ?>
            </h2>
            <?php if (isset($camnhan) && count($camnhan) > 0) { ?>
                <div class="box-camnhan">
                    <div class="box-slick_camnhan_img wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
                        <div class="slick_camnhan_img">
                            <?php foreach ($camnhan as $k => $v) { ?>
                                <div class="">
                                    <div class="camnhan_img">
                                        <img class="img-responsive" onerror="this.src='<?= THUMBS ?>/170x170x2/assets/images/noimage.png';" src="<?= THUMBS ?>/170x170x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class=" wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.2s">
                        <div class="slick_camnhan_content">
                            <?php foreach ($camnhan as $k => $v) { ?>
                                <div class="">
                                    <div class="camnhan-content">
                                        <div class="ten_camnhan">
                                            <span><?= $v['ten' . $lang] ?></span>
                                            <p><?= $v['text'] ?></p>
                                        </div>
                                        <div class="mota_camnhan">
                                            <p><?= $v['mota' . $lang] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>