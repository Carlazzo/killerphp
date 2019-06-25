<?php
namespace com\killerphp\controllers;
use \com\killerphp as kp;
class IndexController extends ControllerAbstract
{
	public function defaultAction()
	{
		if (isset($_REQUEST['firstName']) && 
			isset($_REQUEST['lastName']))
		{
			$_SESSION['currentUser'] = new kp\models\User();
			$_SESSION['currentUser']->saveParameters($_REQUEST);
		}
	
	}
	public function learnphpAction()
	{

	}
	public function welcomeAction()
	{
		$user = $_SESSION['currentUser'];
		$this->userExists = isset($_SESSION['currentUser']);
		
		if ($this->userExists)	
			$this->user = $user->renderWith($this->getDefinitionListFunc());
	
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
