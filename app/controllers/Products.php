<?php

class Products extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        // Get posts
        $products = $this->productModel->getProducts();
        $data = [
            'products' => $products
        ];
        $this->view('products/list', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product_sku' => trim($_POST['product_sku']),
                'product_name' => trim($_POST['product_name']),
                'unit_price' => trim($_POST['unit_price']),
                'product_type' => trim($_POST['product_type']),
                'dvd_size' => trim($_POST['dvd_size']),
                'book_weight' => trim($_POST['book_weight']),
                'furniture_height' => trim($_POST['furniture_height']),
                'furniture_width' => trim($_POST['furniture_width']),
                'furniture_length' => trim($_POST['furniture_length']),
                'product_sku_error' => '',
                'product_name_error' => '',
                'unit_price_error' => '',
                'product_type_error' => '',
                'dvd_size_error' => '',
                'book_weight_error' => '',
                'furniture_height_error' => '',
                'furniture_width_error' => '',
                'furniture_length_error' => '',
            ];

            // Validate data
            if (empty($data['product_sku'])) {
                $data['product_sku_error'] = 'Please enter product SKU';
            } else {
                // Check if product with this SKU number already exists. (SKU number is unique)
                if ($this->productModel->findProductBySku($data['product_sku'])) {
                    $data['product_sku_error'] = 'Product with this SKU number already exists';
                }
            }
            if (empty($data['product_name'])) {
                $data['product_name_error'] = 'Please enter product name';
            }
            if (empty($data['unit_price'])) {
                $data['unit_price_error'] = 'Please enter unit price';
            }
            if (empty($data['product_type'])) {
                $data['product_type_error'] = 'Please choose product type';
            }

            // Validate product weight/size
            if (empty($data['dvd_size'])) {
                $data['dvd_size_error'] = 'Please enter DVD Size';
            }
            if (empty($data['book_weight'])) {
                $data['book_weight_error'] = 'Please enter book weight';
            }
            if (empty($data['furniture_height'])) {
                $data['furniture_height_error'] = 'Please enter furniture weight';
            }
            if (empty($data['furniture_width'])) {
                $data['furniture_width_error'] = 'Please enter furniture width';
            }
            if (empty($data['furniture_length'])) {
                $data['furniture_length_error'] = 'Please enter furniture length';
            }

            // Make sure no errors
            if (empty($data['product_sku_error']) && empty($data['product_name_error']) && empty($data['unit_price_error']) && empty($data['product_type_error'])) {

                // Validated
                // Creates a new model based on selected product type
                $this->newModel = $this->model(ucwords($data['product_type']));
                if ($this->newModel->addProduct($data)) {
                    redirect('products');
                } else {
                    $this->view('products/add', $data);
                }
            } else {
                $this->view('products/add', $data);
            }
        } else {
            $data = [
                'product_sku' => '',
                'product_name' => '',
                'unit_price' => '',
                'product_type' => '',
                'dvd_size' => '',
                'book_weight' => '',
                'furniture_height' => '',
                'furniture_width' => '',
                'furniture_length' => ''
            ];

            $this->view('products/add', $data);
        }
    }

    public function massDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Generates an array with ID's to pass to massDelete() function.
            $product_ids = [];
            foreach ($_POST as $product_sku => $product_id) {
                $product_ids[] = $product_id;
            }

            $this->productModel->massDelete($product_ids);
            redirect('products');
        }
    }
}
