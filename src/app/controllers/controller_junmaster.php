<?php
	class controller_junmaster extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Школа молодого викладача та майстра';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Школа молодого викладача та майстра';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'junmaster_view.php', $data);
	}
}
?>