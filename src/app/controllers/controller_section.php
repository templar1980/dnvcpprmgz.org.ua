<?php
	class controller_section extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Гурткова робота ДЦПТО';
		$keywords = '';
		$title = 'ДЦПТО | Гурткова робота';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'section_view.php', $data);
	}
}
?>