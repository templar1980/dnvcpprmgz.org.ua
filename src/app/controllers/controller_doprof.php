<?php
	class controller_doprof extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ДОПРФЕСІЙНА ПІДГОТОВКА';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'doprof_view.php', $data);
	}
}
?>