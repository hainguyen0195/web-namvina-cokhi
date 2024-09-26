<div class="container">
    <h2 class="title-main wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><span><?= $row_detail['ten' . $lang] ?></span></h2>

    <?php if (isset($row_detail['noidung' . $lang]) && $row_detail['noidung' . $lang] != '') { ?>
        <div class="meta-toc">
            <div class="box-readmore">
                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
            </div>
        </div>
        <div class="content-main w-clear" id="toc-content"><?= htmlspecialchars_decode($row_detail['noidung' . $lang]) ?></div>
        <div class="tags-pro-detail w-clear">
            <?php if (isset($news_tags) && count($news_tags) > 0) {
                foreach ($news_tags as $v) { ?>
                    <a class="transition text-decoration-none w-clear" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>"><i class="fas fa-tags"></i><?= $v['ten' . $lang] ?></a>
            <?php }
            } ?>
        </div>
        <?php include TEMPLATE . "layout/share.php"; ?>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?= noidungdangcapnhat ?></strong>
        </div>
    <?php } ?>
    <?php if (isset($news) && count($news) > 0) {  ?>
        <div class="share othernews">
            <b><?= baivietkhac ?>:</b>
            <ul class="list-news-other">
                <?php for ($i = 0; $i < count($news); $i++) { ?>
                    <li><a class="text-decoration-none" href="<?= $news[$i][$sluglang] ?>" title="<?= $news[$i]['ten' . $lang] ?>">
                            <i class="far fa-newspaper"></i> <?= $news[$i]['ten' . $lang] ?> <span>(<?= date("d/m/Y", $news[$i]['ngaysua']) ?>)</span>
                        </a></li>
                <?php }  ?>
            </ul>
            <div class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
        </div>
    <?php } ?>
</div>