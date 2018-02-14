<?php
	class controller_booklinks extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Електронна бібліотека | Корисні посилання';
		$keywords = 'KEYWORDS';
		$title = 'Електронна бібліотека | Корисні посилання';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'booklinks_view.php', $data);
	}
}
?>