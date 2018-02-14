<?php
	class controller_docvstup extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Документи для вступу до ДЦПТО';
		$keywords = 'Документи для вступу';
		$title = 'ДЦПТО | Документи для вступу до ДЦПТО';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'docvstup_view.php', $data);
	}
}
?>