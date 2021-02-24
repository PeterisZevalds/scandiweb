<?php
/*
*   Product model extension for Furniture product type with addProduct() function
*/

class Furniture extends Product
{
    public function addProduct($data)
    {

        // Checks if all 3 furniture parameters are entered before executing database query
        if (empty($data['furniture_height_error']) && empty($data['furniture_width_error']) && empty($data['furniture_length_error'])) {
            $description = 'Dimension: ' . $data['furniture_height'] . 'x' . $data['furniture_width'] . 'x' . $data['furniture_length'];
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
