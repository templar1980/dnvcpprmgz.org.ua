<?php
class controller_collective extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Колектив ДЦПТО : адміністрація, викладачі, майстри виробничого навчання та інші працівники';
		$keywords = 'колектив, працівники, коллектив, работники, адміністрація, администрация, майстри, мастера';
		$title = 'Колектив ДЦПТО';
		
		$js[] = '/js/plugins/event_imgload.js';
		$js[] = '/js/administration.js';
		
		
		// $this->model = new Model_Main();
		// $data["specialty"] = $this->model->getSpecialty();
		// $data["lastNews"] = $this->model->getLastNews(2);
		require_once 'app/models/model_birthday.php';
		if (empty($param)) {
			Route::ErrorPage404();
		} else {
			require_once 'app/models/model_birthday.php';
			$this->model = new Model_Birthday();
			$data = $this->model->getListAdministration($param['group']);
			
			if (empty($data)) {
				Route::ErrorPage404();
			};
		};

		

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php', 'collective_view.php', $data);
	}

	function action_view($param) 
	{
		require_once 'app/models/classes/class.news.php';
		
		if (empty($param)) {
			Route::ErrorPage404();
		} else {
			require_once 'app/models/model_birthday.php';
			$this->model = new Model_Birthday();
			$data = $this->model->getAdministrationById($param['id']);
			if (empty($data)) {
				Route::ErrorPage404();
			};
			$description = 'Працівники ДЦПТО ::: '.$data['name'].' - '.str_replace('<br>', ',', $data['position_for_view']);
			$keywords = '';
			$title = $data['name'].' - '.$data['position'];

			$js[] = '/js/plugins/event_imgload.js';
			$js[] = '/js/administration.js';

			$this->view->generateHead($description, $keywords, $title, $css, $js);
			$this->view->generate('all_view.php', 'administration_view.php', $data);
		}
	}
}
?>