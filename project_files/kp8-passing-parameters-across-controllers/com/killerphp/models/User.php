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

	public function __construct($fname, $lname, $address)
	{
		$this->firstName = $fname;
		$this->lastName = $lname;
		$this->address = $address;
	}

	public function __toString()
	{
		return "$this->firstName $this->lastName lives at $this->address";
	}

}