<footer>
    <div class="container">
        <div class="row_footer flex">
            <div class="footer1">
                <div class="noidungfooter">
                    <?= htmlspecialchars_decode($footer['noidung' . $lang]) ?>
                </div>
                <div class="mangxahoi_footer chungnhan flex_row">
                    <?php for ($i = 0; $i < count($chungnhan); $i++) { ?>
                        <a href="<?= $chungnhan[$i]['link'] ?>" target="_blank"><img src="<?= UPLOAD_PHOTO_L . $chungnhan[$i]['photo'] ?>" alt="<?= $chungnhan[$i]['ten' . $lang] ?>"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer2">
                <div class="ttft1"><?= chinhsach ?></div>
                <div class="chinhsach">
                    <?php foreach ($cs as $k => $v) { ?>
                        <a href="<?= $v['tenkhongdau' . $lang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <?= $v['ten' . $lang] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer3">
                <div class="ttft1"><?= sanpham ?></div>
                <div class="chinhsach">
                    <?php foreach ($splistmenu as $k => $v) { ?>
                        <a href="<?= $v['tenkhongdau' . $lang] ?>" title="<?= $v['ten' . $lang] ?>">
                            <?= $v['ten' . $lang] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer4">
                <?= $addons->setAddons('fanpage-facebook', 'fanpage-facebook', 10); ?>
            </div>
        </div>
    </div>
</footer>
<div class="coppyright">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="mangxahoi_footer flex_row">
                    <?php for ($i = 0; $i < count($mangxahoi_footer); $i++) { ?>
                        <a href="<?= $mangxahoi_footer[$i]['link'] ?>" target="_blank"><img src="<?= UPLOAD_PHOTO_L . $mangxahoi_footer[$i]['photo'] ?>" alt="<?= $mangxahoi_footer[$i]['ten' . $lang] ?>"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="thongke col-xs-12 col-sm-6 col-md-6">
                <?= $optsetting['coppyright'] ?>
            </div>
        </div>
    </div>
</div>
<div id="bandoiframe">
    <?= $addons->setAddons('footer-map', 'footer-map', 10); ?>
</div>