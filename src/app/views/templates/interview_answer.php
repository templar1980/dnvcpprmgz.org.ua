<?php 
$allCount = 0;
$max=0;
$html = "";
foreach ($interview as $index => $row) {
	$max = $max>$row['count']?$max:$row['count'];
	$allCount += $row['count'];
};
// echo "<div class=\"peoples\">Всього відповідей: {$allCount}</div>";
foreach ($interview as $index => $row) {
	$percent = $allCount?($row['count']*100)/$allCount:0;
	$percent = round($percent,1);
	$px = 370*($percent/100);
	$class = $row['count'] === $max ? 'orange' : ''; 
	$percent = $percent.'%';
	$answer = $row['answer'].' ('.$row['count'].')';
	// $html.="<div class='answer-interview-row'>";
	$html.="<div class='answer-interview-row'><p>{$answer}</p><div class='row-wrapper'>";
	// $html.="<div class='answer-line {$class}' style='width: {$px}px;'></div><div class='answer-txt'>{$percent}</div>";
	$html.="<div class='answer-line {$class}' data-width='{$px}'></div><div class='answer-txt'>{$percent}</div>";
	$html.="</div></div>";
// echo<<<END
// 	<div class="answer-interview-row">
// 	<p>{$answer}</p>
// 	<div class="row-wrapper">
// 	<div class="answer-line {$class}" style="width: {$px}px; "></div>
// 	<div class="answer-txt">{$percent}</div>
// 	</div>
// 	</div>
// END;
};
// echo<<<END
// <div class="buttons-row">
// 	<button id="int-interview">До голосування</button>
// </div>
// END;
?>
