<div class="visible-xs showmnrp">
    <div class="title-rpmenu">
        <div class="btn-showmenu-wrap" onclick="handleOffMenu()">
            Menu
            <div class="btn-showmenu">
                <span></span>
            </div>
        </div>
    </div>
    <div id="responsive-menu">
        <div class="title-responsive-menu flex_row">
            <p>
                <i class="fal fa-bars"></i>
                Menu
            </p>
            <span class="close-menu-responsive" onclick="handleOffMenu()">
                <i class="fal fa-times"></i>
            </span>
        </div>
        <div class="drawer-left__inner">
            <div class="content">

            </div>
            <div class="hotline-email-responsive">
                <span><i class="far fa-envelope"></i> <?= $optsetting['email'] ?></span>
                <a href="tel:<?= str_replace(array(',', '.', ' ', '-'), '', $optsetting['hotline']) ?>"><i
                        class="fas fa-phone-alt"></i><?= $optsetting['hotline'] ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="overlay-backdrop" onclick="handleOffMenu()"></div>
</div>