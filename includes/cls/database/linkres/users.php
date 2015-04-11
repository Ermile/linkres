<?php
namespace database\linkres;
class users 
{
	public $id            = array('null' =>'NO',  'show' =>'NO',  'label'=>'id',            'type' => 'int@10',     );
	public $user_nickname = array('null' =>'YES', 'show' =>'YES', 'label'=>'nickname',      'type' => 'varchar@50', );


	//------------------------------------------------------------------ id
	public function id() {$this->validate()->id();}
	public function user_nickname() 
	{
		$this->form("text")->name("nickname")->maxlength(50)->type('text');
	}
}
?>