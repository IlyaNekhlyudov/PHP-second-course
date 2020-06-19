<?php
namespace app\models;


class Product extends Model
{
    protected $id;
    protected $name;
    protected $image;
    protected $description;
    protected $popularity;

    public function getTableName(): string
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
	 * Get the value of image
	 *
	 * @return  mixed
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Set the value of image
	 *
	 * @param   mixed  $image  
	 *
	 * @return  self
	 */
	public function setImage($image)
	{
		$this->image = $image;

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
	 * Get the value of popularity
	 *
	 * @return  mixed
	 */
	public function getPopularity()
	{
		return $this->popularity;
	}

	/**
	 * Set the value of popularity
	 *
	 * @param   mixed  $popularity  
	 *
	 * @return  self
	 */
	public function setPopularity($popularity)
	{
		$this->popularity = $popularity;

		return $this;
	}
}