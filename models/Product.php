<?php
namespace app\models;

use app\services\Db;

class Product extends Record
{
    public $id;
    public $name;
    public $description;
    public $price;
	public $category_id;
	public $popularity;

    public function __construct($id = null, $name = null, $description = null, $price = null, $category_id = null, $popularity = null)
    {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->category_id = $category_id;
		$this->popularity = $popularity;
	}
}