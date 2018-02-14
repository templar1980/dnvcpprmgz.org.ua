<?php
	class controller_club extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | ГУРТКОВА РОБОТА';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ЗАГАЛЬНА ІНФОРМАЦІЯ';
	
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'club_view.php', $data);
	}
}
?>