<div class="container">
    <h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><span><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></span></h2>
    <div class="content-main ">
        <?php if (isset($product) && count($product) > 0) {
            $func->showProductRow($product, 'row rowrp', 'col-xs-6 col-sm-4 col-md-3'); ?>
            <div class="clear"></div>
            <div class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?= ($com == 'tim-kiem') ? khongtimthayketqua : dangcapnhat ?></strong>
            </div>
        <?php } ?>
    </div>
</div>