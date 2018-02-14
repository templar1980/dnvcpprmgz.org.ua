<?php
	class controller_books extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ПІДРУЧНИКИ ТА ПОСІБНИКИ';

		$css[] = '/css/books.css';

		$js[] = '/js/books_o.js';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php', 'books_view.php', $data);
	}

	function action_listsubject()
	{	
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};
		require_once 'app/models/model_book.php';
		$this->model = new Model_Book();
		$data = $this->model->getListSubject();
		echo json_encode($data);
	}

	function action_addCount()
	{	
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};
		require_once 'app/models/model_book.php';
		$this->model = new Model_Book();
		$data = $this->model->addCountForCol($_POST['column'], $_POST['id']);
		echo json_encode($data);
	}

	function action_listbooks()
	{	
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};
		require_once 'app/models/model_book.php';
		$this->model = new Model_Book();
		$data['listyear'] = $this->model->getListBooks($_POST['subject']);
		array_unshift($data['listyear'], 'Всі роки');
		$data['listclass']=$this->model->getListClass($_POST['subject']);
		array_unshift($data['listclass'], 'Всі класи');
		$data['listbooks']=$this->model->getListBook($_POST['subject']);
		echo json_encode($data);
	}

	function action_search()
	{	
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};
		require_once 'app/models/model_book.php';
		$this->model = new Model_Book();
		$data = $this->model->getSearchResult($_POST['string']);
		echo json_encode($data);
	}

	
}
?>