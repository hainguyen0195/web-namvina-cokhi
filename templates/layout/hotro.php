<!-- <div class="fixed_right">
    <div class="cart-fixed">
        <a href="gio-hang" title="Xem giỏ hàng">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span><?= (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
        </a>
    </div>
    <?= $addons->setAddons('messages-facebook', 'messages-facebook', 1); ?>
    <div class="icon_chat_f">
        <a href="<?= $optsetting['fanpage'] ?>" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
            <div class="bubble">1</div>
        </a>
    </div>
    <a href="https://zalo.me/<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['zalo']) ?>">
        <div class="zalo_fixed">
            <img src="assets/images/zaloq.png" alt="icon_zalod">
        </div>
    </a>
    <a href="tel:<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['zalo']) ?>">
        <div class="call_fixed">
            <div class="wcircle-icon">
                <img src="assets/images/fp-phone.png" alt="images">
            </div>
        </div>
    </a>
</div> -->
<div id="tienich">
    <a class="res_none btn-zalo btn-frame text-decoration-none" target="_blank"
        href="https://zalo.me/<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['zalo']) ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="assets/images/tienich-zl.png" alt="Zalo"></i>
    </a>
    <a class="res_none btn-phone btn-frame text-decoration-none" target="_blank"
        href="tel:<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['hotline']) ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="assets/images/tienich_hl.png" alt="Hotline"></i>
        <span>Call me: <?= $optsetting['hotline'] ?></span>
    </a>
    <a class="res_none btn-mess btn-frame text-decoration-none" target="_blank" href="<?= $optsetting['messenger'] ?>">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="assets/images/tienich_mess.png" alt="fb_mess"></i>
    </a>
</div>
<div class="fix-toolbar">
    <ul>
        <li>
            <a id="goidien" href="tel:<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['dienthoai']) ?>"
                title="title">
                <img src="assets/images/fp-phone.png" alt="images"><br>
                <span> Gọi điện</span>
            </a>
        </li>
        <li>
            <a id="sms" href="sms:<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['dienthoai']) ?>"
                title="title">
                <img src="assets/images/fp-sms.png" alt="images"><br>
                <span> Nhắn tin</span>
            </a>
        </li>
        <li>
            <a target="_blank"
                href="https://www.google.com/maps/dir/?api=1&amp;origin=&amp;destination=<?= $optsetting['diachi' . $lang] ?>"
                title="Map">
                <img src="assets/images/fp-chiduong.png" alt="images"><br>
                <span> Chỉ đường</span>
            </a>
        </li>
        <li>
            <a id="chatzalo"
                href="https://zalo.me/<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['zalo']) ?>"
                title="title">
                <img src="assets/images/fp-zalo.png" alt="images"><br>
                <span>Chat zalo</span>
            </a>
        </li>
        <li>
            <a target="_blank" id="chatfb" href="<?= $optsetting['messenger'] ?>" title="title">
                <img src="assets/images/fp-mess.png" alt="images"><br>
                <span>Messenger</span>
            </a>
        </li>
    </ul>
</div>