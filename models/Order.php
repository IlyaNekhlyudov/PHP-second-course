<?php
namespace app\order;

class Order extends Model
{
    protected $id;
    protected $date;
    protected $userID;
    protected $name;
    protected $email;
    protected $phone;
    protected $products;
    protected $status;

    public function getTableName(): string
    {
        return "orders";
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

	/**
	 * Get the value of userID
	 *
	 * @return  mixed
	 */
	public function getUserID()
	{
		return $this->userID;
	}

	/**
	 * Set the value of userID
	 *
	 * @param   mixed  $userID  
	 *
	 * @return  self
	 */
	public function setUserID($userID)
	{
		$this->userID = $userID;

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
	 * Get the value of email
	 *
	 * @return  mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @param   mixed  $email  
	 *
	 * @return  self
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of phone
	 *
	 * @return  mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set the value of phone
	 *
	 * @param   mixed  $phone  
	 *
	 * @return  self
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Get the value of products
	 *
	 * @return  mixed
	 */
	public function getProducts()
	{
		return $this->products;
	}

	/**
	 * Set the value of products
	 *
	 * @param   mixed  $products  
	 *
	 * @return  self
	 */
	public function setProducts($products)
	{
		$this->products = $products;

		return $this;
	}

	/**
	 * Get the value of status
	 *
	 * @return  mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @param   mixed  $status  
	 *
	 * @return  self
	 */
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}
}