<?php
	class controller_license extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ЛІЦЕНЗІЇ ТА СЕРТИФІКАТИ ДЦПТО';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ЛІЦЕНЗІЇ ТА СЕРТИФІКАТИ';
		
		$js[] = '/js/license.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'license_view.php', $data);
	}
}
?>