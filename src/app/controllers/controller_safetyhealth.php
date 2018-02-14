<?php
	class controller_safetyhealth extends Controller
{

	function action_index($param=null)
	{	
		Route::ErrorPage404();
	}

	function action_internet($param=null)
	{	
		$description = 'ДЦПТО | Служба охорони праці інформує';
		$keywords = 'ДЦПТО, дніпровський центр професійно-технчної освіти';
		$title = 'ДЦПТО | Обережно – інтернет!';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'safety/internet_view.html', $data);
	}

	function action_mushroom($param=null)
	{	
		$description = 'ДЦПТО | Служба охорони праці інформує';
		$keywords = 'ДЦПТО, дніпровський центр професійно-технчної освіти';
		$title = 'ДЦПТО | Увага, гриби!';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'safety/mushroom_view.html', $data);
	}

	function action_smoke($param=null)
	{	
		$description = 'ДЦПТО | Служба охорони праці інформує';
		$keywords = 'ДЦПТО, дніпровський центр професійно-технчної освіти';
		$title = 'ДЦПТО | Тютюн – повільна отрута!';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'safety/smoke_view.html', $data);
	}
}
?>