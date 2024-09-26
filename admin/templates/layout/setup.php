<div class="card card-primary card-outline text-sm">
    <div class="card-header">
        <h3 class="card-title">Setup</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- <div class="form-group col-md-3">
        <label for="background_position">Vị trí:</label>
        <select id="background_position" name="data[options][background][position]" class="form-control select2">
            <option value="0">Chọn thuộc tính</option>
            <option <?php if ($options['background']['position'] == 'left top') echo 'selected="selected"' ?> value="left top">Canh Trái - Canh Trên</option>
            <option <?php if ($options['background']['position'] == 'left bottom') echo 'selected="selected"' ?> value="left bottom">Canh Trái - Canh Dưới</option>
            <option <?php if ($options['background']['position'] == 'left center') echo 'selected="selected"' ?> value="left center">Canh Trái - Canh Giữa</option>
            <option <?php if ($options['background']['position'] == 'right top') echo 'selected="selected"' ?> value="right top">Canh Phải - Canh Trên</option>
            <option <?php if ($options['background']['position'] == 'right bottom') echo 'selected="selected"' ?> value="right bottom">Canh Phải - Canh Dưới</option>
            <option <?php if ($options['background']['position'] == 'right center') echo 'selected="selected"' ?> value="right center">Canh Phải - Canh Giữa</option>
            <option <?php if ($options['background']['position'] == 'center top') echo 'selected="selected"' ?> value="center top">Canh Giữa - Canh Trên</option>
            <option <?php if ($options['background']['position'] == 'center bottom') echo 'selected="selected"' ?> value="center bottom">Canh Giữa - Canh Dưới</option>
            <option <?php if ($options['background']['position'] == 'center center') echo 'selected="selected"' ?> value="center center">Canh Giữa - Canh Giữa</option>
        </select>
    </div> -->
            <div class="form-group col-md-3">
                <label for="background_color">Màu nền:</label>
                <input type="text" class="form-control jscolor" name="data[info_more][background]" id="background_color" maxlength="7" value="<?= ($info_more['background']) ? $info_more['background'] : '#F5F5F5' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="background_color">Màu text 1:</label>
                <input type="text" class="form-control jscolor" name="data[info_more][colortext1]" id="background_color" maxlength="7" value="<?= ($info_more['colortext1']) ? $info_more['colortext1'] : '#2a377f' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="background_color">Màu text 2:</label>
                <input type="text" class="form-control jscolor" name="data[info_more][colortext2]" id="background_color" maxlength="7" value="<?= ($info_more['colortext2']) ? $info_more['colortext2'] : '#2a377f' ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="background_color">Màu text 3:</label>
                <input type="text" class="form-control jscolor" name="data[info_more][colortext3]" id="background_color" maxlength="7" value="<?= ($info_more['colortext3']) ? $info_more['colortext3'] : '#2a377f' ?>">
            </div>
            <img src="assets/images/image-product-setup.png" alt="" style="max-width:100%;">
        </div>
    </div>
</div>