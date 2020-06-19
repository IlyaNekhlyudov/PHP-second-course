<?php
namespace app\review;

class Review extends Model 
{
    protected $id;
    protected $name;
    protected $text;
    protected $date;
    protected $productID;

    public function getTableName(): string
    {
        return "reviews";
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
	 * Get the value of text
	 *
	 * @return  mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * Set the value of text
	 *
	 * @param   mixed  $text  
	 *
	 * @return  self
	 */
	public function setText($text)
	{
		$this->text = $text;

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
}