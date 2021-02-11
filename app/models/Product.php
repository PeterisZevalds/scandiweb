<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts()
    {
        $this->db->query('SELECT * FROM products');
        $results = $this->db->resultset();
        return $results;
    }

    public function addProduct($data)
    {
        // Generates product description based on selected product type
        $description = '';
        switch ($data['product_type']) {
            case 'dvd':
                $description = 'Size: ' . $data['dvd_size'] . ' MB';
                break;
            case 'book':
                $description = 'Weight: ' . $data['book_weight'] . ' KG';
                break;
            case 'furniture':
                $description = 'Dimension: ' . $data['furniture_height'] . 'x' . $data['furniture_width'] . 'x' . $data['furniture_length'];
                break;
        }
        $this->db->query('INSERT INTO products (product_sku, product_name, unit_price, product_type, product_description) VALUES (:product_sku, :product_name, :unit_price, :product_type, :product_description)');

        // Bind values
        $this->db->bind(':product_sku', $data['product_sku']);
        $this->db->bind(':product_name', $data['product_name']);
        $this->db->bind(':unit_price', $data['unit_price']);
        $this->db->bind(':product_type', $data['product_type']);
        $this->db->bind(':product_description', $description);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Find product by SKU number
    public function findProductBySku($product_sku)
    {
        $this->db->query('SELECT * FROM products WHERE product_sku = :product_sku');
        // Bind values
        $this->db->bind(':product_sku', $product_sku);
        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function massDelete($product_ids)
    {

        // Loops trough $product_ids array and deletes all the rows with id
        for ($i = 0; $i < count($product_ids); $i++) {
            $this->db->query('DELETE FROM products WHERE product_id = :product_id');
            // Bind values
            $this->db->bind(':product_id', $product_ids[$i]);
            // Execute
            $this->db->execute();
        }
        redirect('products');
    }
}
