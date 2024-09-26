<div class="row rowrp">
    <div class="left-pro-detail col-md-5 col-sm-5 col-xs-12">
        <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" src="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>"></a>
        <?php if ($hinhanhsp) {
            if (count($hinhanhsp) > 0) { ?>
                <div class="gallery-thumb-pro">
                    <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
                    <div class="owl-carousel owl-theme owl-thumb-pro">
                        <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" src="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $row_detail['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>"></a>
                        <?php foreach ($hinhanhsp as $v) { ?>
                            <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $row_detail['ten' . $lang] ?>">
                                <img onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';" src="<?= THUMBS ?>/540x540x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $row_detail['ten' . $lang] ?>">
                            </a>
                        <?php } ?>
                    </div>
                    <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
                </div>
        <?php }
        } ?>
    </div>
    <div class="right-pro-detail  col-md-7 col-sm-7 col-xs-12">
        <p class="title-pro-detail"><?= $row_detail['ten' . $lang] ?></p>
        <div class="price-content-pro-detail">
            <?php if (isset($row_detail_size)) {
                $gia_km = 0;
                if ($row_detail_size['gia'] > 0) {
                    $gia_km = round(100 - (($row_detail_size['giaban'] * 100) / $row_detail_size['gia']), 0);
                }
                $func->get_price_detail($row_detail_size['gia'], $row_detail_size['giaban'], $gia_km);
            } else {
                $func->get_price_detail($row_detail['gia'], $row_detail['giamoi'], $row_detail['giakm']);
            } ?>
        </div>
        <?= (isset($row_detail['mota' . $lang]) && $row_detail['mota' . $lang] != '') ? '<div class="desc-pro-detail">' . htmlspecialchars_decode($row_detail['mota' . $lang]) . '</div>' : '' ?>
        <ul class="attr-pro-detail">
            <?php if (isset($row_detail['masp']) && $row_detail['masp'] != '') { ?>
                <li class="w-clear">
                    <label class="attr-label-pro-detail"><?= masp ?>:</label>
                    <div class="attr-content-pro-detail masp-attr-content-pro-detail"><?= $row_detail['masp'] ?></div>
                </li>
            <?php } ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?= luotxem ?>:</label>
                <div class="attr-content-pro-detail"><?= $row_detail['luotxem'] ?></div>
            </li>
        </ul>
        <div class="wrap_share">
            <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="3" data-color="blue" data-customize=false></div>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_facebook_messenger"></a>
                <a class="a2a_button_skype"></a>
            </div>
            <script>
                var a2a_config = a2a_config || {};
                a2a_config.onclick = 1;
                a2a_config.locale = "vi";
            </script>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
        </div>
    </div>
</div>