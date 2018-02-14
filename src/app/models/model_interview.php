<?php
	/**
	* 
	*/
	class Model_Interview extends Model
	{

		public function getDataForHtml() {
			$result = $this->db->getAll('SELECT * FROM interview');
			return $result;
		}

		public function checkIP($ip) {
			$result = $this->db->getOne('SELECT * FROM interview_visitor WHERE ip=?s', $ip);
			return $result;
		}

		public function saveData($id, $ip) {
			 $this->db->query('UPDATE interview SET count = count + 1 WHERE id = ?i', $id);
			 if ($ip == '37.57.148.160') return false;
			 $this->db->query('INSERT INTO interview_visitor (ip) VALUES (?s)', $ip );
		}

	}
	?>