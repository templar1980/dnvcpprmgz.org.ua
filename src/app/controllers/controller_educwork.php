<?php
	class controller_educwork extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ЛІЦЕНЗІЇ ТА СЕРТИФІКАТИ ДЦПТО';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Виховна робота';
		
		$js[] = '/js/license.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'educwork_view.php', $data);
	}
}
?>