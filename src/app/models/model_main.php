<?php
	/**
	* 
	*/
	class Model_Main extends Model
	{
		public function getSpecialty()
		{
			$result = $this->db->getAll('SELECT * FROM specialty ORDER BY rating DESC');
			$arr = array();
			foreach ($result as $row) {
				$specialty = new Specialty();
				$specialty->id = $row['id'];
				$specialty->name = $row['name'];
				$specialty->description = $row['description'];
				$specialty->period = $row['period'];
				$specialty->rating = $row['rating'];
				$specialty->image = $row['imgurl'];
				$arr[] = $specialty;
			};
			shuffle($arr);
			return $arr;
		}

		// public function getQuestion() 
		// {
		// 	$qt = intval($this->db->getOne('SELECT COUNT(*) FROM question_sendmail'));
		// 	$id = rand(1,$qt);
		// 	$result = $this->db->getRow('SELECT * FROM question_sendmail WHERE id=?i', $id);
		// 	return $result;
		// }
	}
	?>

