
<?php 
$danhmucsp = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_list where type = ? and hienthi > 0 order by stt,id desc",array('san-pham'));
$tintucRight = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('tin-tuc'));
?>
<div class="box-right">
    <h2 class="title-right">Danh mục sản phẩm</h2>
    <?php if (count($danhmucsp)) { ?>
        <ul class="menu-right">
            <?php for ($i = 0; $i < count($danhmucsp); $i++) {
                $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_cat where id_list = ? and hienthi > 0 order by stt,id desc", array($danhmucsp[$i]['id'])); ?>
                <li>
                    <a class="transition" title="<?= $danhmucsp[$i]['ten' . $lang] ?>" href="<?= $danhmucsp[$i][$sluglang] ?>"><?= $danhmucsp[$i]['ten' . $lang] ?></a>
                    <?php if (count($spcatmenu) > 0) { ?>
                        <ul>
                            <?php for ($j = 0; $j < count($spcatmenu); $j++) {  ?>
                                <li>
                                    <a class="transition" title="<?= $spcatmenu[$j]['ten' . $lang] ?>" href="<?= $spcatmenu[$j][$sluglang] ?>"><?= $spcatmenu[$j]['ten' . $lang] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
<div class="box-right">
    <h2 class="title-right">Tin tức nổi bật</h2>
    <?php if (isset($tintucRight) && count($tintucRight) > 0) { ?>
        <div class="post-right-slick">
            <?php foreach ($tintucRight as $k => $v) {   ?>
                <div>
                    <div class="post-right-slick-item flex_row">
                        <div class="post-right-slick-img">
                            <a href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                                <img class="img-responsive" onerror="this.src='<?= THUMBS ?>/200x150x1/assets/images/noimage.png';" src="<?= THUMBS ?>/200x150x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                            </a>
                        </div>
                        <div class="post-right-slick-content ">
                            <h3 class="post-right-slick-name">
                                <a href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>">
                                    <?= $v['ten' . $lang] ?>
                                </a>
                            </h3>
                            <div class="post-right-slick-des">
                                <?= $v['mota' . $lang] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>