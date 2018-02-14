<?php
class controller_oldnews extends Controller
{
	
	function action_index()
	{	
		$description = 'ДЦПТО | Архів новин';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | АРХІВ НОВИН';
		
		$css[] = '/css/content-news.css';
		$js[] = '/js/oldnews.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php','oldnews_view.php',$data);
	}

	function action_read($param) 
	{
		
		if (empty($param)) {
			Route::ErrorPage404();
			return false;
		};

		require_once 'app/models/model_news.php';
		require_once 'app/models/classes/class.news.php';

		$this->model = new Model_News();
		$data = $this->model->getOldNewsById($param["id"]);
		
		if (empty($data)) {
			Route::ErrorPage404();
			return false;
		};

		$description = 'ДЦПТО | АРХІВ НОВИН';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | АРХІВ НОВИН - '. $data->header;

		$js[] = '/js/news.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php', 'readoldnews_view.php', $data);
		
	}

	function action_list() 
	{

		if (empty($_POST)) {
			Route::ErrorPage404();
			return false;
		}

		require_once 'app/models/model_news.php';
		require_once 'app/models/classes/class.news.php';

		$this->model = new Model_News();
		$startDate = $_POST['year'].'-01-01';
		$endDate = $_POST['year'].'-12-31';

		$qtNews = $this->model->getQuantityOldNews($startDate, $endDate);
		$qtPerPage = $_POST['quantity'] == 0 ? 1 : $_POST['quantity'];
		$qtPages = ceil($qtNews/$qtPerPage);
		$active = $_POST['active'] == 0 ? 1 : $_POST['active'];
		$result = $this->model->getOldNewsList($startDate, $endDate, ($_POST['active']-1)*$qtPerPage, $qtPerPage, boolval($_POST['sortDown']));

		require 'app/views/templates/list_oldnews.php';
	}

	
}
?>