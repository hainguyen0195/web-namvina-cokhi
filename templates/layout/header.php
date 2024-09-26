<header>
    <div class="container">
        <div class="wrap-top call_showin">
            <div class='wrap-top-row flex_row'>
                <div class="logo ">
                    <a class="logo-header" href=""><img
                            onerror="this.src='<?= THUMBS ?>/110x110x2/assets/images/noimage.png';"
                            src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>
                </div>
                <div class="banner ">
                    <a class="banner-header" href=""><img
                            onerror="this.src='<?= THUMBS ?>/600x110x2/assets/images/noimage.png';"
                            src="<?= UPLOAD_PHOTO_L . $banner['photo'] ?>" /></a>
                </div>
                <div class="header-right">
                    <p class="hotline-header">
                        <i class="fas fa-phone-alt"></i> <span><?= $optsetting['hotline'] ?></span>
                    </p>
                    <p class="email-header">
                        <i class="fas fa-envelope"></i> <span><?= $optsetting['email'] ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>