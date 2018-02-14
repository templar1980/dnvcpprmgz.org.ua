<?php
	/**
	* 
	*/
	class Model_News extends Model
	{
		public function getNewsById($id) 
		{
			$id = intval($id);
			$result = $this->db->getAll('SELECT news.*, files.url, files.type, files.description, news_files.main_image  FROM news LEFT JOIN news_files ON (news.id = news_files.id_news) LEFT JOIN files ON (news_files.id_files = files.id) WHERE news.id = ?i', $id);

			if (empty($result)) return false;

			$news = new News();
			$news->header = $result[0]['header'];
			$news->content = $result[0]['content'];
			$arrDate = explode('-', $result[0]['date']);
			$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
			$news->time = substr(explode(' ', $result[0]['date'])[1], 0, 5);
			$news->count = $result[0]['count'];
			$news->id = $result[0]['id'];

			for ($i=0; $i < count($result) ; $i++) { 
				if ($result[$i]['main_image']) {
					$news->main_image[] = array(
						'url'=>$result[$i]['url'], 
						'des'=>$result[$i]['description']);
					continue;
				};

				if ($result[$i]['type'] == 'image') {
					$news->images_gallery[] = array('url'=>$result[$i]['url'],'des'=>$result[$i]['description']);
				} else {
					$news->files[] = array('url'=>$result[$i]['url'],'des'=>$result[$i]['description']);
				};

			}
			$news = $this->getLikes($id, $news);
			return $news;
		}

		public function getNewsListImg($id) 
		{
			$id = intval($id);
			$result = $this->db->getAll('SELECT news.*, files.url, files.type, files.description, news_files.main_image  FROM news LEFT JOIN news_files ON (news.id = news_files.id_news) LEFT JOIN files ON (news_files.id_files = files.id) WHERE news.id = ?i AND news_files.main_image = 0', $id);

			if (empty($result)) return false;
			$images_gallery = array();

			for ($i=0; $i < count($result) ; $i++) { 
				if ($result[$i]['type'] == 'image') {
					$images_gallery[] = array('url'=>$result[$i]['url'],'des'=>$result[$i]['description'], 'date'=>$result[$i]['date']);
				};
			}
			return $images_gallery;
		}

		public function incCounterNews($id)
		{	
			$id = intval($id);
			$ip = $_SERVER['REMOTE_ADDR'];

			if ( $this->filterIP($ip)) {
				return false;
			};
			
			$result = $this->db->getRow("SELECT * FROM visitor WHERE idnews=?i AND ip=?s", $id, $ip); 


			if (empty($result)) {
				$date = date('Y-m-d H:i:s');
				$this->db->query("INSERT INTO visitor (idnews,ip,date) VALUES (?i,?s,'$date')", $id, $ip );
				$this->db->query("UPDATE news SET count = count + 1 WHERE id=$id");
				return true;
			};

			return false;
		}

		private function filterIP ($ip) {
			$arrIp = ['37.57.148.160', '127.0.0.1'];
			if (!in_array($ip, $arrIp)) {
				return false;
			};
			return true;
		}

		public function getListNews($startPosition, $quantity)
		{
			$startPosition = intval($startPosition);
			$quantity = intval($quantity);
			$result = $this->db->getAll('SELECT news.id, news.header, news.content, news.count, news.date, files.url FROM news LEFT JOIN news_files ON news.id=news_files.id_news AND news_files.main_image=1 LEFT JOIN files ON news_files.id_files=files.id ORDER BY date DESC LIMIT ?i, ?i', $startPosition, $quantity);
			$resultArr = [];

			foreach ($result as $row) { 
				$news = new News();
				$news->id = $row['id'];
				$news->header = $row['header'];
				$news->content = News::shortText($row['content'], 350);
				$news->count = $row['count'];
				$arrDate = explode('-', $row['date']);
				$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
				$news->time = substr(explode(' ', $row['date'])[1], 0, 5);
				$news->main_image = $row['url'];
				$news = $this->getLikes($row['id'], $news);
				$resultArr[]= $news;
			};
			return $resultArr;
		}

		public function getQuantityNews()
		{
			$result = $this->db->getOne('SELECT COUNT(*) FROM news');
			return $result;
		}

		public function getPopularNews()
		{
			$result = $this->db->getAll('SELECT news.*, files.url FROM news LEFT JOIN news_files ON (news.id = news_files.id_news) LEFT JOIN files ON (news_files.id_files = files.id) WHERE news_files.main_image = true ORDER BY news.count DESC LIMIT ?i', 10);
			$arr = array();
			foreach ($result as $row) {
				$news = new News();
				$news->header = $news::shortText($row['header'], 100);
				$news->content = $news::shortText(strip_tags($row['content']), 140);
				$arrDate = explode('-', $row['date']);
				$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
				$news->time = explode(' ', $row['date'])[1];
				$news->main_image = $row['url'];
				$news->count = $row['count'];
				$news->id = $row['id'];
				$news = $this->getLikes($row['id'], $news);
				$arr[] = $news;
			};
			return $arr;
		}

		public function getLikes($id, $news)
		{
			$id = intval($id);
			$result = $this->db->getRow('SELECT * FROM likes_for_news WHERE idnews=?i', $id);
			if ($result) {
				$news->likes = $result['likes'];
				$news->dislikes = $result['dislikes'];
			} else {
				$result = $this->db->query('INSERT INTO likes_for_news (idnews, likes, dislikes) VALUES (?i,?i,?i)', $id, 0, 0);
				$news->likes = 0;
				$news->dislikes = 0;
			}
			return $news;
		}

		public function addLike($id) 
		{
			$id = intval($id);
			$result = $this->db->getRow('SELECT * FROM visitor_likes WHERE idnews=?i AND ip=?s', $id, $_SERVER['REMOTE_ADDR']);
			if ($result) {
				$resArr['changes'] = false;
				print_r(json_encode($resArr));
				return false;
			}
			$this->db->query('UPDATE likes_for_news SET likes = likes + 1 WHERE idnews=?i', $id);
			$this->db->query('INSERT INTO visitor_likes (idnews, ip) VALUES (?i,?s)', $id, $_SERVER['REMOTE_ADDR']);
			$resArr['changes'] = true;
			print_r(json_encode($resArr));
		}

		public function addDislike($id) 
		{
			$id = intval($id);
			$result = $this->db->getRow('SELECT * FROM visitor_likes WHERE idnews=?i AND ip=?s', $id, $_SERVER['REMOTE_ADDR']);
			if ($result) {
				$resArr['changes'] = false;
				print_r(json_encode($resArr));
				return false;
			}
			$this->db->query('UPDATE likes_for_news SET dislikes = dislikes + 1 WHERE idnews=?i', $id);
			$this->db->query('INSERT INTO visitor_likes (idnews, ip) VALUES (?i,?s)', $id, $_SERVER['REMOTE_ADDR']);
			$resArr['changes'] = true;
			print_r(json_encode($resArr));
		}

		public function getLastNews($quantity) 
		{
			$result = $this->db->getAll('SELECT news.*, files.url FROM news LEFT JOIN news_files ON (news.id = news_files.id_news) LEFT JOIN files ON (news_files.id_files = files.id) WHERE news_files.main_image = true ORDER BY news.date DESC LIMIT ?i', $quantity);
			$arr = array();
			foreach ($result as $row) {
				$news = new News();
				$news->header = $news::shortText($row['header'], 100);
				$news->content = $news::shortText($row['content'], 250);
				$arrDate = explode('-', $row['date']);
				$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
				$news->time = explode(' ', $row['date'])[1];
				$news->main_image = $row['url'];
				$news->count = $row['count'];
				$news->id = $row['id'];
				$news = $this->getLikes($row['id'], $news);
				$arr[] = $news;
			};
			return $arr;
		}

		public function getQuantityOldNews($startDate, $endDate)
		{
			$result = $this->db->getOne('SELECT COUNT(*) FROM cms_module_news WHERE news_date BETWEEN ?s AND ?s', $startDate, $endDate);
			return $result;
		}

		public function getOldNewsList($startDate, $endDate, $startPosition, $quantity, $sortDown)
		{
			if ($sortDown) {
				$result = $this->db->getAll('SELECT news_title, news_id, news_data, news_date FROM cms_module_news WHERE news_date BETWEEN ?s AND ?s ORDER BY news_date LIMIT ?i, ?i', $startDate, $endDate, $startPosition, $quantity);
			} else {
				$result = $this->db->getAll('SELECT news_title, news_id, news_data, news_date FROM cms_module_news WHERE news_date BETWEEN ?s AND ?s ORDER BY news_date DESC LIMIT ?i, ?i', $startDate, $endDate, $startPosition, $quantity);
			}

			$arr = array();
			foreach ($result as $row) {
				$news = new News();
				$news->header = $row['news_title'];
				$news->content = $news::shortText(strip_tags($row['news_data']), 250);
				$arrDate = explode('-', $row['news_date']);
				$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
				$news->time = substr(explode(' ', $row['news_date'])[1], 0, -3);
				$news->id = $row['news_id'];
				$arr[] = $news;
			};
			return $arr;
		}
		
		public function getOldNewsById($id) 
		{
			$id = intval($id);
			$result = $this->db->getRow('SELECT news_id, news_title, news_date, news_data  FROM cms_module_news WHERE news_id = ?i', $id);
			if (empty($result)) return false;
			$news = new News();
			$news->header = $result['news_title'];
			$news->content = preg_replace('/<h1>.*<\/h1>/im',' ', $result['news_data']);
			$arrDate = explode('-', explode(' ',$result['news_date'])[0]);
			$news->date = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));
			$news->time = substr(explode(' ', $result['news_date'])[1], 0, 5);
			$news->id = $result['news_id'];
			return $news;
		}
		public function getQtNewNews() 
		{
			// $startWeek = date("Y-m-d",time()-((date('N')-1)*(24*60*60)));
			// $startWeek = date("Y-m-d",time()-((date('N')-1)*(24*60*60))).' 00:00:00';
			$startWeek = date("Y-m-d H:i:s",time()-(24*60*60));
			$curDate = date("Y-m-d H:i:s");
			$result = $this->db->getOne('SELECT COUNT(*) FROM news WHERE news.date>=?s AND news.date<=?s', $startWeek, $curDate);
			return $result;
		}

		public function addNewsToBase($header, $text) 
		{
			$result = $this->db->query('INSERT INTO news (header, content, date) VALUES (?s, ?s, ?s)', $header, $text, date('Y-m-d H:i:s'));
			$id = $this->db->insertId();
			return $id;
		}

		public function addFilesToBase($dir, $description) 
		{	
			$dir = substr($dir, 2);
			$description = strval($description);
			$result = $this->db->query('INSERT INTO files (url, type, date, description) VALUES (?s, \'image\', ?s, ?s)', $dir , date('Y-m-d H:i:s'), $description);
			$idImage = $this->db->insertId();
			return $idImage;
		}

		public function addImagesToGallery($idNews, $idImage, $isMain) 
		{	
			$result = $this->db->query('INSERT INTO news_files (id_news, id_files, main_image) VALUES (?i, ?i, ?i)',$idNews, $idImage, $isMain);
			return $result;
		}

		public function searchNewsByString($searchString)
		{

			$searchString = explode(',', $searchString);

			foreach($searchString as $word){
				$sql='';
				$sql .= '(content LIKE \'%'.$word.'%\' OR ';
				$sql .= 'header LIKE \'%'.$word.'%\') ';
				$arrSql[] = $sql;
			};

			$strsql = implode(" AND ", $arrSql);
			$strsql = 'SELECT news.*, files.url FROM news LEFT JOIN news_files ON (news.id = news_files.id_news) LEFT JOIN files ON (news_files.id_files = files.id) WHERE news_files.main_image = true AND ('.$strsql.') ORDER BY news.date DESC';
			$result = $this->db->getAll($strsql);

			foreach ($result as $index => $row) {
				
				// убираем стили и html-теги
				$row['content'] = preg_replace('/<style>.*<\/style>/ims', '', $row['content']);
				$row['content'] = strip_tags($row['content']);
				
				mb_internal_encoding('UTF-8');
			  // ищем пизицию первого вхождения любого из слов
				$firstPos = 0;
				foreach ($searchString as $word) {
					$firstPos = mb_stripos($row['content'], $word);
					if (!$firstPos === false) {
						break;
					};
				};

				$firstPos = $firstPos-160 <= 0 ? 0 : $firstPos-160;
				$contentLength = mb_strlen($row['content']);
				
				$row['content'] = mb_substr($row['content'], $firstPos, 400);
				
				if ($firstPos + 500 < $contentLength) {
					$row['content'] = $row['content'].'...';
				};

				if ($firstPos > 0) {
					$row['content'] = '...'.$row['content'];
				};

				foreach ($searchString as $word) {
					$row['content'] = str_replace($word, '<b>'.$word.'</b>', $row['content']);
					$row['header'] = str_replace($word, '<b>'.$word.'</b>', $row['header']);
				}



				$arrDate = explode('-', $row['date']);
				$result[$index]['date'] = date("d.m.y", mktime(0, 0, 0, $arrDate[1], $arrDate[2], $arrDate[0]));

				$result[$index]['content'] = $row['content'];
				$result[$index]['header'] = $row['header'];
			}

			return $result;
			
		}


		public function searchInRequestTable($searchString) 
		{		


			$searchString = explode(',', $searchString);

			foreach($searchString as $word){
				$sql='';
				$sql .= '(request LIKE \'%'.$word.'%\' OR ';
				$sql .= 'name LIKE \'%'.$word.'%\' OR ';
				$sql .= 'description LIKE \'%'.$word.'%\') ';
				$arrSql[] = $sql;
			};

			$strsql = implode(" OR ", $arrSql);
			$strsql = 'SELECT * FROM request_search WHERE '.$strsql;
			$result = $this->db->getAll($strsql);

			foreach ($result as $index => $row) {
				
				// убираем стили и html-теги
				$row['description'] = preg_replace('/<style>.*<\/style>/ims', '', $row['description']);
				$row['description'] = strip_tags($row['description']);
				
				mb_internal_encoding('UTF-8');
			  // ищем пизицию первого вхождения любого из слов
				$firstPos = 0;
				foreach ($searchString as $word) {
					$firstPos = mb_stripos($row['description'], $word);
					if (!$firstPos === false) {
						break;
					};
				};

				$firstPos = $firstPos-200 <= 0 ? 0 : $firstPos-200;
				$contentLength = mb_strlen($row['description']);

				$row['description'] = mb_substr($row['description'], $firstPos, 500);

				if ($firstPos + 500 < $contentLength) {
					$row['description'] = $row['description'].'...';
				};

				if ($firstPos > 0) {
					$row['description'] = '...'.$row['description'];
				};

				foreach ($searchString as $word) {
					$row['description'] = str_replace($word, '<b>'.$word.'</b>', $row['description']);
					$row['name'] = str_replace($word, '<b>'.$word.'</b>', $row['name']);
				}


				$result[$index]['description'] = $row['description'];
				$result[$index]['name'] = $row['name'];
			}

			return $result;

		}

		public function searchInAdministration($searchString) 
		{		


			$searchString = explode(',', $searchString);

			foreach($searchString as $word){
				$sql='';
				$sql .= '(position LIKE \'%'.$word.'%\' OR ';
				$sql .= 'name LIKE \'%'.$word.'%\') ';
				$arrSql[] = $sql;
			};

			$strsql = implode(" OR ", $arrSql);
			$strsql = 'SELECT administration.name, administration.position, administration.photo_url, administration.id FROM administration WHERE published = 1 AND ('.$strsql.')';

			$result = $this->db->getAll($strsql);

			foreach ($result as $index => $row) {
				
				mb_internal_encoding('UTF-8');

				foreach ($searchString as $word) {
					$row['position'] = str_replace($word, '<b>'.$word.'</b>', $row['position']);
					$row['name'] = str_replace($word, '<b>'.$word.'</b>', $row['name']);
				}

				$row['name'] = explode(' ', $row['name']);
				$row['name'][0] = '<span>'.$row['name'][0].'</span>';
				$row['name'] = implode(' ', $row['name']);

				$result[$index]['position'] = $row['position'];
				$result[$index]['name'] = $row['name'];
			}

			return $result;

		}


		public function addNoRequestResult($requestString) 
		{	
			$result = $this->db->query('INSERT INTO no_request_result (request) VALUES (?s)',$requestString);
			return $result;
		}

		public function addRequestResult($requestString) 
		{	
			$result = $this->db->query('INSERT INTO no_request_result (all_request) VALUES (?s)',$requestString);
			return $result;
		}

	}
	?>