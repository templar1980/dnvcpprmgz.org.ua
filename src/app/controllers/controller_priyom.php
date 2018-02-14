<?php
	class controller_priyom extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ПРИЙМАЛЬНА КОМІСІЯ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ПРИЙМАЛЬНА КОМІСІЯ';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'priyom_view.php', $data);
	}
}
?>