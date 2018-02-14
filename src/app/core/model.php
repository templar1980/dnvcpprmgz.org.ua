<?php
	class Model
{
	public $db;
	public $opt;

	public function __construct() 
	{
		$this->opt = array('user'=>DBUSER, 'pass'=>DBPASSWORD, 'db'=>DBNAME, 'charset'=>'utf8', 'host'=>DBLOCATION);
		$this->db = new SafeMysql($this->opt);
		$this->db->query("set character_set_results='utf8'");
	}
	public function getData()
	{
		
	}
}
?>