<?php
if (!defined('SOURCES')) die("Error");

/* Lấy bài viết tĩnh */
$row_detail = $d->rawQueryOne("select id, type, ten$lang, noidung$lang, photo, ngaytao, ngaysua from #_static where type = ? limit 0,1", array($type));

/* SEO */
$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array($type));
$seo->setSeo('h1', $title_crumb);
if ($seopage['title' . $seolang] != '') $seo->setSeo('title', $seopage['title' . $seolang]);
else $seo->setSeo('title', $title_crumb);
$seo->setSeo('keywords', $seopage['keywords' . $seolang]);
$seo->setSeo('description', $seopage['description' . $seolang]);
$seo->setSeo('url', $func->getPageURL());
$img_json_bar = (isset($seopage['options']) && $seopage['options'] != '') ? json_decode($seopage['options'], true) : null;
if ($img_json_bar['p'] != $seopage['photo']) {
	$img_json_bar = $func->getImgSize($seopage['photo'], UPLOAD_SEOPAGE_L . $seopage['photo']);
	$seo->updateSeoDB(json_encode($img_json_bar), 'seopage', $seopage['id']);
}
$seo->setSeo('photo', $config_base . THUMBS . '/' . $img_json_bar['w'] . 'x' . $img_json_bar['h'] . 'x2/' . UPLOAD_SEOPAGE_L . $seopage['photo']);
$seo->setSeo('photo:width', $img_json_bar['w']);
$seo->setSeo('photo:height', $img_json_bar['h']);
$seo->setSeo('photo:type', $img_json_bar['m']);

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();

