<?php
	class controller_zno extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Зовнішнє незалежне оцінювання';
		$keywords = 'Зовнішнє незалежне оцінювання, ДЦПТО';
		$title = 'ДЦПТО | ЗНО';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [], false);

		$this->view->generate('all_view.php', 'zno_view.php', $data);
	}
}
?>