<?php
	/**
	* 
	*/
	class Model_Book extends Model
	{
		public function getListSubject()
		{
			$result = $this->db->getCol('SELECT DISTINCT subject FROM books ORDER BY subject');
			// setlocale(LC_ALL, "Ukrainian_Ukraine.20866");
			// rsort($result, SORT_LOCALE_STRING);
			return $result;
		}

		public function getListBooks($subject) 
		{
			$result = $this->db->getCol('SELECT DISTINCT year FROM books WHERE subject=?s', $subject);
			return $result;
		}

		public function getListClass($subject) 
		{
			$result = $this->db->getCol('SELECT DISTINCT class FROM books WHERE subject=?s', $subject);
			return $result;
		}

		public function getListBook($subject) 
		{
			$result = $this->db->getAll('SELECT * FROM books WHERE subject=?s', $subject);
			return $result;
		}

		public function addCountForCol($column, $id) 
		{	
			if ($column == 1) {
				$result = $this->db->query('UPDATE books SET count = count + 1 WHERE id=?i', $id);
			} else {
				$result = $this->db->query('UPDATE books SET likes = likes + 1 WHERE id=?i', $id);
			}
			return $result;
		}

		public function getSearchResult($string) 
		{	
			$string = '%'.$string.'%';
			$result = $this->db->getAll('SELECT * FROM books WHERE name LIKE ?s OR author LIKE ?s', $string, $string);
			return $result;
		}
	}
	?>

