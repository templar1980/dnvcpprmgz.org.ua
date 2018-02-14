<?php
	class controller_orgeducwork extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Організація виховної роботи';
		$keywords = 'Організація виховної роботи ДЦПТО';
		$title = 'ДЦПТО | Організація виховної роботи';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'orgeducwork_view.php', $data);
	}
}
?>