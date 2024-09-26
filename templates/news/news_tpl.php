<div class="container">
    <h2 class="title-main wow fadeInDown" data-wow-duration="1s"data-wow-delay="0.2s"><span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span></h2>
    <?php if (isset($news) && count($news) > 0) { $func->showPostRow($news,'row rowrp', 'col-md-6 col-sm-6 col-xs-12'); 
    } else { 
        echo'<div class="alert alert-warning" role="alert">';
        echo'<strong>'.dangcapnhat.'</strong>';
        echo'</div>';
    } ?>
    <div class="clear"></div>
    <div class="wow fadeInDown" data-wow-duration="1s"data-wow-delay="0.2s"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
</div>