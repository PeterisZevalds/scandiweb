<?php require APPROOT . '/views/inc/header.php'; ?>
<form action="" name="productListForm" onsubmit="actionOnSubmit()" method="POST">
    <div class="d-flex bd-highlight flex-wrap">
        <div class="me-auto p-2 bd-highlight">
            <h2 class="">Product List</h2>
        </div>
        <div class="p-2 bd-highlight">
            <select id="productListOptions" name="productListOptions" class="form-select d-inline" style=" width:200px; height: 50px;">
                <option selected>Choose action</option>
                <option value="<?php echo URLROOT; ?>/products/massDelete">Mass Delete Action</option>
                <option value="2">Action #2</option>
                <option value="3">Action #3</option>
            </select>
        </div>
        <div class="p-2 bd-highlight">
            <button type="submit" class="btn btn-lg btn-outline-secondary d-inline" style="width: 150px; height: 50px;">Apply</button>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-sm-2 col-md-4 col-lg-3 mt-5">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <input type="checkbox" class="form-check-input d-block ml-1" name="<?php echo $product->product_sku ?>" value="<?php echo $product->product_id ?>">
                        <p class="card-text"><?php echo $product->product_sku ?></p>
                        <p class="card-text"><?php echo $product->product_name ?></p>
                        <p class="card-text"><?php echo $product->unit_price . " \$" ?></p>
                        <p class="card-text"><?php echo $product->product_description ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
