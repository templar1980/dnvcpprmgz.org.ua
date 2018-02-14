<?php
	class controller_zal extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ЗАГАЛЬНА ІНФОРМАЦІЯ';

		$js[] = '/js/history.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js);

		$this->view->generate('all_view.php', 'zal_view.php', $data);
	}
}
?>