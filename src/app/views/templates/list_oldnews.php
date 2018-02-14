		<?php 

		if ($qtPages > 1) {
		echo '<div class="pagenation-nav">';
		echo '<ul>';
		for ($index=1; $index <= $qtPages ; $index++) {
			$class = '';
			if ($index == $active) {
				$class  = 'pagenation-link-active';
			};
			echo '<li class="pagenation-nav-btn-pages '.$class.'">'.$index.'</li>';
		}
		echo '</ul>';
		echo '<ul>';
		echo '<li class="pagenation-nav-btn-prev">НАЗАД</li>';
		echo '<li class="pagenation-nav-btn-next">ВПЕРЕД</li>';
		echo '</ul>';
		echo '</div>';
	}


		foreach ($result as $row) {
			/*$str = strip_tags($row->id);
			$str = preg_replace ('/s+/', ' ',  $str) ;
			$str = htmlentities($str);
			$str = str_replace("&nbsp;",' ',$str);
			$str = substr($str, 0, 380).'...';*/

// $str = trim($str) ;
echo<<<END
<a href="/oldnews/read?id={$row->id}">
<div class="oldnews_head">{$row->header}</div>
<div class="oldnews_content">{$row->content}</div>
<div class="oldnews_time"><i class="icon-calendar-1"></i><span>{$row->date}</span><i class="icon-clock"></i><span>$row->time</span></div>
</a>
END;

} 

?>
		