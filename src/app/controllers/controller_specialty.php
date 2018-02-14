<?php
	class controller_specialty extends Controller
{
	function action_index($param=null)
	{	
		$description = 'Професії за якими Дніпровський центр професійно-технічної освіти здійснює підготовку кваліфікованих робітників';
		$keywords = 'професії, профессии, обучение, навчання, технические, технічні';
		$title = 'Напрямки підготовки(професії) в ДЦПТО';

		$js[] = '/js/sport.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, [],false);
		
		$this->view->generate('all_view.php', 'specialty_view.php', $data);
	}

	function action_emonter()
	{	
		$description = 'Електромонтер - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, електромонтер, профессия, электромонтер';
		$title = 'Електромонтер - здобуття професії в ДЦПТО';

		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/emonter_view.php', $data);
	}

	function action_avtoslesar()
	{	
		$description = 'Слюсар з ремонту автомобілів - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, автослюсар, профессия, автослесарь';
		$title = 'Слюсар з ремонту автомобілів - здобуття професії в ДЦПТО';

		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/avtoslesar_view.php', $data);
	}

	function action_kasir() 
	{
		$description = 'Контролер-касир - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, Контролер-касир , профессия, кассир';
		$title = 'Контролер-касир - здобуття професії в ДЦПТО';
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/kasir_view.php', $data);
	}

	function action_licplit() 
	{
		$description = 'Лицювальник-плиточник - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, лицювальник-плиточник, профессия, облицовщик,';
		$title = 'Лицювальник-плиточник - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/licplit_view.php', $data);
	}

	function action_malyar() 
	{
		$description = 'Маляр  - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, маляр, профессия';
		$title = 'Маляр - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/malyar_view.php', $data);
	}

	function action_nabor() 
	{
		$description = 'Оператор комп’ютерного набору  - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, Оператор комп’ютерного набору , профессия, оператор компьтерного набора';
		$title = 'Оператор комп’ютерного набору  - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/nabor_view.php', $data);
	}


	function action_neprod() 
	{
		$description = 'Продавець непродовольчих товарів - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, Продавець непродовольчих товарів , профессия, продавец непргодовольственных товаров, днепр, дніпро';
		$title = 'Продавець непродовольчих товарів - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/neprod_view.php', $data);
	}

	function action_oformitel() 
	{
		$description = 'Оформлювач  вітрин, приміщень та будівель  - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, Оформлювач  вітрин, приміщень та будівел, профессия, оформитель витрин';
		$title = 'Оформлювач  вітрин, приміщень та будівель - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/oformitel_view.php', $data);
	}

	function action_postoperator() 
	{
		$description = 'Оператор поштового зв’язку - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, Оператор поштового зв’язку , профессия, оператор почтовой связи';
		$title = 'Оператор поштового зв’язку - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/postoperator_view.php', $data);
	}

	function action_progoperator() 
	{
		$description = 'Оператор верстатів з програмним керуванням - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, оператор верстатів з програмним керуванням, профессия, станочник, оператор станков с ЧПУ';
		$title = 'Оператор верстатів з програмним керуванням - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/progoperator_view.php', $data);
	}

	function action_stukatur() 
	{
		$description = 'Штукатур  - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, штукатур, профессия';
		$title = 'Штукатур - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/stukatur_view.php', $data);
	}

	function action_svarshik() 
	{
		$description = 'Електрогазозварник - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, електрогазозварник, профессия, электрогазосварщик, сварщик';
		$title = 'Електрогазозварник - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/svarshik_view.php', $data);
	}

	function action_tokar() 
	{
		$description = 'Токар - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, токар, профессия, токарь';
		$title = 'Токар - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/tokar_view.php', $data);
	}

	function action_verstatprof() 
	{
		$description = 'Верстатник широкого профілю - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, верстатник широкого профілю, профессия, станочник';
		$title = 'Верстатник широкого профілю - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/verstatprof_view.php', $data);
	}

	function action_voditel() 
	{
		$description = 'Водій  - одна  з професій за якою проводиться навчання в Дніпровському центрі професійно-технічної освіти';
		$keywords = 'професія, водій , профессия, водитель, категории, категории B C';
		$title = 'Водій - здобуття професії в ДЦПТО';
		
		$css[] = '/css/specialty-page.css';
		$js[] = '/js/specialty.js';

		$this->view->generateHead($description, $keywords, $title, $css, $js, false);
		
		$this->view->generate('all_view.php', 'prof/voditel_view.php', $data);
	}




}
?>