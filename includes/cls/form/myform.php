<?php
namespace cls\form;

class myform extends \lib\form
{
	function __construct()
	{
		$this->url = $this->make('text')->name('url')->label('')
						->pl('Paste your long URL here')
						->autocomplete('off')
						// ->desc('All data are public and can be accessed by anyone.')
						->required()->tabindex(1)->autofocus();
		

		$this->submit	= $this->make('submit')->value(T_('Shorten it'))->title(T_('Click to shorten it'))
						->tabindex(2)
						->class('button primary row-clear row');
	}
}
?>