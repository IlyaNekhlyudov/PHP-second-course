<?php
namespace models;


class Product extends ProductModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $type;
    protected $quantity;

    // public function getTableName() {
    //     return 'product';
    // }

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
	 * Set the value of id
	 *
	 * @param   mixed  $id  
	 *
	 * @return  self
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
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
        if ($this->type == 'digital') {
            $this->price = $price / 2;
            return $this;
        }

		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of type
	 *
	 * @return  mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set the value of type
	 *
	 * @param   mixed  $type  
	 *
	 * @return  self
	 */
	public function setType($type)
	{
        if ($type == 'digital' || $type == 'piece' || $type == 'weight') {
            $this->type = $type;
            return $this;
        }

        return false;
	}

	/**
	 * Get the value of quantity
	 *
	 * @return  mixed
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Set the value of quantity
	 *
	 * @param   mixed  $quantity  
	 *
	 * @return  self
	 */
	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;

		return $this;
	}
}