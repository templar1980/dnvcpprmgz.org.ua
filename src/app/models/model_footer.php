<?php
	/**
	* 
	*/
	class Model_Footer extends Model
	{
		public function getQuestion() 
		{
			$qt = intval($this->db->getOne('SELECT COUNT(*) FROM question_sendmail'));
			$id = rand(1,$qt);
			$result = $this->db->getRow('SELECT question_sendmail.id, question_sendmail.question FROM question_sendmail WHERE id=?i', $id);
			return $result;
		}

		public function getAnswer($id, $answer) 
		{
			$result = $this->db->getOne('SELECT question_sendmail.answer FROM question_sendmail WHERE question_sendmail.id=?i', $id);
			return $result;
		}
	}
	?>