<?php
	class controller_innovations extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ІННОВАЦІЇ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'innovations_view.php', $data);
	}
}
?>