<?php
namespace com\killerphp\controllers;
class IndexController extends ControllerAbstract
{
	public function defaultAction()
	{
		var_dump($_REQUEST);
	
		$this->render();
	}
	public function learnphpAction()
	{
		$this->render();
	}
	public function welcomeAction()
	{
		$user = new \com\killerphp\models\User("Jon", "smith", "90210 Beverly Hills");
	
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
