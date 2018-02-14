<?php
	class controller_metwork extends Controller
{
	function action_index($param=null)
	{	
		$description = 'МЕТОДИЧНА РОБОТА ЦЕНТРУ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | МЕТОДИЧНА РОБОТА ЦЕНТРУ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'metwork_view.php', $data);
	}
}
?>