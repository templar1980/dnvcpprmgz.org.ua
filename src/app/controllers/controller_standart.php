<?php
class controller_standart extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Державні стандарти професійно-технічної освіти в Україні, по професіям що здобуваються в Дніпровському центрі професійно-технічної осіти (ДЦПТО)';
		$keywords = '';
		$title = 'Держстандарти | ДЦПТО';

		$js[] = '/js/standart.js';
		
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		$this->view->generate('all_view.php', 'standart_view.php', $data);
	}
}
?>