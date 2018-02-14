<div class="result-field result-admin">	
	<h2>Колектив Центру</h2>
<?php 	
foreach ($admin as $row ) {
echo<<<END
	<div class="result-admin-item">	
		<div class="img-wrapper">	
			<img src="/{$row['photo_url']}" alt="">
		</div>
		<a href="/collective/view?id={$row['id']}">{$row['name']}</a>
		<p>{$row['position']}</p>
	</div>
END;
}
echo "</div>";
?>	

