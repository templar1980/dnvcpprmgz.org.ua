<?php
	class controller_form extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Вхід';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Вхід';

		$css[] = '/css/home.css';
		$css[] = '/css/form.css';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('empty_view.php', 'form_view.php', $data);
	}
}
?>