<?php
	class controller_umovivstup extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ЗАГАЛЬНА ІНФОРМАЦІЯ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);

		$this->view->generate('all_view.php', 'umovivstup_view.php', $data);
	}
}
?>