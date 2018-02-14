<?php
	class controller_dpa extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ДЕРЖАВНА ПІДСУМКОВА АТЕСТАЦІЯ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'dpa_view.php', $data);
	}
}
?>