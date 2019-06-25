<?php
namespace com\killerphp\models;
abstract class ModelAbstract
{
	public function __call($name, $args)
	{
		$methodPrefix = substr($name, 0,3);
		$methodProperty = strtolower($name[3]).substr($name,4);
		
		switch ($methodPrefix)
		{
			case "set": 
				if (count($args) == 1)
					$this->__set($methodProperty,$args[0]);
				else
					throw new \Exception("magic method only supports one argument");
				break;
			case "get":
				return $this->__get($methodProperty);
				break;
			default:
				throw new Exception("magic methods only supported for get and set");
		}
	}
	public function __set($name,$value)
	{		
		if (property_exists($this, $name))
			$this->$name = $value;
		else
			throw new \Exception("$name doesn't exist in this class");
	}
	public function __get($name)
	{
		if (property_exists($this, $name))
			return $this->$name;
		else
			throw new \Exception("$name doesn't exist in this class");	
	}


}