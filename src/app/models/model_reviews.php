<?php
	/**
	* 
	*/
	class Model_Reviews extends Model
	{

		public function saveReview($data)
		{
			$data=$data[0];
			$firstName = $this->clearData($data->firstName);
			$lastName = $this->clearData($data->lastName);
			$profession = $this->clearData($data->profession);
			$email = $data->email ? $this->clearData($data->email) : '';
			$endDate = $data->endDate ? $this->clearData($data->endDate) : '';
			$company = $data->company ? $this->clearData($data->company) : '';
			$position = $data->position ? $this->clearData($data->position) : '';
			$review = $data->review ? $this->clearData($data->review) : '';
			$proposition = $data->proposition ? $this->clearData($data->proposition) : '';
			$rating = intval($this->clearData($data->rating));

			$date = date('Y-m-d');

			$result = $this->db->query('INSERT INTO reviews
																	(create_date, first_name, last_name, email, end_date, profession, company, position, rating, reviews_txt, proposition_txt)
																	VALUES (?s, ?s, ?s, ?s, ?s, ?s, ?s, ?s, ?i, ?s, ?s)',
																  $date, $firstName, $lastName, $email, $endDate, $profession, $company, $position, $rating, $review, $proposition);
			return $result;
		}
		

		public function getReviews($startPos, $qtPerPage) 
		{
			$startPos = intval($startPos);
			$qtPerPage = intval($qtPerPage);
			$result = $this->db->getAll('SELECT * FROM reviews WHERE published = 1 ORDER BY create_date, id DESC LIMIT ?i, ?i', $startPos, $qtPerPage);
			return $result;
		}

		public function getCountReviews() 
		{
			$result = $this->db->getOne('SELECT COUNT(*) FROM reviews WHERE published = 1 ');
			return $result;
		}

		private function clearData($str) {
			$str = strip_tags($str);
			$str = htmlentities($str);
			$str = htmlspecialchars($str);
			$str = trim($str);
			return $str;
		}
	}
	?>