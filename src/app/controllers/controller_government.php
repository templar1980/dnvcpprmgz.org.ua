<?php
	class controller_government extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | УЧНІВСЬКЕ САМОВРЯДУВАННЯ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | УЧНІВСЬКЕ САМОВРЯДУВАННЯ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'government_view.php', $data);
	}
}
?>