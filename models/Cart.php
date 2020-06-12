<?php
namespace app\cart;

class Cart extends Model
{
    protected $id;
    protected $productID;
    protected $quantity;
    protected $userHash;
    protected $date;

    public function getTableName(): string
    {
        return "cart";
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
	 * Get the value of productID
	 *
	 * @return  mixed
	 */
	public function getProductID()
	{
		return $this->productID;
	}

	/**
	 * Set the value of productID
	 *
	 * @param   mixed  $productID  
	 *
	 * @return  self
	 */
	public function setProductID($productID)
	{
		$this->productID = $productID;

		return $this;
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

	/**
	 * Get the value of userHash
	 *
	 * @return  mixed
	 */
	public function getUserHash()
	{
		return $this->userHash;
	}

	/**
	 * Set the value of userHash
	 *
	 * @param   mixed  $userHash  
	 *
	 * @return  self
	 */
	public function setUserHash($userHash)
	{
		$this->userHash = $userHash;

		return $this;
	}

	/**
	 * Get the value of date
	 *
	 * @return  mixed
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Set the value of date
	 *
	 * @param   mixed  $date  
	 *
	 * @return  self
	 */
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}
}