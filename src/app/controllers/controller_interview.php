<?php
	class controller_interview extends Controller
{
	function action_index($param=null)
	{	
		Route::ErrorPage404();
		return false;
	}

	function action_save($param)
	{	
		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		
		$this->model = new Model_Interview();
		$check = $this->model->checkIP($_SERVER['REMOTE_ADDR']);
		$respond = [];
		
		if (!empty($check)) {
			$respond['err'] = true;
			$respond['html'] = "<div class='interview-errors'><i class='fa fa-warning'></i>Ви вже приймали участь в голосуванні</div>";
			echo json_encode($respond);
			return false;
		};

	  $this->model->saveData($_POST['id'], $_SERVER['REMOTE_ADDR']);
	  $interview = $this->model->getDataForHtml();

	  	require_once 'app/views/templates/interview_answer.php';
	  	$respond['err'] = false;
			$respond['html'] = $html;
			echo json_encode($respond);
	}

	

	
}
?>