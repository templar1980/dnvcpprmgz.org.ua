<?php
	class controller_travel extends Controller
{
	function action_index($param=null)
	{	
		$description = 'ДЦПТО | Віртуальна подорож';
		$keywords = 'KEYWORDS';
		$title = 'ДЦПТО | Віртуальна подорож';
		
		$css[] = '/js/plugins/OwlCarousel/dist/assets/owl.carousel.min.css';
		$css[] = '/js/plugins/OwlCarousel/dist/assets/owl.theme.default.min.css';
		$js[] = '/js/plugins/OwlCarousel/dist/owl.carousel.min.js';

		$css[] = '/css/JTAlbumsViewer.css';
		$js[] = '/js/JTAlbumsViewer.js';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('empty_view.php', 'travel_view.php', $data);
	}
}
?>