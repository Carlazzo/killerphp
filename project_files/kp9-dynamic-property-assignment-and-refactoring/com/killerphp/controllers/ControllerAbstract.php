<?php
namespace com\killerphp\controllers;

abstract class ControllerAbstract implements IController
{
	protected $controller;
	protected $action;
	
	public function __construct($controller,$action)
	{
		$this->controller = $controller;
		$this->action = $action;
	}
	
	public function getViewFolder()
	{
		return APPLICATION_PATH . '/'. str_replace('\\','/',__NAMESPACE__) . "/../views/" . $this->controller;
	}
	public function render()
	{
		include_once ($this->getViewFolder() .'/'. $this->action .'.php');
	}
	public function dispatch()
	{
		if ($this->action == "")
			$this->action = "default";
		$method = $this->action . "Action";
		if (method_exists($this,$method))
		{			
			$this->$method();
			$this->render();			
		}		
		else
			throw new \Exception("Please implement a function called $method!");
	}
	
}
