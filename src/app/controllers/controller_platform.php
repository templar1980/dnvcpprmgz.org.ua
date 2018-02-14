<?php
	class controller_platform extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ЗАГАЛЬНА ІНФОРМАЦІЯ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'platforma_view.php', $data);
	}
}
?>