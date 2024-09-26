<?php
if (!defined('SOURCES')) die("Error");

/* SEO */
$seo->setSeo('title', $title_crumb);

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();

/* Tỉnh thành */
$city = $d->rawQuery("select ten, id from #_city order by id asc");

/* Hình thức thanh toán */
$httt = $d->rawQuery("select ten$lang, mota$lang, id from #_news where type = ? order by stt,id desc", array('hinh-thuc-thanh-toan'));

if (isset($_POST['thanhtoan'])) {
	/* Gán giá trị gửi email */
	$madonhang = strtoupper($func->stringRandom(6));
	$hoten = (isset($_POST['ten']) && $_POST['ten'] != '') ? htmlspecialchars($_POST['ten']) : '';
	$email = (isset($_POST['email']) && $_POST['email'] != '') ? htmlspecialchars($_POST['email']) : '';
	$dienthoai = (isset($_POST['dienthoai']) && $_POST['dienthoai'] != '') ? htmlspecialchars($_POST['dienthoai']) : '';
	$city = (isset($_POST['city']) && $_POST['city'] != '') ? htmlspecialchars($_POST['city']) : 0;
	$district = (isset($_POST['district']) && $_POST['district'] != '') ? htmlspecialchars($_POST['district']) : 0;
	$wards = (isset($_POST['wards']) && $_POST['wards'] != '') ? htmlspecialchars($_POST['wards']) : 0;
	$diachi = htmlspecialchars($_POST['diachi']) . ', ' . $func->get_places("wards", $wards) . ', ' . $func->get_places("district", $district) . ', ' . $func->get_places("city", $city);
	$httt = (isset($_POST['payments'])) ? htmlspecialchars($_POST['payments']) : 0;
	$htttText = ($httt) ? $func->get_payments($httt) : '';
	$yeucaukhac = (isset($_POST['yeucaukhac']) && $_POST['yeucaukhac'] != '') ? htmlspecialchars($_POST['yeucaukhac']) : '';
	$tamtinh = (isset($_POST['price-temp'])) ? htmlspecialchars($_POST['price-temp']) : 0;
	$ship = $cart->get_ship($wards);
	$total = $cart->get_order_total();
	$ngaydangky = time();
	$chitietdonhang = '';
	$max = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;

	for ($i = 0; $i < $max; $i++) {
		$pid = $_SESSION['cart'][$i]['productid'];
		$q = $_SESSION['cart'][$i]['qty'];
		$color = $_SESSION['cart'][$i]['mau'];
		$size = $_SESSION['cart'][$i]['size'];
		$code = $_SESSION['cart'][$i]['code'];
		$proinfo = $cart->get_product_info($pid);

		$pro_price = $cart->get_price_new($pid, $size, $color);

		$pmau = $cart->get_product_mau($color);
		$psize = $cart->get_product_size($size);
		$textsm = '';
		if ($pmau != '' && $psize != '') $textsm = $pmau . " - " . $psize;
		else if ($pmau != '') $textsm = $pmau;
		else if ($psize != '') $textsm = $psize;

		if ($q == 0) continue;
		$chitietdonhang .= '<tbody bgcolor="';
		if ($i % 2 == 0) $chitietdonhang .= '#eee';
		else $chitietdonhang .= '#e6e6e6';

		$chitietdonhang .= '" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"><tr>';
		$chitietdonhang .= '<td align="left" style="padding:3px 9px" valign="top">';
		$chitietdonhang .= '<span style="display:block;font-weight:bold">' . $proinfo['ten' . $lang] . '</span>';
		if ($textsm != '') $chitietdonhang .= '<span style="display:block;font-size:12px">' . $textsm . '</span>';
		$chitietdonhang .= '</td>';
		$chitietdonhang .= '<td align="left" style="padding:3px 9px" valign="top"><span style="color:#ff0000;">' . $func->format_money($pro_price) . '</span></td>';
		$chitietdonhang .= '<td align="center" style="padding:3px 9px" valign="top">' . $q . '</td>';
		$chitietdonhang .= '<td align="right" style="padding:3px 9px" valign="top"><span style="color:#ff0000;">' . $func->format_money($pro_price * $q) . '</span></td>';
		$chitietdonhang .= '</tr></tbody>';
	}

	$chitietdonhang .= '
		<tfoot style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
			<tr>
				<td align="right" colspan="3" style="padding:5px 9px">Tạm tính</td>
				<td align="right" style="padding:5px 9px"><span>' . $func->format_money($tamtinh) . '</span></td>
			</tr>';
	if ($ship) {
		$chitietdonhang .=
			'<tr>
					<td align="right" colspan="3" style="padding:5px 9px">Phí vận chuyển</td>
					<td align="right" style="padding:5px 9px"><span>' . $func->format_money($ship) . '</span></td>
				</tr>';
	}
	$chitietdonhang .= '
			<tr bgcolor="#eee">
				<td align="right" colspan="3" style="padding:7px 9px"><strong><big>Tổng giá trị đơn hàng</big> </strong></td>
				<td align="right" style="padding:7px 9px"><strong><big><span>' . $func->format_money($total) . '</span> </big> </strong></td>
			</tr>
		</tfoot>';

	/* Nội dung gửi email cho admin */
	$content_admin = '
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">' . quykhachnhandcttdonhang . ' #' . $madonhang . ' ' . taiwebsite . ' . ' . $emailer->getEmail('company:website') . '</p>
					<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">' . thongtindonhang . ' #' . $madonhang . ' <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(' . ngay . ' ' . date('d', $emailer->getEmail('datesend')) . ' ' . thang . ' ' . date('m', $emailer->getEmail('datesend')) . ' ' . nam5 . ' ' . date('Y H:i:s', $emailer->getEmail('datesend')) . ')</span></h3>
				</td>
			<tr>
				<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">' . thongtinthanhtoan . '</th>
								<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">' . diachigiaohang . '</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">' . $hoten . '</span><br>
								<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br>
								' . $dienthoai . '</td>
								<td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">' . $hoten . '</span><br>
									<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br>
								' . $diachi . '<br>
									Tel: ' . $dienthoai . '</td>
							</tr>
							<tr>
								<td colspan="2" style="padding:7px 0px 0px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">
								<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><strong>' . hinhthucthanhtoan . ': </strong> ' . $htttText . '';
	if ($ship) {
		$content_admin .= '<br><strong>' . phivanchuyen . ': </strong> ' . $func->format_money($ship);
	}
	$content_admin .= '</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><strong>' . yeucaukhac . ':</strong> <i>' . $yeucaukhac . '</i></p>
				</td>
			</tr>
			<tr>
				<td>
					<h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:' . $emailer->getEmail('color') . '">' . chitietdonhang . '</h2>
					<table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
						<thead>
							<tr>
								<th align="left" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . sanpham . '</th>
								<th align="left" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . dongia . '</th>
								<th align="center" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;min-width:55px;">' . soluong . '</th>
								<th align="right" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . tongtam . '</th>
							</tr>
						</thead>
						' . $chitietdonhang . '
					</table>
					<div style="margin:auto;text-align:center"><a href="' . $emailer->getEmail('home') . '" style="display:inline-block;text-decoration:none;background-color:' . $emailer->getEmail('color') . '!important;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-top:5px" target="_blank">' . chitietdonhangtai . ' ' . $emailer->getEmail('company:website') . '</a></div>
				</td>
			</tr>
		</tbody>
	</table>';
	/* Nội dung gửi email cho khách hàng */
	$content_custom = '
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
			<tr>
				<td>
					<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">' . chungtoiratvuithongbaodh . ' #' . $madonhang . ' ' . cuaquykhachdaduoctiepnhanvadangxuli . ' . ' . $emailer->getEmail('company:website') . ' ' . sethongbaodenquykhachkhidonhangchuanbiduocgiao . '</p>
					<h3 style="font-size:13px;font-weight:bold;color:' . $emailer->getEmail('color') . ';text-transform:uppercase;margin:20px 0 0 0;padding: 0 0 5px;border-bottom:1px solid #ddd">' . thongtindonhang . ' #' . $madonhang . ' <span style="font-size:12px;color:#777;text-transform:none;font-weight:normal">(' . ngay . ' ' . date('d', $emailer->getEmail('datesend')) . ' ' . thang . ' ' . date('m', $emailer->getEmail('datesend')) . ' ' . nam5 . ' ' . date('Y H:i:s', $emailer->getEmail('datesend')) . ')</span></h3>
				</td>
			<tr>
				<td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th align="left" style="padding:6px 9px 0px 0px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">' . thongtinthanhtoan . '</th>
								<th align="left" style="padding:6px 0px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold" width="50%">' . diachigiaohang . '</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="padding:3px 9px 9px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">' . $hoten . '</span><br>
								<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br>
								' . $dienthoai . '</td>
								<td style="padding:3px 0px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal" valign="top"><span style="text-transform:capitalize">' . $hoten . '</span><br>
									<a href="mailto:' . $email . '" target="_blank">' . $email . '</a><br>
								' . $diachi . '<br>
									Tel: ' . $dienthoai . '</td>
							</tr>
							<tr>
								<td colspan="2" style="padding:7px 0px 0px 0px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444" valign="top">
								<p style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><strong>' . hinhthucthanhtoan . ': </strong> ' . $htttText . '';
	if ($ship) {
		$content_custom .= '<br><strong>' . phivanchuyen . ': </strong> ' . $func->format_money($ship);
	}
	$content_custom .= '</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<p style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"><strong>' . yeucaukhac . ':</strong> <i>' . $yeucaukhac . '</i></p>
				</td>
			</tr>
			<tr>
				<td>
					<h2 style="text-align:left;margin:10px 0;border-bottom:1px solid #ddd;padding-bottom:5px;font-size:13px;color:' . $emailer->getEmail('color') . '">' . chitietdonhang . '</h2>
					<table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
						<thead>
							<tr>
								<th align="left" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . sanpham . '</th>
								<th align="left" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . dongia . '</th>
								<th align="center" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;min-width:55px;">' . soluong . '</th>
								<th align="right" bgcolor="' . $emailer->getEmail('color') . '" style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">' . tongtam . '</th>
							</tr>
						</thead>
						' . $chitietdonhang . '
					</table>
					<div style="margin:auto;text-align:center"><a href="' . $emailer->getEmail('home') . '" style="display:inline-block;text-decoration:none;background-color:' . $emailer->getEmail('color') . '!important;text-align:center;border-radius:3px;color:#fff;padding:5px 10px;font-size:12px;font-weight:bold;margin-top:5px" target="_blank">' . chitietdonhangtai . ' ' . $emailer->getEmail('company:website') . '</a></div>
				</td>
			</tr>
		</tbody>
	</table>';


	/* lưu đơn hàng */
	$data_donhang = array();
	$data_donhang['id_user'] = (isset($_SESSION[$login_member]['id'])) ? $_SESSION[$login_member]['id'] : 0;
	$data_donhang['madonhang'] = $madonhang;
	$data_donhang['hoten'] = $hoten;
	$data_donhang['dienthoai'] = $dienthoai;
	$data_donhang['diachi'] = $diachi;
	$data_donhang['email'] = $email;
	$data_donhang['httt'] = $httt;
	$data_donhang['phiship'] = (float)$ship;
	$data_donhang['tamtinh'] = $tamtinh;
	$data_donhang['tonggia'] = $total;
	$data_donhang['yeucaukhac'] = $yeucaukhac;
	$data_donhang['ngaytao'] = $ngaydangky;
	$data_donhang['tinhtrang'] = 1;
	$data_donhang['city'] = $city;
	$data_donhang['district'] = $district;
	$data_donhang['wards'] = $wards;
	$data_donhang['stt'] = 1;
	$id_insert = $d->insert('order', $data_donhang);

	/* lưu đơn hàng chi tiết */
	if ($id_insert) {
		for ($i = 0; $i < $max; $i++) {
			$pid = $_SESSION['cart'][$i]['productid'];
			$q = $_SESSION['cart'][$i]['qty'];
			$proinfo = $cart->get_product_info($pid);
			$gia = $proinfo['gia'];
			$giamoi = $proinfo['giamoi'];
			$color = $cart->get_product_mau($_SESSION['cart'][$i]['mau']);
			$size = $cart->get_product_size($_SESSION['cart'][$i]['size']);
			$code = $_SESSION['cart'][$i]['code'];

			if ($q == 0) continue;

			$data_donhangchitiet = array();
			$data_donhangchitiet['id_product'] = $pid;
			$data_donhangchitiet['id_order'] = $id_insert;
			$data_donhangchitiet['photo'] = $proinfo['photo'];
			$data_donhangchitiet['ten'] = $proinfo['ten' . $lang];
			$data_donhangchitiet['code'] = $code;
			$data_donhangchitiet['mau'] = $color;
			$data_donhangchitiet['size'] = $size;
			//$data_donhangchitiet['gia'] = $gia;
			$data_donhangchitiet['giamoi'] =  $cart->get_price_new($pid, $size, $color);
			$data_donhangchitiet['soluong'] = $q;
			$d->insert('order_detail', $data_donhangchitiet);
		}
	}

	$subEmail_cutomer = thankorder . ' ' . taiwebsite;
	$contentCustomer = $func->createContentMail($content_custom, $subEmail_cutomer, thongtinlienhe);

	$subEmail_admin = cuabanvuacodonhangmoi;
	$contentAdmin = $func->createContentMail($content_admin, $subEmail_admin, thongtinlienhe);


	/* Send email admin */
	$arrayEmail = null;
	$subject = thongtindhtu . $setting['ten' . $lang];
	$message = $contentAdmin;
	$file = '';
	$emailer->sendEmail("admin", $arrayEmail, $subject, $message, $file);

	/* Send email customer */
	$arrayEmail = array(
		"dataEmail" => array(
			"name" => $hoten,
			"email" => $email
		)
	);
	$subject = thongtindhtu . $setting['ten' . $lang];
	$message = $contentCustomer;
	$file = '';
	$emailer->sendEmail("customer", $arrayEmail, $subject, $message, $file);

	/* Xóa giỏ hàng */
	unset($_SESSION['cart']);
	$func->transfer(subguidonhang_tc, $config_base);
}
