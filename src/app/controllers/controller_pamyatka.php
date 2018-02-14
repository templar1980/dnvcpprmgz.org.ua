<?php
	class controller_pamyatka extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО ПЛАН РОБОТИ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ПАМ\'ЯТКА ДЛЯ БАТЬКІВ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'pamyatka_view.php', $data);
	}
}
?>