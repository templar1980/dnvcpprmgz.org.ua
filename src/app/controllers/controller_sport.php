<?php
	class controller_sport extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | СПОРТИВНІ ДОСЯГНЕННЯ';

		$js[] = '/js/sport.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'sport_view.php', $data);
	}
}
?>