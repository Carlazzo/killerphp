<?php
namespace com\killerphp\models;
class User extends ModelAbstract
{
	protected $address;
	protected $firstName;
	protected $lastName;
	protected $email;
	
	public static function usersExist()
	{
		$users = User::getAll();

		return (count($users) == 0) ? false : true;
	}
	public static function getAll()
	{
		if (!isset($_SESSION['users']))
			return array();
		
		return $_SESSION['users'];
	}

	public static function search($query)
	{
		$users = self::getAll();		
		$resultSet = array();
		foreach($users as $user)
		{
			if (stristr($user->firstName,$query))
				$resultSet[] = $user;
		}
		return $resultSet;
	}

	public function renderWith($callback)
	{
		$params = array("address"	=> $this->address,
						"firstName"	=> $this->firstName,
						"lastName" 	=> $this->lastName);
		
		return $callback($params);
	}

	public function __construct()
	{
		if (!isset($_SESSION['users']))
			$_SESSION['users'] = array();
	}
	public function saveParameters($params)
	{
		$keysSet = array();
		foreach($params as $key=>$val)
		{
			if(property_exists($this, $key))
			{
				$this->$key = $val;
				$keysSet[$key] = $val;
			}
		}
		$users = $_SESSION['users'];
		$users[] = $this;
		$_SESSION['users'] = $users;
		
		return $keysSet;
	}

	public function __toString()
	{
		return "$this->firstName $this->lastName lives at $this->address";
	}

}