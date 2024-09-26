<?php
include "ajax_config.php";

/* Paginations */
$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;
$where = "";

/* Math url */

if ($idList) {
    $where .= " and id_list = " . $idList;
}

$items = $d->rawQuery("select ten$lang, tenkhongdau$lang, id, photo,giamoi,gia, type ,id_mau,id_size  from #_product where type = ? $where and noibat > 0 and hienthi > 0 order by stt,id desc", array('san-pham'));

if ($items) {
    $func->showProductRow($items,'slick-ajaxslick row', 'col-xs-6 col-sm-4 col-md-3');
}
