<?php
	class controller_doc extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | НОРМАТИВНІ ДОКУМЕНТИ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'doc_view.php', $data);
	}
}
?>