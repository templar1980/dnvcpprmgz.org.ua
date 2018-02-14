<div class="listnews_header">
	<h3 class="section-name news-list animated fadeInRight headmain"><a href="/news" title="Всі новини"><i class="icon-doc-text-inv"></i><span>Всі Новини</span></a></h3>
	<a href="/oldnews">архів новин</a>
	</div>
<?php
// if ($qtPages > 1) {
// 		echo '<div class="pagenation-nav">';
// 		echo '<ul>';
// 		for ($index=1; $index <= $qtPages ; $index++) {
// 			$class = '';
// 			if ($index == $active) {
// 				$class  = 'pagenation-link-active';
// 			};
// 			echo '<li class="pagenation-nav-btn-pages '.$class.'">'.$index.'</li>';
// 		}
// 		echo '</ul>';
// 		echo '<ul>';
// 		echo '<li class="pagenation-nav-btn-prev">НАЗАД</li>';
// 		echo '<li class="pagenation-nav-btn-next">ВПЕРЕД</li>';
// 		echo '</ul>';
// 		echo '</div>';
// 	}
foreach ($result as $news) {
	$url ='/'.$news->main_image;
	echo <<<END
	<a href="/news/read?id={$news->id}" class="list-news">
		<div class="img-wrapper"><img src="{$url}" alt=""></div>
		<div class="link-info">
			<i class="link-date">{$news->date}</i> 
			<span>{$news->header}</span>
			<p>{$news->content}</p>
			<div>
				<span><i class="icon-eye-3"></i>{$news->count}</span>
				<span><i class="icon-clock"></i>{$news->time}</span>
				<span class="list-news-like"><i class="icon-thumbs-up"></i>{$news->likes}</span>
				<span class="list-news-dislike"><i class="icon-thumbs-down"></i>{$news->dislikes}</span>
				<span>Переглянути<span>
				</div>
			</div>
		</a>
END;
	};

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
	
?>
