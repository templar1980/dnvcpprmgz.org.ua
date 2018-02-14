<?php
	class controller_contacts extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Телефони, адреси корпусів з позначенням на картах, пошта і т.п.';
		$keywords = 'телефон, пошта, e-mail, адреса';
		$title = 'ДЦПТО | Контакти';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'contacts_view.php', $data);
	}
}
?>