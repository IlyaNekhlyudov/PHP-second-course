<?php

namespace models;

abstract class ProductModel extends Model {
    
    public function getFinalPrice(int $price, $quantity) :int {
        return $price * $quantity;
    }

    public function getTableName() :string {
        return 'product';
    }
    
}

?>