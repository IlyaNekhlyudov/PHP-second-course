<?php

namespace app\models;

use app\models\repositories\CartRepository;
use app\services\db;

class Cart extends Record
{
    public $id;
    public $productID;
    public $productImage;
    public $productName;
    public $productPrice;
    public $quantity;
    public $date;
    public $userID;


    public function __construct($id = null, $productID = null, $productImage = null, $productName = null, $productPrice = null, $quantity = null, $date = null, $userID = null)
    {
        $this->id = $id;
        $this->productID = $productID;
        $this->productImage = $productImage;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->quantity = $quantity;
        $this->date = $date;
        $this->userID = $userID;        
    }

    public static function getTableName(): string
    {
        return "cart";
    }

    public function getItemByUser($userID, $productID)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE userID = :userID AND productID = :productID LIMIT 1";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':userID' => $userID, ':productID' => $productID])[0];
    }

    public function setQuantity($params)
    {
        $this->catch('quantity');
        return $this->quantity = $params;
    }
}