<?php
namespace com\killerphp\controllers;
class IndexController extends ControllerAbstract
{


	public function defaultAction()
	{
		if (isset($_REQUEST['firstName']) && 
			isset($_REQUEST['lastName']))
		{
			$_SESSION['currentUser'] = 
				new \com\killerphp\models\User($_REQUEST['firstName'],
											   $_REQUEST['lastName'],
											   $_REQUEST['address']);
				
		}
	
		$this->render();
	}
	public function learnphpAction()
	{
		$this->render();
	}
	public function welcomeAction()
	{
		$user = $_SESSION['currentUser'];
		$this->userExists = isset($_SESSION['currentUser']);
		
		if ($this->userExists)	
			$this->user = $user->renderWith($this->getDefinitionListFunc());
	
		$this->render();
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
