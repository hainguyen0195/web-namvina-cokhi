<?php
if (!defined('SOURCES')) die("Error");

// $title_index = $d->rawQueryOne("select info_more from #_static where type = ? limit 0,1", array('text_index'));
// $title_ = (isset($title_index['info_more']) && $title_index['info_more'] != '') ? json_decode($title_index['info_more'], true) : null;


$slider = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc", array('slide'));

$about = $d->rawQueryOne("select ten$lang,mota$lang,photo,info_more from #_static where type = ? limit 0,1", array('gioi-thieu'));
$info_about = (isset($about['info_more']) && $about['info_more'] != '') ? json_decode($about['info_more'], true) : null;
$dichvu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc limit 4", array('dich-vu'));

$pronb = $d->rawQuery("select ten$lang,mota$lang, tenkhongdauvi, tenkhongdauen, id, photo, photo2, giamoi,gia, type ,id_mau,id_size,info_more from #_product where type = ? and noibat > 0 and hienthi > 0", array('san-pham'));

$tintuc = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, mota$lang, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc limit 5", array('tin-tuc'));
$tintuc_first = array_shift($tintuc);

$doitac = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc", array('doi-tac'));

$rs_video = $d->rawQuery("select id,link_video,ten$lang from #_photo where noibat > 0 and type = ? and hienthi > 0", array('video'));

/* SEO */
$seoDB = $seo->getSeoDB(0, 'setting', 'capnhat', 'setting');
$seo->setSeo('h1', $seoDB['title' . $seolang]);
$seo->setSeo('title', $seoDB['title' . $seolang]);
$seo->setSeo('keywords', $seoDB['keywords' . $seolang]);
$seo->setSeo('description', $seoDB['description' . $seolang]);
$seo->setSeo('url', $func->getPageURL());
$img_json_bar = (isset($logo['options']) && $logo['options'] != '') ? json_decode($logo['options'], true) : null;
if ($img_json_bar['p'] != $logo['photo']) {
	$img_json_bar = $func->getImgSize($logo['photo'], UPLOAD_PHOTO_L . $logo['photo']);
	$seo->updateSeoDB(json_encode($img_json_bar), 'photo', $logo['id']);
}
$seo->setSeo('photo', $config_base . THUMBS . '/' . $img_json_bar['w'] . 'x' . $img_json_bar['h'] . 'x2/' . UPLOAD_PHOTO_L . $logo['photo']);
$seo->setSeo('photo:width', $img_json_bar['w']);
$seo->setSeo('photo:height', $img_json_bar['h']);
$seo->setSeo('photo:type', $img_json_bar['m']);
