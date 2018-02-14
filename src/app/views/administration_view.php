<div class="administration_person">
	<?php 
	if (!strlen($data['photo_url'])) {
		$url = $data['man']?NPHOTO_MAN:NPHOTO_WOMAN;
	} else {
		$url = $data['photo_url'];
	};
	$name = explode(' ', $data['name']);
	$surname = $name[0];
	$name = $name[1].' '.$name[2];
	$position = $data['position_for_view']?$data['position_for_view']:$data['position'];
	echo<<<END
	<div class="person_main_info">
		<img id="test" src="/{$url}" title="{$data['name']}" alt="{$data['name']}">
		<div>
			<h1><span class="surname_person">{$surname}</span><span class="name_person">$name</span></h1>
			<div class="person_position"><div class="person-left-line">&nbsp;</div><span>{$position}</span></div>
		</div>
	</div>
	<div class="person_info">
		{$data['info']}
	</div>
END;
	?>
</div>