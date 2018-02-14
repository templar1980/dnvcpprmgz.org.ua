<div class="result-field result-news">	
	<h2>Сторінки сайту</h2>
<?php 	

foreach ($pages as $row ) {
echo<<<END
	<div class="result-link-item">	
		<a href="{$row['link']}">{$row['name']}</a>
		<p>{$row['description']}</p>
	</div>
END;
}
echo "</div>";
?>	

