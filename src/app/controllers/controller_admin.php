
<?php
class controller_admin extends Controller
{
	function action_index()
	{	
		$description = 'ДЦПТО | ВСІ НОВИНИ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ВСІ НОВИНИ';
		
		
		if ($_SERVER['REMOTE_ADDR'] !== '37.57.148.160') 
		// if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') 
		{
			Route::ErrorPage404();
			return false;
		};

		// $this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generateAdmin('admin_view.php',$data);
	}

	function action_addNews()
	{	

		if ($_SERVER['REMOTE_ADDR'] !== '37.57.148.160') 
		// if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') 
		{
			Route::ErrorPage404();
			return false;
		};

		$newsData = json_decode( $_POST['data']);
		$newsData = $newsData[0];
		
		$this->model = new Model_News();
		$idNews = $this->model->addNewsToBase($newsData->header, $newsData->text);

		echo '<em>Создана новость с id:'.$idNews.'</em><br>';
		
		$arrFiles = $newsData->files;

		$this->downloadFiles($idNews, $arrFiles);

	}

	private function downloadFiles($idNews, $arrFiles) {
		
		if (count($_FILES)>0) {
			if (!file_exists('./img/news/'.date('d.m.y'))) {
				mkdir('./img/news/'.date('d.m.y'));

			};

			$dir = './img/news/'.date('d.m.y').'/news-id'.$idNews;

			if (!file_exists($dir)) {
				mkdir($dir);
				echo '<strong>На сервере создана папка:  '. substr($dir, 1) .'</strong><br>';
			};
		};

		for ($i=0; $i < count($_FILES) ; $i++) { 
			if(is_uploaded_file($_FILES[$i]['tmp_name']))
			{
				
				echo '<br><strong>Файл '.$_FILES[$i]['name'].':</strong><br>';
		     // Если файл загружен успешно, перемещаем его
		     // из временной директории в конечную
				$description = $arrFiles[$i]->description;
				$isMain =  $arrFiles[$i]->isMain;

				$resUpload = move_uploaded_file($_FILES[$i]['tmp_name'], $dir.'/'.$_FILES[$i]['name']);

				if ($resUpload) {
					echo "успешно загружен на сервер <br>";
				} else {
					echo "<i>ошибка зарузки файла</i> <br>";
				}

				
				$idImage = $this->model->addFilesToBase($dir.'/'.$_FILES[$i]['name'], $description);

				if ($idImage) {
					echo "успешно внесен в базу <br>";
				} else {
					echo "<i>ошибка при внесении в базу</i> <br>";
				}
				
				$resAddImg = $this->model->addImagesToGallery($idNews, $idImage, $isMain);

				if ($resAddImg) {
					echo "успешно внесен в галерею новости <br>";
				} else {
					echo "<i>ошибка при внесении в галерею новости</i> <br>";
				}

			} ;	
		}

		
	}


}
?>