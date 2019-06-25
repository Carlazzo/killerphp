<?php
namespace com\killerphp\controllers;
class TestController extends ControllerAbstract
{
	public function testingAction()
	{
		echo $this->getViewFolder();
	}
}