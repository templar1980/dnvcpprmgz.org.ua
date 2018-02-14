<?php
	class controller_rules extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | ПРАВИЛА ДЛЯ УЧНІВ';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | ПРАВИЛА ДЛЯ УЧНІВ';

		$this->view->generateHead($description, $keywords, $title, $css, $js);

		$this->view->generate('all_view.php', 'rules_view.php', $data);
	}
}
?>