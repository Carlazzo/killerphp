<?php
namespace com\killerphp\controllers;
use \com\killerphp as kp;
class IndexController extends ControllerAbstract
{
	public function defaultAction()
	{
		$user = new kp\models\User();
		
		if (count($_REQUEST) > 2)
		{
			$keysSet = $user->saveParameters($_REQUEST);
			$listRenderFunction = $this->getDefinitionListFunc();
			$this->keysSet = $listRenderFunction($keysSet);		
		}
		else
		{
			$this->keysSet = "";
		}
		
	}
	public function learnphpAction()
	{

	}
	public function welcomeAction()
	{
		$this->usersExist = kp\models\User::usersExist();		
		if ($this->usersExist)	
		{
			$this->usercount = count(kp\models\User::getAll()) . " users exist!";
		}
		else
		{
			$this->usercount = "users don't exist!";		
		}
		
	
	}
	private function getDefinitionListFunc()
	{
		return function($results)
		{
			$output = "<dl>";
			foreach ($results as $key=>$result)
			{
				$output .= "<dt>$key</dt>";
				$output .= "<dd>$result</dd>";
			}
			return $output .= "</dl>";
		};
	}
}
