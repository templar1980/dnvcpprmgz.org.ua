<?php
	class controller_schedule extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Розклад занять';
		$keywords = 'Розклад занять в ДЦПТО';
		$title = 'ДЦПТО | Розклад занять';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'schedule_view.php', $data);
	}
}
?>