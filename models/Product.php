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
        parent::__construct(Db::getInstance());
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
    }


    public static function getTableName(): string
    {
        return "products";
    }

	/**
	 * Get the value of id
	 *
	 * @return  mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of name
	 *
	 * @return  mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @param   mixed  $name  
	 *
	 * @return  self
	 */
	public function setName($name)
	{
        $this->catch('name');
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of description
	 *
	 * @return  mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @param   mixed  $description  
	 *
	 * @return  self
	 */
	public function setDescription($description)
	{
        $this->catch('description');
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of price
	 *
	 * @return  mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @param   mixed  $price  
	 *
	 * @return  self
	 */
	public function setPrice($price)
	{
        $this->catch('price');
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of category_id
	 *
	 * @return  mixed
	 */
	public function getCategory_id()
	{
		return $this->category_id;
	}

	/**
	 * Set the value of category_id
	 *
	 * @param   mixed  $category_id  
	 *
	 * @return  self
	 */
	public function setCategory_id($category_id)
	{
        $this->catch('category_id');
		$this->category_id = $category_id;

		return $this;
	}
}