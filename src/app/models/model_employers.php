<?php
	/**
	* 
	*/
	class Model_Employers extends Model
	{
		public function getListEmployers() 
		{
			$result = $this->db->getAll('SELECT id, name, form, fullname, main_img_url  FROM employers WHERE active = 1');
			return $result;
		}

		public function getEmployersById($id) 
		{
			$result = $this->db->getOne('SELECT html FROM employers WHERE id=?i', intval($id));
			return $result;
		} 

		public function getStrSearch($str) 
		{	
			$string = '%'.$str.'%';
			$result = $this->db->getAll('SELECT name, id FROM employers WHERE name LIKE ?s AND active=1', $string);
			return $result;
		} 
		
	}
	?>