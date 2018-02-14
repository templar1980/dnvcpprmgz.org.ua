<?php
	class controller_characteristic extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Загальна інформація';
		$keywords = 'ДЦПТО, дніпровський центр професійно-технчної освіти';
		$title = 'Загальна інформація про Дніпровський Центр професійно-технчної освіти';

		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'characteristic_view.php', $data);
	}
}
?>