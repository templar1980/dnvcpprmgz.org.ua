<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Вставьте этот тег в заголовке страницы или непосредственно перед закрывающим тегом основной части. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {
  	lang: 'uk'
  }
</script>


<?php
$news = $data["article"];
if ($data["addCount"]) {
	$news->count++;
	$class = 'count-anim';
};

echo <<<HERE
<div class="field-article">
	<div class="news-article-info">
		<h3>Новини дцпто</h3>
		<div>
			<span class="{$class}" title="Кількість переглядів"><i class="fa fa-eye"></i><span>$news->count</span></span>
			<span title="Дата додавання"><i class="fa fa-calendar-check-o" title="Дата додавання"></i>$news->date<span class="article-time"><i class="fa fa-clock-o" title="Дата додавання"></i>{$news->time}</span></span>
		</div>
	</div>
	<h1 class="news-article-header">$news->header</h1>
	<div class="news-article-img">
		<img itemprop="image" src="/{$news->main_image[0]['url']}" alt="{$news->main_image[0]['des']}" title="{$news->main_image[0]['des']}">
	</div>
	<div class="news-article-text">
		$news->content
	</div>
</div>
HERE;

if (count($news->images_gallery)) {
	echo '<div class="foto-gallery">';
	echo '<h3 class="section-name"><i class="icon-camera"></i><span>ФОТОГАЛЕРЕЯ</span></h3>';
	echo '<ul class="foto-gallery" id="foto-gallery">';
	// foreach ($news->images_gallery as $row) {
	// 	echo "<li><img src=\"/{$row['url']}\" alt=\"{$row['des']}\" title=\"{$row['des']}\"></li>";
	// };
	echo '</ul></div>';
};

echo <<<HERE
<div class="clear-fix"></div>

HERE;

if (count($news->files)) {
	echo '<div class="files-field">';
	echo '<h3 class="section-name"><i class="icon-download-cloud"></i><span>корисні файли</span></h3> <ul>';
	foreach ($news->files as $row) {
		echo "<li><i class=\"icon-file-pdf\"></i><a href=\"/{$row['url']}\" download>{$row['des']}</a></li>";
	};
	echo '</ul></div>';
};

echo <<<HERE
<div class="panel-like">
<div class="social-btn-wrapper">	
		<div><a href="mailto:?subject={$news->header}&body=http://dzpto/news/read?id={$news->id}" title="Відправити посилання по пошті"><i class="fa fa-envelope"></i>Відправити</a></div>
	<div class="g-plus" data-action="share"></div>
	<div class="fb-share-button" data-href="{$data['facebookURL']}" data-layout="button" data-size="small" data-mobile-iframe="false">
			<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"></a>
		</div>

	</div>
	<div class="likes-btn-wrapper">
		<button class="btn-like">
			<i class="icon-thumbs-up"></i>
			<span>Мені подобається</span>
			<div id="qt-likes">{$news->likes}</div>
			<div class="read-msg"><i class="fa fa-question"></i><span>Вам сподобалась стаття?</span><div class="read-msg-close"><i class="fa fa-times"></i></div></div>
		</button> 
		<button class="btn-dislike"><i class="icon-thumbs-down"></i><span>Мені не подобається</span><div>{$news->dislikes}</div></button></div>
</div>
HERE;
?>

<?php


echo '<h3 class="section-name"><i class="icon-heart-1"></i>ПОПУЛЯРНІ НОВИНИ</h3>';

echo '<div class="popular-news">';
$news = $data['popularNews'];
shuffle($news);
array_splice($news, 0, 7);

foreach ($news as $row) {
echo <<<HERE
	<a href="/news/read?id={$row->id}" class="popular-news-article">
		<div class="popular-news-img-wrapper">
			<img src="/{$row->main_image}" alt="">
			<div class="popular-news-icons">
				<div id="popular-eye"><i class="icon-eye-1"></i><span>{$row->count}</span></div>
				<div><i class="icon-thumbs-up"></i><span>$row->likes</span></div>
				<div><span>{$row->date}</span></div>
			</div>
			<div class="popular-news-text">{$row->content}</div>
		</div>
		<div class="popular-news-header">{$row->header}</div>
	</a>

HERE;
}
echo "</div>";
?>

