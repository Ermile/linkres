<?php
namespace database\linkres;
class urls 
{
	public $id          = array('null' =>'NO',  'show' =>'NO',  'label'=>'id',            'type' => 'int@10',                                   );
	public $url_long    = array('null' =>'NO',  'show' =>'YES', 'label'=>'long',          'type' => 'varchar@999',                              );
	public $url_clicks  = array('null' =>'NO',  'show' =>'YES', 'label'=>'clicks',        'type' => 'int@10',                                   );
	public $url_created = array('null' =>'NO',  'show' =>'YES', 'label'=>'created',       'type' => 'datetime@!CURRENT_TIMESTAMP',              );
	public $url_status  = array('null' =>'NO',  'show' =>'YES', 'label'=>'status',        'type' => 'enum@enable,disable,expire,hidden!enable', );
	public $url_special = array('null' =>'YES', 'show' =>'YES', 'label'=>'special',       'type' => 'bit@1',                                    );


	//------------------------------------------------------------------ id
	public function id() {$this->validate()->id();}
	public function url_long() 
	{
		$this->form("text")->name("long")->maxlength(999)->required()->type('textarea');
	}
	public function url_clicks() 
	{
		$this->form("text")->name("clicks")->min(0)->max(9999999999)->required()->type('number');
	}
	public function url_created() 
	{
		$this->form("text")->name("created")->required();
	}

	//------------------------------------------------------------------ select button
	public function url_status() 
	{
		$this->form("select")->name("status")->type("select")->required()->validate();
		$this->setChild();
	}
	public function url_special() 
	{
		$this->form("text")->name("special")->max(9)->type('number');
	}
}
?>