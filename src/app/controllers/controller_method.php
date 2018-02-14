<?php
	class controller_method extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Розкаже про основний масовий методичний орган, діяльність якого безпосередньо впливає на підвищення якості навчання і виховання учнів, ефективність застосування сучасних форм і методів навчання в ДЦПТО';
		$keywords = 'методичні, комісії, методические, коммисии';
		$title = 'ДЦПТО | Методичні комісії';
		$js[]= '/js/method.js';
		
		$this->view->generateHead($description, $keywords, $title, $css, $js);
		
		$this->view->generate('all_view.php', 'method_view.php', $data);
	}
}
?>