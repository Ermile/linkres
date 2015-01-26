<?php
namespace mvc;

class view extends \lib\view
{
	function _construct()
	{
		// define default value for global
		// $this->include->css_main       = false;
		$this->include->js             = false;


		$this->data->site['title']   = T_("Linkres");
		$this->data->site['desc']    = T_("link shorter is a part of ermile project");
		$this->data->site['slogan']  = T_("we short all:)");

		$this->data->page['desc']    = T_("link res is a link shorter service in ermile project");

		// add language list for use in display
		$this->global->langlist		= array(
												'fa_IR' => 'فارسی',
												'en_US' => 'English',
												'de_DE' => 'Deutsch'
												);

		// if you need to set a class for body element in html add in this value
		// $this->data->bodyclass      = null;

		if (!locale_emulation()) {
			$this->include->gettext  = 'Translation use native gettext dll';
		}
		else {
			$this->include->gettext  = 'Translation use PHP gettext class';
		}

		if(method_exists($this, 'options')){
			$this->options();
		}
	}
}
?>