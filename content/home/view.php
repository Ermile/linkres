<?php
namespace content\home;
use \lib\utility;

class view extends \mvc\view
{
	public function config()
	{
		$module = $this->module();
		$myform = $this->createform('.myform');

		if(substr($module, -1) == '-')
		{
			$this->data->datarow = $this->model()->get_details();
			$timeago = utility::humanTiming($this->data->datarow['url_created']);

			$this->data->datarow['url_timeago'] = $timeago? $timeago: T_('NOW!');
		}
		$this->data->page['title']   = T_('Details');
	}
}
?>