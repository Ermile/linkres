<?php
namespace database\linkres;
class urls 
{
	public $id          = array('null' =>'NO',  'show' =>'NO',  'label'=>'id',            'type' => 'int@10',                                   );
	public $url_long    = array('null' =>'NO',  'show' =>'YES', 'label'=>'long',          'type' => 'varchar@999',                              );
	public $url_longmd5 = array('null' =>'NO',  'show' =>'YES', 'label'=>'longmd5',       'type' => 'char@32',                                  );
	public $url_short   = array('null' =>'NO',  'show' =>'YES', 'label'=>'short',         'type' => 'varchar@10',                               );
	public $url_clicks  = array('null' =>'NO',  'show' =>'YES', 'label'=>'clicks',        'type' => 'int@10',                                   );
	public $url_created = array('null' =>'NO',  'show' =>'YES', 'label'=>'created',       'type' => 'datetime@!CURRENT_TIMESTAMP',              );
	public $url_status  = array('null' =>'NO',  'show' =>'YES', 'label'=>'status',        'type' => 'enum@enable,disable,expire,hidden!enable', );
	public $user_id     = array('null' =>'YES', 'show' =>'NO',  'label'=>'user',          'type' => 'int@10',                                   'foreign'=>'users@id!user_nickname');


	//------------------------------------------------------------------ id
	public function id() {$this->validate()->id();}
	public function url_long() 
	{
		$this->form("text")->name("long")->maxlength(999)->required()->type('textarea');
	}
	public function url_longmd5() 
	{
		$this->form("text")->name("longmd5")->maxlength(32)->required()->type('text');
	}
	public function url_short() 
	{
		$this->form("text")->name("short")->maxlength(10)->required()->type('text');
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

	//------------------------------------------------------------------ user_id
	public function user_id() {$this->validate()->id();}
}
?>