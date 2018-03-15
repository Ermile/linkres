<?php
namespace content\home;
use \lib\saloos;

class controller extends \mvc\controller
{
	function _route()
	{
		$module = \lib\url::module();
		$this->get('go')->ALL("/^([a-zA-Z0-9]+)$/");

		if(substr($module, -1) == '-' || $module === null)
			$this->get()->ALL();

		$this->post('url')->ALL("");
	}
}
?>