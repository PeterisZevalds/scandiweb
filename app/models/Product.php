<?php
class Product
{
    protected $db;
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
