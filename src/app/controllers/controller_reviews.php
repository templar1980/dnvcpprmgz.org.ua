<?php
	class controller_reviews extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Відгуки та пропозиції';
		$keywords = 'відгуки, отзывы, пропозиции, пропозиції';
		$title = 'ДЦПТО | Відгуки та пропозиції';
		
		$css[] = '/css/reviews.css';
		
		$js[] = '/js/reviews.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php', 'reviews_view.php', $data);
	}

	function action_save($param)
	{	
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		// $this->redirect404('dzpto');
		$data = json_decode($_POST['data']);
		$this->model = new Model_Reviews();
		$result = $this->model->saveReview($data);
		echo $result;
	}

	function action_read($param)
	{	
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		// $this->redirect404('dzpto');
		$this->model = new Model_Reviews();
		$result[] = $this->model->getReviews($_POST['startPos'], $_POST['qtPerPage']);
		$result[] = $this->model->getCountReviews();
		echo json_encode($result);
	}

	private function redirect404($host) {
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
	}
}
?>