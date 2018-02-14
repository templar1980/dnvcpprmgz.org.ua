<?php
class controller_employers extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Розповість про наших партнерів та роботодавців, які забезпечують випускників першим робочим місцем';
		$keywords = 'партнери';
		$title = 'ДЦПТО | Наші партнери та роботодавці';

		$js[] = '/js/employers.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		// require_once '/app/models/model_employers.php';
		// $this->model = new Model_Employers();
		// $data = $this->model->getListEmployers();
		$this->view->generate('all_view.php', 'employers_view.php', $data);
	}

	function action_read() 
	{
		if (empty($_POST)) {
			Route::ErrorPage404();
			return false;
		};
		// require_once '/app/models/model_employers.php';
		$this->model = new Model_Employers();
		$result = $this->model->getEmployersById($_POST['id']);
		if (empty($result)) {
			Route::ErrorPage404();
			return false;
		};
		print_r($result);
	}

	function action_strsearch() 
	{
		// if (empty($_POST)) {
		// 		Route::ErrorPage404();
		// 		return false;
		// };
		// require_once '/app/models/model_employers.php';
		$this->model = new Model_Employers();
		$result = $this->model->getStrSearch($_POST['str']);
		if (empty($result)) {
			print_r('false');
		} else {
			$html = '<ul>';
			foreach ($result as $row ) {
				$html = $html.'<li data-id="'.$row['id'].'">'.strip_tags($row['name']).'</li>';
			};
			$html = $html.'</ul>';
			print_r(json_encode($html));
		}
	}

	function action_search() 
	{
		// if (empty($_POST)) {
		// 		Route::ErrorPage404();
		// 		return false;
		// };
		require_once '/app/models/model_employers.php';
		$this->model = new Model_Employers();
		$result = $this->model->getResultSearch($_POST['name']);
		print_r($result);
	}

	function action_insert() {
		if (empty($_POST)) {
				Route::ErrorPage404();
				return false;
		};

		$this->model = new Model_Employers();
		$data = $this->model->getListEmployers();
		
		$mobile = boolval( $_POST['mobile'] );

		include 'app/views/templates/employers.php';

	}
}
?>