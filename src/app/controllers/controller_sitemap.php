<?php
	class controller_sitemap extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Мапа сайту';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Мапа сайту';

		$css[] = '/css/sitemap.css';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('empty_view.php', 'sitemap_view.php', $data);
	}
}
?>