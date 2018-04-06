<?php
namespace mvc;

class view extends \lib\mvc\view
{
	function _construct()
	{
		// define default value for global
		$this->data->site['title']   = T_("Ermile Shortener");
		$this->data->site['desc']    = T_("link shortener is a part of ermile project");
		$this->data->site['slogan']  = T_("we short all:)");
		$this->data->page['title']   = null;
		$this->data->page['desc']    = T_("22b is a link shortener service in ermile project");

		// add language list for use in display
		$this->global->langlist      = array(
												'fa_IR' => 'فارسی',
												'en_US' => 'English',
												);

		// $this->include->js           = false;
		$this->data->bodyclass       = 'unselectable';

		if(method_exists($this, 'options')){
			$this->options();
		}
		$this->data->display['account'] = "content/home/layout.html";
	}

	function pushState()
	{
		$this->data->display['account'] = "content/home/xhr-layout.html";
		$this->data->display['cp']      = "content_cp/main/xhr-layout.html";
	}
}
?>