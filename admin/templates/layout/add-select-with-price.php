namtoanviet
php 
foreach ($data as $column => $value) {
            if (is_array($value)) {
                foreach ($value as $k2 => $v2) $info_more[$k2] = $v2;
                $data[$column] = json_encode($info_more);
            } else {
                $data[$column] = htmlspecialchars($value);
            }
        }

        if (isset($_POST['data']['luachon']) && is_array($_POST['data']['luachon'])) {
            $selects = $_POST['data']['luachon'];
            $prices = $_POST['data']['gialuachon'];

            // Biến đổi thành mảng dữ liệu
            $selectPrice = [];
            foreach ($selects as $index => $select) {
                $price = (isset($prices[$index]) && $prices[$index] != '') ? str_replace(",", "", $prices[$index]) : 0;;

                if (!empty($select) && !empty($price)) {
                    $itemSelect = [
                        'luachon' => $select,
                        'gia' => $price
                    ];
                    $selectPrice[] = $itemSelect;
                }
            }

            // Chuyển đổi thành chuỗi JSON
            $data['selectPrice'] = json_encode($selectPrice);

        }
        unset($data['luachon']);
        unset($data['gialuachon']);

        php
        template info_product
        <?php
            // Chuỗi JSON mẫu
            //$item['selectPrice'] = '[{"luachon":"lua chon 1","gia":"122222"},{"luachon":"lua chon 2","gia":"1222223333"},{"luachon":"lua chon 3","gia":"4444444"}]';

            // Decode chuỗi JSON thành mảng PHP
            $locations = json_decode($row_detail['selectPrice'], true);
            // Kiểm tra và hiển thị các input
            if (is_array($locations)) {
                $classActive='';
                echo '<div class="d-flex">';
                foreach ($locations as $index => $location) {
                    // Lấy giá trị luachon và gia từ mảng $location
                    $luachon = isset($location['luachon']) ? htmlspecialchars($location['luachon']) : '';
                    $gia = isset($location['gia']) ? htmlspecialchars($location['gia']) : '';

                    if($index==0)$classActive='active';else $classActive='';
                    
                    echo '<span class="btn-select-price '.$classActive.'" data-name="'.$luachon.'" data-gia="'.$func->format_money($gia).'" >' . $luachon . '</span>';
                  
                }
                  echo '</div>';
            }
            ?>
            app.js 
            Hcode.selectPrice = function(){
    if ($(".btn-select-price").exists()) {
        var gia=$('.btn-select-price.active').data("gia");
        $('.price-content-pro-detail').html('<div class="price-detail"><span class="main-price-product">'+gia+'</span></div>');

        $(".btn-select-price").click(function () {
            $('.btn-select-price').removeClass('active');
            $(this).addClass('active');
            var gia=$(this).data("gia");
            $('.price-content-pro-detail').html('<div class="price-detail"><span class="main-price-product">'+gia+'</span></div>');
        })
    }
};

<script>

        function load_conso() {
            $('.conso').priceFormat({
                limit: 13,
                prefix: '',
                centsLimit: 0
            });
        }
        $(document).ready(function() {
            load_conso();
        });
        function addLocationInput() {
            // Tạo một div mới để chứa input và nút xóa
            var div = document.createElement('div');
            div.className = 'd-flex mb-1';

            // Tạo một phần tử input mới cho lựa chọn
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'data[luachon][]';
            newInput.placeholder = 'Nhập lựa chọn';
            newInput.className = 'form-control mb-1';

            // Tạo một phần tử input mới cho giá
            var priceInput = document.createElement('input');
            priceInput.type = 'text';
            priceInput.name = 'data[gialuachon][]';
            priceInput.placeholder = 'Nhập giá';
            priceInput.className = 'form-control mb-1 conso'; // Thêm class 'conso' để áp dụng định dạng giá

           
            // Tạo một phần tử button để xóa input
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Xóa';
            removeButton.className = 'btn btn-sm bg-gradient-danger mb-1';
            removeButton.onclick = function() {
                div.remove();
            };

            // Thêm input, giá và button vào div
            div.appendChild(newInput);
            div.appendChild(priceInput);
            div.appendChild(removeButton);

            // Thêm div vào container
            var container = document.getElementById('location-container');
            container.appendChild(div);
            // Gọi hàm load_conso() để định dạng giá
            load_conso();

        }

        function removeLocationInput(button) {
            var container = document.getElementById('location-container');
            container.removeChild(button.parentNode);
        }

</script>

<div class="col-md-12 col-sm-12">
    <div class="">
        <button type="button" onclick="addLocationInput()" class="btn btn-sm bg-gradient-success">Thêm lựa chọn</button>
    </div>
    <div id="location-container" class="form-group">
        <label for="<?= $key_ifm ?>"><?= $value_inf ?></label>
        <?php
            // Chuỗi JSON mẫu
            //$item['selectPrice'] = '[{"luachon":"lua chon 1","gia":"122222"},{"luachon":"lua chon 2","gia":"1222223333"},{"luachon":"lua chon 3","gia":"4444444"}]';

            // Decode chuỗi JSON thành mảng PHP
            $locations = json_decode($item['selectPrice'], true);
            // Kiểm tra và hiển thị các input
            if (is_array($locations)) {
                foreach ($locations as $index => $location) {
                    // Lấy giá trị luachon và gia từ mảng $location
                    $luachon = isset($location['luachon']) ? htmlspecialchars($location['luachon']) : '';
                    $gia = isset($location['gia']) ? htmlspecialchars($location['gia']) : '';

                    // Hiển thị input và nút xóa
                    echo '<div class="d-flex">';
                    echo '<input class="form-control mb-1" type="text" name="data[luachon][]" value="' . $luachon . '">';
                    echo '<input class="form-control mb-1 conso" type="text" name="data[gialuachon][]" value="' . $gia . '">';
                    echo '<button class="btn btn-sm bg-gradient-danger mb-1" type="button" onclick="removeLocationInput(this)">Xóa</button>';
                    echo '</div>';
                }
            }
            ?>
    </div>
</div>
