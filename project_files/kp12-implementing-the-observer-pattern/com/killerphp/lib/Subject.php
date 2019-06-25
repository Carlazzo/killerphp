<?php
namespace com\killerphp\lib;

interface Subject
{
	public function addObserver(Observer $o);
	public function removeObserver(Observer $o);
}