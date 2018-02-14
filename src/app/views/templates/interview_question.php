<?php 
echo '<form id="form-interview">';

$checked = true;
foreach ($interview as $index => $row) {
	
	echo "<label><input type=\"radio\" value=\"{$row['id']}\" name=\"interview\"><span>{$row['answer']}</span></label>";
	$checked = false;
}
?>
<div class="buttons-row">

	<button id="send-interview">Голосувати</button>
	<button id="stat-interview">Результати</button>
</div>
</form>