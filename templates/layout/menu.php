<div class="menu flex_row call_showin">
    <div class="container">
        <div class="row-menu flex_row">
            <ul class="flex_row " id="main-nav">
                <li><a class="transition <?php if ($com == '' || $com == 'index') echo 'active'; ?>" href=""
                        title="<?= trangchu ?>"><?= trangchu ?></a></li>

                <li><a class="transition <?php if ($com == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu"
                        title="<?= gioithieu ?>"><?= gioithieu ?></a></li>

                <li>
                    <a class="transition <?php if ($com == 'san-pham') echo 'active'; ?>" href="san-pham"
                        title="<?= sanpham ?>"><?= sanpham ?></a>
                    <?php if (count($splistmenu)) { ?>
                        <ul>
                            <?php for ($i = 0; $i < count($splistmenu); $i++) { ?>
                                <li>
                                    <a class="transition" title="<?= $splistmenu[$i]['ten' . $lang] ?>"
                                        href="<?= $splistmenu[$i][$sluglang] ?>"><?= $splistmenu[$i]['ten' . $lang] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>

                <li>
                    <a class="transition <?php if ($com == 'dich-vu') echo 'active'; ?>" href="dich-vu"
                        title="<?= dichvu ?>"><?= dichvu ?></a>
                </li>
                <li>
                    <a class="transition <?php if ($com == 'du-an') echo 'active'; ?>" href="du-an"
                        title="<?= duan ?>"><?= duan ?></a>
                </li>

                <li>
                    <a class="transition <?php if ($com == 'tin-tuc') echo 'active'; ?>" href="tin-tuc"
                        title="<?= tintuc ?>"><?= tintuc ?></a>
                </li>

                <li><a class="transition <?php if ($com == 'lien-he') echo 'active'; ?>" href="lien-he"
                        title="<?= lienhe ?>"><?= lienhe ?></a></li>

            </ul>
            <button class="btn-open-search" onclick="handleOffSearch()"><i class="fal fa-search"></i></button>
            <div class="search">
                <input type="text" id="keyword" placeholder="<?= timkiem ?>" onkeypress="doEnter(event,'keyword');"
                    value="<?= (isset($tukhoa) && $tukhoa != '') ? $tukhoa : '' ?>" />
                <p onclick="onSearch('keyword');"><i class="fas fa-search"></i></p>
            </div>
            <div class="lang-header">
                <span><img src="assets/images/<?= $lang ?>.jpg"
                        alt=""><?= (isset($lang) && $lang == 'vi') ? vietnam : tienganh ?></span>
                <div class="slideTogglelangheader">
                    <a href="ngon-ngu/vi/"><img src="assets/images/vi.jpg" alt=""><?= vietnam ?></a>
                    <a href="ngon-ngu/en/"><img src="assets/images/en.jpg" alt=""><?= tienganh ?></a>
                </div>
            </div>
        </div>
    </div>
</div>