<?php
namespace com\killerphp\models;
class User extends ModelAbstract
{
	protected $address;
	protected $firstName;
	protected $lastName;
	protected $email;

	public function renderWith($callback)
	{
		$params = array("address"	=>$this->address,
						"firstName"	=> $this->firstName,
						"lastName" 	=> $this->lastName);
		
		return $callback($params);
	}

	public function __construct()
	{
	
	}
	public function saveParameters($params)
	{
		foreach($params as $key=>$val)
		{
			$this->$key = $val;
		}
	}

	public function __toString()
	{
		return "$this->firstName $this->lastName lives at $this->address";
	}

}