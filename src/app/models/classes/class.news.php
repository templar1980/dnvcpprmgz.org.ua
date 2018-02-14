<?php
	class News
	{
		public $id;
		public $date;
		public $time;
		public $header;
		public $content;
		public $count;
		public $main_image;
		public $images_gallery;
		public $files;
		public $likes;
		public $dislikes;

		static function shortText($text, $quantityChars)
		{
			$length = mb_strlen($text, 'UTF-8');
			$str = $text;
			$str = preg_replace('/<style>.*<\/style>/ims', '', $str);
			$str = strip_tags($str);
			if ($length > $quantityChars) {
					$str = mb_substr($str, 0, $quantityChars-2, 'UTF-8');
					$words = explode(" ", $str);
					array_splice($words,-1);    
					$last = array_pop($words);
					for ($i=1; $i<strlen($last); $i++) { 
					 //Ищем и удаляем в конце последнего слова все кроме букв и цифр 
					 if (preg_match('/\W$/',mb_substr($last,-1,1,'UTF-8'))) $last=mb_substr($last,0,strlen($last)-1,  'UTF-8'); 
					 else break; 
					} 
					$str = implode(" ", $words).' '.$last.'...';
			}
			return $str;
		}
	}
?>