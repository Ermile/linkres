<?php
namespace content\home;

class view extends \mvc\view
{
	public function config()
	{
		$myform = $this->createform('.myform');
	}
}
?>