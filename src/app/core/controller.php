<?php
	class Controller {
	
	public $model;
	public $view;
	public $question;
	
	function __construct()
	{
		require_once 'app/models/model_footer.php';
		require_once 'app/models/model_birthday.php';
		require_once 'app/models/model_news.php';
		require_once 'app/models/model_interview.php';
		$this->view = new View();
	}
	
	function action_index()
	{

	}
}
?>