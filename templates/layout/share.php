<div class="share">
    <div class="time-main"><i class="fad fa-user-circle"></i> Admin <span>- <?= capnhat ?>: <?= $row_detail['ngaysua'] ? date("d/m/Y", $row_detail['ngaysua']) : date("d/m/Y", $row_detail['ngaytao']) ?></span></div>
    <div class="wrap_share">
        <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="3" data-color="blue" data-customize=false></div>
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_whatsapp"></a>
            <a class="a2a_button_facebook_messenger"></a>
            <a class="a2a_button_skype"></a>
        </div>
        <script>
            var a2a_config = a2a_config || {};
            a2a_config.onclick = 1;
            a2a_config.locale = "vi";
        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
    </div>
</div>