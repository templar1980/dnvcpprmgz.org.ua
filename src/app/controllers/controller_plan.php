<?php
	class controller_plan extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО ПЛАН РОБОТИ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ПЛАН РОБОТИ';
		$js[] = '../js/object.js';
		$css[] = '../css/home.css';
		$css[] = '../css/static_page.css';
		$js[] = '../js/clock.js';
		$js[] = '../js/sidebar-controls.js';
		// $js[] = '../js/mainslider.js';
		// $js[] = '../js/home.js';
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		// $this->model = new Model_Main();
		// $data["specialty"] = $this->model->getSpecialty();
		// $data["lastNews"] = $this->model->getLastNews(2);
		$this->view->generate('all_view.php', 'plan_view.php', $data);
	}
}
?>