<?php
namespace com\killerphp\models;
use com\killerphp\lib as lib;
abstract class ModelAbstract implements lib\Subject
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
	protected $observers = array();
	public function addObserver(lib\Observer $o)
	{
		$id = spl_object_hash($o);
		$this->observers[$id] = $o;
	}
	public function removeObserver(lib\Observer $o)
	{
		$id = spl_object_hash($o);
		unset($this->observers[$id]);
		$this->observers = array_values($this->observers[$id]);
	}
	protected function notifyObservers()
	{
		foreach($this->observers as $o)
		{
			$o->update($this);
		}
	}
}