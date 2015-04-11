<?php
namespace content\home;
use \lib\saloos;

class controller extends \mvc\controller
{
	function _route()
	{
		$this->get('gourl')->ALL("/^([a-zA-Z0-9]*)$/");
		$this->post('url')->ALL("");
	}
}
?>