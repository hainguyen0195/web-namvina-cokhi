    <div class="form-group">
        <label class="d-block" for="id_tags">Thông số:</label>
        <?= $func->get_infoproduct(@$item['id'], 'info_group', 'product', $type) ?>
        <input type="hidden" value="<?= $item['id'] ?>" id="id_productthis">
    </div>

    <div id="thongsosanpham">
        <?php
        $pro = $d->rawQueryOne("select info_more,id_info from #_product where id= ? and hienthi > 0", array($item['id']));
        $info_thongso = (isset($pro['info_more']) && $pro['info_more'] != '') ? json_decode($pro['info_more'], true) : null;

        $listinfo = explode(',', $pro['id_info']);
        echo '<div class="row">';
        for ($i = 0; $i < count($listinfo); $i++) {
            $listdetail = $d->rawQueryOne("select tenvi from #_product_list where id= ? and hienthi > 0", array($listinfo[$i]));
            $info = $d->rawQuery("select tenvi,keyinfo from #_product where id_list= ? and hienthi > 0 and type=? ", array($listinfo[$i], 'thong-so'));
            echo '<div class="col-md-12 col-sm-12">';
            echo '<div style="font-size: 1rem; border-bottom: 1px solid rgba(0,0,0,.125);padding: 0.75rem 0.7rem;color: #fff;background: #1385ff;">' . $listdetail['tenvi'] . '</div>';
            echo '<div style="padding: 0.75rem 0.7rem;border: 1px solid rgba(0,0,0,.125);border-top:0;margin-bottom:10px;">';
            $valuehas = '';
            $keynew = '';
            foreach ($info as $key => $value) {
                $keynew = $value['keyinfo'] . $listinfo[$i];
                $valuehas = (isset($info_thongso[$keynew]) && $info_thongso[$keynew] != "") ? $info_thongso[$keynew] : "";
                echo '<div class="form-group">';
                echo '<label for="' . $value['keyinfo'] . $listinfo[$i] . '">' . $value['tenvi'] . ':</label>';
                echo '<input type="text" class="form-control" name="data[info_more][' . $value['keyinfo'] . $listinfo[$i] . ']" id="' . $value['keyinfo'] . $listinfo[$i] . '" placeholder="' . $value['tenvi'] . '" value="' .
                    $valuehas . '" >';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>