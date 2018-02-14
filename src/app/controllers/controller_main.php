<?php
	class controller_main extends Controller
{
	function action_index($param=null)
	{	
		
		require_once 'app/models/classes/class.specialty.php';
		require_once 'app/models/classes/class.news.php';
		require_once 'app/models/model_news.php';

		$description = 'Державний професійно-технічний навчальний заклад «Дніпровський центр професійно-технічної освіти» (ДЦПТО) – є державним професійно-технічним навчальним закладом, третього атестаційного рівня. Дніпропетровський центр професійно-технічної освіти здійснює підготовку робітників високого рівня кваліфікації.';
		$keywords = 'Дніпровський центр, професійно, технічна, навчання, освіта, ДЦПТО, ПТУ, Дніпро, Днепр';
		$title = 'ГОЛОВНА | Дніпровський центр професійно-технічної освіти (ДЦПТО)';
		

		$css[] = '/js/plugins/materialize/css/materialize.css';
		$css[] = '/css/home_anim.css';
		$css[] = '/css/slider.css';
		$css[] = '/css/main-page.css';


		$js[] = '/js/plugins/materialize/js/materialize.js';
		$js[] = '/js/mainslider.js';
		$js[] = '/js/home.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [] ,false);
		

		
		$this->model = new Model_Main();
		// $data["specialty"] = $this->model->getSpecialty();
		$this->model = new Model_News();
		$data["lastNews"] = $this->model->getLastNews(2);
		$this->view->generate('main_view.php', null, $data);
		$_SESSION['loaded'] = 'loaded';

	}

	function action_mainslider() {
		if (empty($_GET)) {
				Route::ErrorPage404();
				return false;
		};
	 require_once 'app/models/classes/class.specialty.php';
	 require_once 'app/models/classes/class.news.php';
	 $this->model = new Model_Main();
	 $data["specialty"] = $this->model->getSpecialty();
	 include 'app/views/templates/mainslider.php';
	}

	function action_gsinformer() {
		if (empty($_GET)) {
				Route::ErrorPage404();
				return false;
		};
		include 'app/views/templates/gsinformer.php';
	}

	function action_youtube() {
		if (empty($_GET)) {
				Route::ErrorPage404();
				return false;
		};
		include 'app/views/templates/youtube.php';
	}
}
?>