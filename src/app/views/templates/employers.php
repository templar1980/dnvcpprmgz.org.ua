
	<div class="emp emp-window active">
<?php 
		$list=$data;
		$icons = ['industry', 'pencil-square-o', 'wrench', 'truck', 'cube', 'ticket', 'tasks', 'gear', 'cogs', 'cubes'];
		shuffle($data);
		$maxEmp = $mobile ? 1 : 3;
		while ( count($data) != 0) {
			echo "<div class=\"emp-row\">";
			for ($i=0; $i<$maxEmp ; $i++) { 
				$row = array_shift($data);
				if ($row) {
					echo <<<HERE
				<div class="emp-item" data-id="{$row['id']}">
					<div class="emp-item-img-wrapper">
						<img src="{$row['main_img_url']}" alt="">
					</div>
					<div class="emp-item-name">
						<i class="fa fa-{$icons[array_rand($icons,1)]}">	</i>
						<span>{$row['form']}</span>
						<span>{$row['name']}</span>
					</div>
					<img src="/img/logo_sq_gray.png" alt="" class="emp-des-overlogo">
				</div>
HERE;
				}
			}

			echo "</div>";
		}

		?>

</div>
<div class="emp-list emp-window">
	<?php 
	foreach ($list as $row) {
		echo <<<HERE
		<div class="emp-row">
			<div class="emp-item" data-id="{$row['id']}">
				<div>
					<img src="{$row['main_img_url']}">
				</div>
				<span>{$row['fullname']}</span>
				<i class="fa fa-{$icons[array_rand($icons,1)]}"></i>
			</div>
		</div>
HERE;
	}
	 ?>
</div>