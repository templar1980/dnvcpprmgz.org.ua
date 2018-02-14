<?php
	/**
	* 
	*/
	class Model_Birthday extends Model
	{
		public function saveData($row) 
		{
			// $date = new DateTime();
			$arrDate = explode('/', $row[1]);
			$birthday = mktime(0,0,0,$arrDate[0],$arrDate[1],$arrDate[2]);
			$result = $this->db->query('INSERT INTO students_birthday (name,birthday,ngroup) VALUES (?s,?s,?s)', $row[0], date('Y-m-d', $birthday), strval($row[2]));
			return $result;
		}

		public function saveDataTeachers($row) 
		{
			$id = $this->db->getOne('SELECT id FROM administration WHERE name = ?s', $row[0]);
			$arrDate = explode('.', $row[2]);
			$birthday = mktime(0,0,0,$arrDate[1],$arrDate[0],$arrDate[2]);

			if (!empty($id)) {
				$result = $this->db->query('UPDATE administration SET position = ?s, birthday=?s WHERE id = ?i', $row[1], date('Y-m-d', $birthday), intval($id));
			} else {
				$result = $this->db->query('INSERT INTO administration (name,birthday,position,man) VALUES (?s,?s,?s,0)', $row[0], date('Y-m-d', $birthday), strval($row[1]));
			}
			// return $result;
		}	

		public function getListAdministration($group) 
		{
			// DATE_FORMAT(birthday,"%d-%m-%Y") AS bdate
			if ($group == 'admin') {
				$queryStr = 'SELECT id, name, man, position, photo_url, administration.group FROM administration'.
										' WHERE administration.group = ?s AND administration.published = 1';
				$result = $this->db->getAll($queryStr, $group);
			} else {
				$queryStr = 'SELECT id, name, man, position, photo_url, administration.group FROM administration'.
										' WHERE administration.group = ?s AND administration.published = 1 ORDER BY name';
				$result = $this->db->getAll($queryStr, $group);
			}
			
			return $result;
		}

		public function getAdministrationById($id)
		{
			$queryStr = 'SELECT id, name, man, position, position_for_view, photo_url, info, DATE_FORMAT(birthday,"%d-%m-%Y") AS bdate'.
									' FROM administration WHERE id=?i AND administration.published = 1';
			$result = $this->db->getRow($queryStr, intval($id));
			return $result;
		}

		public function getNowBirthday() 
		{
			$result = $this->db->getAll('SELECT * FROM students_birthday WHERE  DATE_FORMAT(students_birthday.birthday,"%d-%m") = ?s', date('d-m'));
			return $result;
		}

		public function getNowBirthdayTeachers() 
		{
			$result = $this->db->getAll('SELECT name, position, photo_url, man, DATE_FORMAT(birthday,"%Y") AS bdate FROM administration WHERE DATE_FORMAT(administration.birthday,"%d-%m") = ?s AND administration.published = 1', date('d-m'));
			return $result;
		}
	}
	?>