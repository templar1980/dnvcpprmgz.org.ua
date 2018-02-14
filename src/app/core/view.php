<?php
	class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.

	function generateHead($description, $keywords, $title, $css, $js, $meta=[], $noindex=true)
	{

		include 'app/views/templates/head.php';
	}


	function generateAdmin($content_view, $data = null)
	{
		include 'app/views/'.$content_view;
	}	

	function generate($all_view, $content_view, $data = null)
	{
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		include 'app/views/'.$all_view;
	}

	static function linkStamp($file) {
			if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
				return  $file.'?ver='.filemtime( $_SERVER['DOCUMENT_ROOT'].$file );
			}
	}
}
?>