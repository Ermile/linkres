<?php
namespace database\linkres;
class reserves 
{
	public $id               = array('null' =>'NO',  'show' =>'NO',  'label'=>'id',            'type' => 'smallint@5',                        );
	public $reserves_cat     = array('null' =>'NO',  'show' =>'YES', 'label'=>'cat',           'type' => 'varchar@50',                        );
	public $reserves_name    = array('null' =>'NO',  'show' =>'YES', 'label'=>'name',          'type' => 'varchar@50',                        );
	public $reserves_counter = array('null' =>'NO',  'show' =>'YES', 'label'=>'counter',       'type' => 'int@10',                            );
	public $reserves_status  = array('null' =>'NO',  'show' =>'YES', 'label'=>'status',        'type' => 'enum@enable,disable,expire!enable', );
	public $date_modified    = array('null' =>'YES', 'show' =>'NO',  'label'=>'modified',      'type' => 'timestamp@',                        );


	//------------------------------------------------------------------ id
	public function id() {$this->validate()->id();}
	public function reserves_cat() 
	{
		$this->form("text")->name("cat")->maxlength(50)->required()->type('text');
	}
	public function reserves_name() 
	{
		$this->form("text")->name("name")->maxlength(50)->required()->type('text');
	}
	public function reserves_counter() 
	{
		$this->form("text")->name("counter")->min(0)->max(9999999999)->required()->type('number');
	}

	//------------------------------------------------------------------ select button
	public function reserves_status() 
	{
		$this->form("select")->name("status")->type("select")->required()->validate();
		$this->setChild();
	}
	public function date_modified() {}
}
?>