<?php
	class controller_invprojects extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Іноваційні проекти';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Іноваційні проекти';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'invprojects_view.php', $data);
	}
}
?>