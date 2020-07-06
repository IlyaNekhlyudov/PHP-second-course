<?php

namespace app\models;

class Order extends Record
{
    public $id;
    public $date;
    public $userID;
    public $email;
    public $phone;
    public $address;
    public $products;
    public $status;


    public function __construct($id = null, $date = null, $userID = null, $email = null, $phone = null, $address = null, $products = null, $status = 'processed')
    {
        $this->id = $id;
        $this->date = $date;
        $this->userID = $userID;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->products = $products;
        $this->status = $status;
    }

    public static function getTableName(): string
    {
        return "orders";
    }
}