<?php
if (!defined('SOURCES')) die("Error");

if (isset($_POST['submit-contact'])) {
	$responseCaptcha = $_POST['recaptcha_response_contact'];
	$resultCaptcha = $func->checkRecaptcha($responseCaptcha);
	$scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
	$actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
	$testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

	if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'contact') || $testCaptcha == true) {
		$data = array();

		if (isset($_FILES["file"])) {
			$file_name = $func->uploadName($_FILES["file"]["name"]);
			if ($file = $func->uploadImage("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', UPLOAD_FILE_L, $file_name)) {
				$data['taptin'] = $file;
			}
		}

		$data['ten'] = (isset($_POST['ten']) && $_POST['ten'] != '') ? htmlspecialchars($_POST['ten']) : '';
		$data['diachi'] = (isset($_POST['diachi']) && $_POST['diachi'] != '') ? htmlspecialchars($_POST['diachi']) : '';
		$data['dienthoai'] = (isset($_POST['dienthoai']) && $_POST['dienthoai'] != '') ? htmlspecialchars($_POST['dienthoai']) : '';
		$data['email'] = (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '';
		$data['tieude'] = (isset($_POST['tieude']) && $_POST['tieude'] != '') ? htmlspecialchars($_POST['tieude']) : '';
		$data['noidung'] = (isset($_POST['noidung']) && $_POST['noidung'] != '') ? htmlspecialchars($_POST['noidung']) : '';
		$data['ngaytao'] = time();
		$data['stt'] = 1;
		$d->insert('contact', $data);

		/* Gán giá trị gửi email */
		$strThongtin = '';
		$emailer->setEmail('tennguoigui', $data['ten']);
		$emailer->setEmail('emailnguoigui', $data['email']);
		$emailer->setEmail('dienthoainguoigui', $data['dienthoai']);
		$emailer->setEmail('diachinguoigui', $data['diachi']);
		$emailer->setEmail('tieudelienhe', $data['tieude']);
		$emailer->setEmail('noidunglienhe', $data['noidung']);
		if ($emailer->getEmail('tennguoigui')) {
			$strThongtin .= '<span style="text-transform:capitalize">' . $emailer->getEmail('tennguoigui') . '</span><br>';
		}
		if ($emailer->getEmail('emailnguoigui')) {
			$strThongtin .= '<a href="mailto:' . $emailer->getEmail('emailnguoigui') . '" target="_blank">' . $emailer->getEmail('emailnguoigui') . '</a><br>';
		}
		if ($emailer->getEmail('diachinguoigui')) {
			$strThongtin .= '' . $emailer->getEmail('diachinguoigui') . '<br>';
		}
		if ($emailer->getEmail('dienthoainguoigui')) {
			$strThongtin .= 'Tel: ' . $emailer->getEmail('dienthoainguoigui') . '';
		}
		$emailer->setEmail('thongtin', $strThongtin);

		$content_custom = '
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td style="padding:3px 0px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top">
						' . $emailer->getEmail('thongtin') . '
					</td>
				</tr>
				<tr>
					<td colspan="2" style="border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">
						&nbsp;<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal;margin-top:0"><strong>Tiêu đề: </strong> ' . $emailer->getEmail('tieudelienhe') . '<br>
						</td>
					</td>
				</tr>
				<tr>
					<td>
					<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><i>' . $emailer->getEmail('noidunglienhe') . '</i></p>
					</td>
				</tr>
			</tbody>
		</table>';
		$subEmail = bannhanduongthulienhetu . ' ' . $emailer->getEmail('tennguoigui') . ' ' . taiwebsite;
		$contentEmail = $func->createContentMail($content_custom, $subEmail, thongtinlienhe);

		/* Send email admin */
		$arrayEmail = null;
		$subject = thulienhetu . $setting['ten' . $lang];
		$message = $contentEmail;
		$file = 'file';

		if ($emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file)) {
			/* Send email customer */
			$arrayEmail = array(
				"dataEmail" => array(
					"name" => $emailer->getEmail('tennguoigui'),
					"email" => $emailer->getEmail('emailnguoigui')
				)
			);
			$subject = thulienhetu . $setting['ten' . $lang];
			$message = $contentEmail;
			$file = 'file';

			if ($emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file)) $func->transfer(guilienhethanhcong, $config_base);
		} else $func->transfer(guilienhe_tc, $config_base, false);
	} else {
		$func->transfer(guilienhe_tb, $config_base, false);
	}
}

/* SEO */
$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array('lien-he'));
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

$lienhe = $d->rawQueryOne("select noidung$lang from #_static where type = ? limit 0,1", array('lienhe'));

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
