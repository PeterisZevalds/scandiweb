<?php require APPROOT . '/views/inc/header.php'; ?>

<form action="<?php echo URLROOT; ?>/products/add" method="POST">
    <div class="d-flex bd-highlight flex-wrap">
        <h2 class="me-auto p-2 bd-highlight">Product Add</h2>
        <button type="submit" class="btn btn-outline-secondary btn-lg p-2 bd-highlight" style="width: 150px;">Save</button>
    </div>
    <hr>
    <div class="row mb-3">
        <label for="product_sku" class="col-sm-2 col-form-label">SKU<span style="color:red">*</span></label>
        <div class="col-sm-2">
            <input type="text" style="width: 300px;" class="form-control <?php echo (!empty($data['product_sku_error'])) ? 'is-invalid' : ''; ?>" name="product_sku" value="<?php echo $data['product_sku']; ?>">
            <span class="invalid-feedback"><?php echo $data['product_sku_error']; ?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="product_name" class="col-sm-2 col-form-label">Name<span style="color:red">*</span></label>
        <div class="col-sm-2">
            <input type="text" style="width: 300px;" class="form-control <?php echo (!empty($data['product_name_error'])) ? 'is-invalid' : ''; ?>" name="product_name" id="product_name" value="<?php echo $data['product_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['product_name_error']; ?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="unit_price" class="col-sm-2 col-form-label">Price<span style="color:red">*</span></label>
        <div class="col-sm-2">
            <input type="number" style="width: 300px;" step="0.01" class="form-control <?php echo (!empty($data['unit_price_error'])) ? 'is-invalid' : ''; ?>" name="unit_price" id="unit_price" value="<?php echo $data['unit_price']; ?>">
            <span class="invalid-feedback"><?php echo $data['unit_price_error']; ?></span>
        </div>
    </div>
    <div class="row mb-3">
        <label for="product_type" class="col-sm-2 col-form-label">Product type<span style="color:red">*</span></label>
        <div class="col-sm-2">
            <select style="width: 300px;" class="form-select  <?php echo (!empty($data['product_type_error'])) ? 'is-invalid' : ''; ?>" name="product_type" id="product_type" value="<?php echo $data['product_type']; ?>" onchange="changeProductCard()">
                <option value="">Choose product type</option>
                <option value="dvd" <?php if ($data['product_type'] == "dvd") {
                                        echo 'selected';
                                    } ?>>DVD-disc</option>
                <option value="book" <?php if ($data['product_type'] == "book") {
                                            echo 'selected';
                                        } ?>>Book</option>
                <option value="furniture" <?php if ($data['product_type'] == "furniture") {
                                                echo 'selected';
                                            } ?>>Furniture</option>
            </select>
            <span class="invalid-feedback"><?php echo $data['product_type_error']; ?></span>
        </div>
    </div>

    <!-- Form dynamic type-selector cards starts with empty visible block.
        This is class that changeProductCard() function adds/removes.
        -->
    <div class="card text-center bg-light" style="max-width: 30rem; height: 20rem;" id="productCard">

    </div>

    <!-- DVD card display-none by default-->
    <div class="card text-center bg-light d-none" style="max-width: 30rem; height: 20rem;" id="dvdCard">
        <div class="m-2 row">
            <label class="col-5 col-form-label w-25">Size<span style="color:red">*</span></label>
            <div class="col-auto w-50">
                <input type="number" style="width: 13rem;" class="form-control <?php echo (!empty($data['product_parameter_error'])) ? 'is-invalid' : ''; ?>" name="dvd_size" id="dvd_size" value="<?php echo $data['dvd_size']; ?>">
                <span style="width: 13rem;" class="invalid-feedback"><?php echo $data['product_parameter_error']; ?></span>
            </div>
        </div>
        <div class="m-2 row">
            <p class="col-auto">Please provide the DVD-disc size in MB</p>
        </div>
    </div>

    <!-- Book card display-none by default-->
    <div class="card text-center bg-light d-none" style="max-width: 30rem; height: 20rem;" id="bookCard">
        <div class="m-2 row">
            <label class="col-5 col-form-label w-25">Weight<span style="color:red">*</span></label>
            <div class="col-auto w-50">
                <input type="number" style="width: 13rem;" step="0.01" class="form-control <?php echo (!empty($data['product_parameter_error'])) ? 'is-invalid' : ''; ?>" name="book_weight" id="book_weight" value="<?php echo $data['book_weight']; ?>">
                <span style="width: 13rem;" class="invalid-feedback"><?php echo $data['product_parameter_error']; ?></span>
            </div>
        </div>
        <div class="m-2 row">
            <p class="col-auto">Please provide books weight in KG</p>
        </div>
    </div>

    <!-- Furniture card display-none by default-->
    <div class="card text-center bg-light d-none" style="max-width: 30rem; height: 20rem;" id="furnitureCard">
        <div class="m-2 row">
            <label class="col-5 col-form-label w-25">Height<span style="color:red">*</span></label>
            <div class="col-auto w-50">
                <input type="number" style="width: 13rem;" class="form-control <?php echo (!empty($data['product_parameter_error'])) ? 'is-invalid' : ''; ?>" name="furniture_height" id="furniture_height" value="<?php echo $data['furniture_height']; ?>">
                <span style="width: 13rem;" class="invalid-feedback"><?php echo $data['product_parameter_error']; ?></span>
            </div>
        </div>
        <div class="m-2 row">
            <label class="col-5 col-form-label w-25">Width<span style="color:red">*</span></label>
            <div class="col-auto w-50">
                <input type="number" style="width: 13rem;" class="form-control <?php echo (!empty($data['product_parameter_error'])) ? 'is-invalid' : ''; ?>" name="furniture_width" id="furniture_width" value="<?php echo $data['furniture_width']; ?>">
                <span style="width: 13rem;" class="invalid-feedback"><?php echo $data['product_parameter_error']; ?></span>
            </div>
        </div>
        <div class="m-2 row">
            <label class="col-5 col-form-label w-25">Length<span style="color:red">*</span></label>
            <div class="col-auto w-50">
                <input type="number" style="width: 13rem;" class="form-control <?php echo (!empty($data['product_parameter_error'])) ? 'is-invalid' : ''; ?>" name="furniture_length" id="furniture_length" value="<?php echo $data['furniture_length']; ?>">
                <span style="width: 13rem;" class="invalid-feedback"><?php echo $data['product_parameter_error']; ?></span>
            </div>
        </div>
        <div class="m-2 row">
            <p class="col-auto">Please provide furniture dimensions in MM</p>
        </div>
    </div>
</form>
<script src="<?php echo URLROOT; ?>/public/js/productList.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>