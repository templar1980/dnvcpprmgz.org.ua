<div class="result-field result-news">	
	<h2>Новини</h2>
<?php 	
foreach ($news as $row ) {
echo<<<END
	<div class="result-news-item">	
		<div class="img-wrapper">	
			<img src="/{$row['url']}" alt="">
		</div>
		<a href="/news/read?id={$row['id']}">{$row['header']}</a>
		<p>{$row['content']}</p>
		<div class="news-info">
			<i class="fa fa-eye"></i>
			<span>{$row['count']}</span>
			<i class="fa fa-calendar"></i>
			<span>{$row['date']}</span>
		</div>
	</div>
END;
}
echo "</div>";
?>	

