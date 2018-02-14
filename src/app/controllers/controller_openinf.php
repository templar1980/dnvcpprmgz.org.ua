<?php
	class controller_openinf extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Відкриті ресурси';
		$keywords = 'Відкрита інформація ресурси';
		$title = 'ДЦПТО | Відкриті ресурси';

		$js[] = '/js/license.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'openinf_view.php', $data);
	}
}
?>