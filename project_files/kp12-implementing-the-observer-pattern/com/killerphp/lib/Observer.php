<?php
namespace com\killerphp\lib;

interface Observer
{
	public function update(Subject $o);
}