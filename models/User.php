<?php
namespace app\models;

class User extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $admin;
    protected $name;


    public function getTableName(): string
    {
        return "users";
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
	 * Get the value of login
	 *
	 * @return  mixed
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Set the value of login
	 *
	 * @param   mixed  $login  
	 *
	 * @return  self
	 */
	public function setLogin($login)
	{
		$this->login = $login;

		return $this;
	}

	/**
	 * Get the value of password
	 *
	 * @return  mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @param   mixed  $password  
	 *
	 * @return  self
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of admin
	 *
	 * @return  mixed
	 */
	public function getAdmin()
	{
		return $this->admin;
	}

	/**
	 * Set the value of admin
	 *
	 * @param   mixed  $admin  
	 *
	 * @return  self
	 */
	public function setAdmin($admin)
	{
		$this->admin = $admin;

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
}