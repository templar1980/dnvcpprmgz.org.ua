<?php
	class controller_history extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Історія ДЦПТО';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ІСТОРІЯ ТА СУЧАСНІСТЬ';

		$js[] = '/js/history.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'history_view.php', $data);
	}
}
?>