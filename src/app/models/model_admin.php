<?php
	/**
	* 
	*/
	class Model_Test extends Model
	{
		public function getData() 
		{
			$result = $this->db->query('INSERT INTO news (header, content) VALUES (\'header\', \'content\')');
			$id = $this->db->insertId();
			print_r($id);
		}
	}
	?>