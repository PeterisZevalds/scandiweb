<?php
/*
*   Product model extension for Book product type with addProduct() function
*/

class Book extends Product
{

    public function addProduct($data)
    {
        if (empty($data['book_weight'])) {
            return false;
        } else {
            $description = 'Weight: ' . $data['book_weight'] . ' KG';
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
    }
}
