
<?php
	class controller_news extends Controller
{
	function action_index()
	{	
		$description = 'Останні новини з життя нашого центру';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Новини';

		$css[] = '/css/content-news.css';
		$js[] = '/js/news.js';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		// $this->model = new Model_News();
		// $data = $this->model->getListNews();
		$this->view->generate('all_view.php',null,$data);
	}

		function action_getImgGallery($param)
	{
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		require_once 'app/models/classes/class.news.php';
		$this->model = new Model_News();
		$result = $this->model->getNewsListImg($_POST['id']);
		echo json_encode($result);
	} 


	function action_read($param) 
	{
		require_once 'app/models/classes/class.news.php';
		
		if (empty($param)) {
				Route::ErrorPage404();
		} else {
			
			$this->model = new Model_News();
			$data['article'] = $this->model->getNewsById($param["id"]);
			if (empty($data['article'])) {
				Route::ErrorPage404();
			};

			
			$data['addCount'] = $this->model->incCounterNews($param["id"]);

			$data['popularNews'] = $this->model->getPopularNews();

			$description = 'ДЦПТО | НОВИНИ';
			$keywords = 'KEYWORDS';
			$title = 'ДЦПТО | НОВИНИ - '. $data['article']->header;
			
			$css[] = '/css/content-news.css';
			$js[] = '/js/news.js';

			$absUrlImg = 'http://'.parse_url($_SERVER['HTTP_REFERER'])['host'].'/'.$data['article']->main_image[0]['url'];
			$absUrlArticle = 'http://'.parse_url($_SERVER['HTTP_REFERER'])['host'].'/news/read?id='.$param["id"];
			$data['facebookURL'] = $absUrlArticle;
			$articleTitle = $data['article']->header;
			$articleDescription = News::shortText($data['article']->content, 150);
			$articleDescription = strip_tags($articleDescription);
			
			$meta[] = '<meta property="og:url"  content="'.$absUrlArticle.'" />';
			$meta[] = '<meta property="og:type"  content="article" />';
			$meta[] = '<meta property="og:title"   content="'.'Новини ДЦПТО | '.$articleTitle.'" />';
			$meta[] = '<meta property="og:description"  content="'.$articleDescription.'" />';
			$meta[] = '<meta property="og:image" content="'.$absUrlImg.'"/>';


			$this->view->generateHead($description, $keywords, $title, $css, $js, $meta);
			$this->view->generate('all_view.php', 'news_view.php', $data);
		}
	}

	function action_list() 
	{
		$this->model = new Model_News();
		require_once 'app/models/classes/class.news.php';
		
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};

		$qtNews = $this->model->getQuantityNews();
		$qtPerPage = $_POST['quantity'] == 0 ? 1 : $_POST['quantity'];
		$qtPages = ceil($qtNews/$qtPerPage);
		$active = $_POST['active'] == 0 ? 1 : $_POST['active'];

		$result = $this->model->getListNews(($_POST['active']-1)*$qtPerPage, $qtPerPage);

		require 'app/views/templates/list_news.php';
	}

	function action_addLike()
	{
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		$this->model = new Model_News();
		$this->model->addLike($_POST['id']);
	} 


	function action_addDislike()
	{
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		$this->model = new Model_News();
		$this->model->addDislike($_POST['id']);
	} 
}
?>