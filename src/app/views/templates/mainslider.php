<?php 
$mobile = $_GET['mobile'];
$endIndex = $mobile ? 7 : count($data["specialty"]);

for ($i=0; $i < $endIndex; $i++) { 
	 $des = News::shortText($data["specialty"][$i]->description,300);
   $html = "<li data-specialty=\"{$data["specialty"][$i]->name}\" data-specialty-description=\"{$des}\">";
   $html.="<a href=\"/specialty/\">";
   $html.="<img src=\"/{$data["specialty"][$i]->image}\" alt=\"ДЦПТО - {$data["specialty"][$i]->name}\"  title=\"ДЦПТО - {$data["specialty"][$i]->name}\">";
   $html.="</a></li>";
   echo $html;
}
 // foreach ($data["specialty"] as $specialty) {
 //        $des = News::shortText($specialty->description,300);
 //        $html = "<li data-specialty=\"{$specialty->name}\" data-specialty-description=\"{$des}\">";
 //        $html.="<a href=\"/specialty/\">";
 //        $html.="<img src=\"/{$specialty->image}\" alt=\"ДЦПТО - {$specialty->name}\"  title=\"ДЦПТО - {$specialty->name}\">";
 //        $html.="</a></li>";
 //        echo $html;
 //      }
 ?>