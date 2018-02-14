<?php
	class controller_attestation extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | TEST';
		$keywords = '';
		$title = 'Атестація педагогічних працівників в ДЦПТО';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'attestation_view.php', $data);
	}
}
?>