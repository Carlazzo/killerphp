<?php
namespace com\killerphp\models;
abstract class ModelAbstract
{
	public function __call($name, $args)
	{
		$methodPrefix = substr($name, 0, 3);
		$methodProperty = strtolower($name[3]) .substr($name,4);

		switch($methodPrefix)
		{
			case "get":
				return $this->$methodProperty;
				break;
			case "set":
				if(count($args) == 1 )
					$this->$methodProperty = $args[0];
				else
					throw new \Exception("default setter supports 1 argument!");
				break;
			default:
				throw new \Exception("magic method doesn't support that prefix");		
		}
	}
}