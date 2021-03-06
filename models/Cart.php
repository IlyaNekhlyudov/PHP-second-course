<?php

namespace app\models;

class Cart extends Record
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $category_id
     */
    public function __construct($id = null, $name = null, $description = null, $price = null, $category_id = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->productID = $productID;
        $this->quantity = $quantity;
        $this->date = $date;
        $this->userHash = $userHash;
    }


    public static function getTableName(): string
    {
        return "cart";
    }

    public function getItems()
    {
        // тут пока пусто, так как нет юзера ещё, а у меня идёт к нему привязка
        return 'test';
    }

    public function addItem($id)
    {
        // аналогично
        return true;
    }
}