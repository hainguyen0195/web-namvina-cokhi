<script>
    function addLocationInput() {
        // Tạo một div mới để chứa input và nút xóa
        var div = document.createElement('div');
            div.className = 'd-flex mb-1';


        // Tạo một phần tử input mới
        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'data[apdung][]';
        newInput.placeholder = 'Nhập địa điểm';
        newInput.className = 'form-control mb-1';

        // Tạo một phần tử button để xóa input
        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.innerText = 'Xóa';
        removeButton.className = 'btn btn-sm bg-gradient-danger mb-1';
        removeButton.onclick = function() {
            div.remove();
        };

        // Thêm input và button vào div
        div.appendChild(newInput);
        div.appendChild(removeButton);

        // Thêm div vào container
        var container = document.getElementById('location-container');
        container.appendChild(div);;
    }
    function removeLocationInput(button) {
        var container = document.getElementById('location-container');
        container.removeChild(button.parentNode);
    }
</script>
<div class="col-md-12 col-sm-12">
    <div class="">
        <button type="button" onclick="addLocationInput()" class="btn btn-sm bg-gradient-success">Thêm địa điểm áp dụng</button>
    </div>
    <div id="location-container" class="form-group ">
        <label for="<?= $key_ifm ?>"><?= $value_inf ?></label>
        <?php 
            $locations = json_decode($item['apdung'], true);
            if (is_array($locations)) {
                foreach ($locations as $location) {
                    echo '<div class="d-flex"><input class="form-control mb-1" type="text" name="data[apdung][]" value="' . htmlspecialchars($location) . '">';
                    echo '<button class="btn btn-sm bg-gradient-danger mb-1" type="button" onclick="removeLocationInput(this)">Xóa</button></div>';
                }
            }
        ?>
    </div>
</div>