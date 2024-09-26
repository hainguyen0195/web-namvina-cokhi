<?php
/* Sản phẩm */
$nametype = "san-pham";
$config['product'][$nametype]['title_main'] = "Sản phẩm";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['item'] = true;
$config['product'][$nametype]['sub'] = false;
$config['product'][$nametype]['brand'] = false;
$config['product'][$nametype]['mau'] = false;
$config['product'][$nametype]['size'] = false;
$config['product'][$nametype]['giatheomausize'] = false;
$config['product'][$nametype]['tags'] = false;
$config['product'][$nametype]['import'] = false;
$config['product'][$nametype]['export'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['copy'] = true;
$config['product'][$nametype]['copy_image'] = false;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = array("noibat" => "Nổi bật");
$config['product'][$nametype]['gallery'] = array(
  $nametype => array(
    "title_main_photo" => "Hình ảnh Sản phẩm",
    "title_sub_photo" => "Hình ảnh",
    "number_photo" => 1,
    "images_photo" => true,
    "cart_photo" => false,
    "avatar_photo" => true,
    "tieude_photo" => true,
    "width_photo" => 560,
    "height_photo" => 440,
    "thumb_photo" => '100x100x1',
    "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
  ),
  "taptin" => array(
    "title_main_photo" => "Tập tin sản phẩm",
    "title_sub_photo" => "Tập tin",
    "check_photo" => array("hienthi" => "Hiển thị"),
    "number_photo" => 1,
    "file_photo" => true,
    "tieude_photo" => true,
    "file_type_photo" => '.doc|.docx|.pdf|.rar|.zip|.ppt|.pptx|.xls|.xlsx|.jpg|.png|.gif|.webp|.WEBP'
  )
);
$config['product'][$nametype]['setup'] = true;
$config['product'][$nametype]['infoproduct'] = true;
$config['product'][$nametype]['addthongso'] = true;
$config['product'][$nametype]['ma'] = true;
$config['product'][$nametype]['gia'] = true;
$config['product'][$nametype]['giamoi'] = true;
$config['product'][$nametype]['giakm'] = true;
$config['product'][$nametype]['info_more'] = array();
$config['product'][$nametype]['tinh'] = false;
$config['product'][$nametype]['huyen'] = false;
$config['product'][$nametype]['phuong'] = false;
$config['product'][$nametype]['thuoctinh'] = false;
$config['product'][$nametype]['mod_dientich'] = false;
$config['product'][$nametype]['mod_huong'] = false;
$config['product'][$nametype]['mod_gia'] = false;
$config['product'][$nametype]['mota'] = true;
$config['product'][$nametype]['mota_cke'] = false;
$config['product'][$nametype]['noidung'] = true;
$config['product'][$nametype]['noidung_cke'] = true;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['schema'] = true;
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['images2'] = true;
$config['product'][$nametype]['show_images2'] = true;
$config['product'][$nametype]['width'] = 290;
$config['product'][$nametype]['height'] = 280;
$config['product'][$nametype]['thumb'] = '100x100x1';
$config['product'][$nametype]['width'] = 1060;
$config['product'][$nametype]['height'] = 610;
$config['product'][$nametype]['thumb'] = '100x100x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (List) */
$config['product'][$nametype]['title_main_list'] = "Sản phẩm cấp 1";
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['check_list'] = array();
$config['product'][$nametype]['mota_list'] = false;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['images_list'] = false;
$config['product'][$nametype]['show_images_list'] = false;
$config['product'][$nametype]['width_list'] = 55;
$config['product'][$nametype]['height_list'] = 45;
$config['product'][$nametype]['thumb_list'] = '55x45x1';
$config['product'][$nametype]['icon_list'] = false;
$config['product'][$nametype]['show_icon_list'] = false;
$config['product'][$nametype]['width_icon_list'] = 55;
$config['product'][$nametype]['height_icon_list'] = 45;
$config['product'][$nametype]['thumb_icon_list'] = '55x45x1';
$config['product'][$nametype]['icon_list2'] = false;
$config['product'][$nametype]['show_icon_list2'] = false;
$config['product'][$nametype]['width_icon_list2'] = 55;
$config['product'][$nametype]['height_icon_list2'] = 45;
$config['product'][$nametype]['thumb_icon_list2'] = '55x45x1';
$config['product'][$nametype]['images_list2'] = false;
$config['product'][$nametype]['show_images_list2'] = false;
$config['product'][$nametype]['width_list2'] = 55;
$config['product'][$nametype]['height_list2'] = 45;
$config['product'][$nametype]['thumb_list2'] = '55x45x1';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Sản phẩm (Cat) */
$config['product'][$nametype]['title_main_cat'] = "Sản phẩm cấp 2";
$config['product'][$nametype]['images_cat'] = false;
$config['product'][$nametype]['show_images_cat'] = false;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = array();
$config['product'][$nametype]['mota_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 300;
$config['product'][$nametype]['height_cat'] = 200;
$config['product'][$nametype]['thumb_cat'] = '100x100x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

/* Thư viện ảnh */
// $nametype = "thu-vien-anh";
// $config['product'][$nametype]['title_main'] = "Thư viện ảnh";
// $config['product'][$nametype]['dropdown'] = true;
// $config['product'][$nametype]['list'] = false;
// $config['product'][$nametype]['cat'] = false;
// $config['product'][$nametype]['view'] = true;
// $config['product'][$nametype]['copy'] = true;
// $config['product'][$nametype]['copy_image'] = false;
// $config['product'][$nametype]['slug'] = true;
// $config['product'][$nametype]['check'] = array("noibat"=>"Nổi bật");
// $config['product'][$nametype]['images'] = true;
// $config['product'][$nametype]['show_images'] = true;
// $config['product'][$nametype]['gallery'] = array
// (
//     $nametype => array
//     (
//         "title_main_photo" => "Hình ảnh Công trình",
//         "title_sub_photo" => "Hình ảnh",
//         "number_photo" => 3,
//         "images_photo" => true,
//         "cart_photo" => true,
//         "avatar_photo" => true,
//         "tieude_photo" => true,
//         "width_photo" => 600,
//         "height_photo" => 500,
//         "thumb_photo" => '100x100x1',
//         "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
//     ),
// );
// $config['product'][$nametype]['noidung'] = true;
// $config['product'][$nametype]['noidung_cke'] = true;
// $config['product'][$nametype]['seo'] = true;
// $config['product'][$nametype]['width'] = 390;
// $config['product'][$nametype]['height'] = 280;
// $config['product'][$nametype]['thumb'] = '100x100x1';
// $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'; 

/* Thông số */
$nametype = "thong-so";
$config['product'][$nametype]['title_main'] = "Thông số";
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = false;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['keyinfo'] = true;

/* Thông số (List) */
$config['product'][$nametype]['title_main_list'] = "Thông số cấp 1";
