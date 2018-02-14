<?php
	class controller_search extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Пошук';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Пошук';

		$js[] = '/js/search.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		// $this->model = new Model_Main();
		// $data["specialty"] = $this->model->getSpecialty();
		// $data["lastNews"] = $this->model->getLastNews(2);
		$this->view->generate('all_view.php', 'search_view.php', $data);
	}
	function action_result($param) {

			if (!count($_POST)) 
			{
				Route::ErrorPage404();
				return false;
			};

			// require_once 'app/models/classes/class.news.php';
			$this->model = new Model_News();
			$news = $this->model->searchNewsByString(trim($_POST['searchString']));
			$pages = $this->model->searchInRequestTable(trim($_POST['searchString']));
			$admin = $this->model->searchInAdministration(trim($_POST['searchString']));

			if ($_POST['allPages'] == 1) { 
				$qtResults = count($pages) + count($news) + count($admin);
				$htmlNoRes = false;
			};

			if (empty($news) AND empty($pages) AND empty($admin)) {
				$this->model->addNoRequestResult(trim($_POST['searchString']));
				$qtResults = 0;
				$htmlNoRes = true;
			} else {
				$this->model->addRequestResult(trim($_POST['searchString']));
			};

			if ($_POST['allPages'] == 2) { 
					$news = $this->model->searchNewsByString(trim($_POST['searchString']));
					$pages = [];
					$admin = [];
					$qtResults = count($news);
					$htmlNoRes = empty($news)? true : false;
			};

			 if ($_POST['allPages'] == 3) { 
					$news = [];
					$pages = [];
					$admin = $this->model->searchInAdministration(trim($_POST['searchString']));
					$qtResults = count($admin);
					$htmlNoRes = empty($admin)? true : false;
			};
					
	
			echo "<div class='result-info'>Знайдено результатів <span>{$qtResults}</span> (<span id='time-request'>0.000</span> сек)</div>";
			if ($htmlNoRes) {
				echo "<div class='no-result'>Результатів не знайдено...</div>";
			};

			if (!empty($pages)) {
					require 'app/views/templates/result_pages.php';
			};
		
			if (!empty($news)) {
					require 'app/views/templates/result_news.php';
			};
			
			if (!empty($admin)) {
					require 'app/views/templates/result_admin.php';
			};


			
	}
	
}
?>