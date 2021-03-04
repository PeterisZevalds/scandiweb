<?php
/*
*   Product model extension for Dvd product type with addProduct() function
*/

class Dvd extends Product
{
    public function checkProductError($data)
    {
        if (empty($data['dvd_size'])) {
            return true;
        }
    }

    public function getErrorMessage()
    {
        $errorMessage = 'Please enter dvd size in MB';
        return $errorMessage;
    }

    public function addProduct($data)
    {
        // Checks if dvd size is entered before executing database query
        if (empty($data['dvd_size'])) {
            return false;
        } else {
            $description = 'Size: ' . $data['dvd_size'] . ' MB';
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
