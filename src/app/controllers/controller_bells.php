<?php
	class controller_bells extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Розклад дзвінків з перервами на робочу неділю';
		$keywords = 'Розклад дзвінків, расписание звонков';
		$title = 'ДЦПТО | Розклад дзвінків';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'bells_view.php', $data);
	}
}
?>