<div class="collective">
	<?php 
	if ($data[0]['group'] == 'admin') {
		$group = 'Адміністрація центру	';
	} else if ($data[0]['group'] == 'teacher') {
		$group = 'Викладачі центру';
	} else if ($data[0]['group'] == 'master') {
		$group = 'Майстри виробничого навчання';
	}	else if ($data[0]['group'] == 'tutor') {
		$group = 'Працівники з виховної роботи';
	} else {
		$group = 'Інші працівники центру';
	}
	echo "<h1><i class=\"icon-users-1\"></i> {$group} </h1>";
	 ?>
	
	<div class="collective_list">
		<?php 
		foreach ($data as $row){
			if (!strlen($row['photo_url'])) {
				$url = $row['man']?NPHOTO_MAN:NPHOTO_WOMAN;
			} else {
				$url = $row['photo_url'];
			};
			$name = explode(' ', $row['name']);
			$surname = $name[0];
			$name = $name[1].' '.$name[2];
		echo<<<END
			<div class="collective_list_item_container">
			<a href="/collective/view?id={$row['id']}" class="collective_list_item">
				<div class="collective_list_item_img_wrapper">
					<img src="/{$url}" alt="{$row['name']}" title="{$row['name']}">
				</div>
				<div class="collective_item_position">
					<div>{$surname}</div>
					<div>{$name}</div>
					<div>{$row['position']}</div>
				</div>
				
			</a>
			<div class="line-hover"></div>
			</div>
END;
		}
		?>
	</div>
</div>