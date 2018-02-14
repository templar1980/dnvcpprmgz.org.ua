<?php echo "<link rel='stylesheet' href='/css/header.css'>"?>
<header>
   <img src="/img/logo.png" alt="" class="logo">
   <div class="header-text-block">
      <div class="top-menu">
         <ul>
            <li><a href="/form">Вхід</a></li>
            <li><a href="/sitemap">мапа сайту</a></li>
            <li><a href="/search">пошук</a></li>
        </ul>
        <!-- Gismeteo informer START -->
        <link rel="stylesheet" type="text/css" href="https://s1.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
        <div id="gsInformerID-es6psM3mL861m3" class="gsInformer" >
         <div class="gsIContent">
            <div id="cityLink">
               <a href="https://www.gismeteo.ua/weather-dnipro-5077/" target="_blank">Погода у Дніпрі</a>
               <img src="https://s1.gismeteo.ua/static/images/gisloader.svg" width="24" height="24" alt="Погода у Дніпрі (Дніпропетровську)">
           </div>
           <div class="gsLinks" style="display: none">
            <table>
              <tr>
                 <td>
                    <div class="leftCol">
                       <a href="https://www.gismeteo.ua/ua" target="_blank">
                          <img alt="Gismeteo" title="Gismeteo" src="https://s1.gismeteo.ua/static/images/informer2/logo-mini2.png" align="absmiddle" border="0" />
                          <img src="https://s1.gismeteo.ua/static/images/gismeteo.svg" border="0" align="middle" style="left: 5px; top:1px">
                          <span>Gismeteo</span>
                      </a>
                  </div>
                  <div class="rightCol">
                     <a href="https://www.gismeteo.ua/ua/weather-dnipro-dnipropetrovsk-5077/" target="_blank">Погода на 2 тижні</a>
                 </div>
             </td>
         </tr>
     </table>
 </div>
</div>
</div>
<script src="https://www.gismeteo.ua/ajax/getInformer/?hash=es6psM3mL861m3" type="text/javascript"></script>
<!-- Gismeteo informer END -->
</div>
<div class="name">
   <span><em>д</em><em>н</em><em>і</em><em>п</em><em>р</em><em>о</em><em>в</em><em>с</em><em>ь</em><em>к</em><em>и</em><em>й</em>
      <em>ц</em><em>е</em><em>н</em><em>т</em><em>р</em>
      <em>п</em><em>р</em><em>о</em><em>ф</em><em>е</em><em>с</em><em>і</em><em>й</em><em>н</em><em>о</em><em>-</em><em>т</em><em>е</em><em>х</em><em>н</em><em>і</em><em>ч</em><em>н</em><em>о</em><em>ї</em>
      <em>о</em><em>с</em><em>в</em><em>і</em><em>т</em><em>и</em>  
  </span>
  <span>державний професійно-технічний навчальний заклад </span>
  <span>офіційний веб-сайт</span>
</div>
</div>
<?php 
echo '<img src="/img/emblem.png" alt="" class="emblem">';
?>
</header>
<nav class="main-menu">
   <div class="main-menu-time-block">
     <i class="icon-clock"></i>
     <div id="date">
       <div></div>
       <div></div>
   </div>
   <div id="time">
       <span></span>
       <span>:</span>
       <span></span>
       <span></span>
   </div>
</div>

<ul>
  <li><a href="/"><i class="icon-home"></i>головна</a></li>
  <li><a href="/news">новини</a>
     <?php  
     $model = new Model_News();
     $qtNews = $model-> getQtNewNews();
     if ($qtNews>0) {
        echo "<div class=\"qt-news-block\" title=\"Кількість новин за 24 години\">{$qtNews}</div>";
    };
    ?>
</li>
<!-- <li><a href="/#events">важливі події</a></li> -->
<li><a href="/specialty" itemprop="url">наші професії</a></li>
<li><a href="/employers">партнери</a></li>
<li><a href="/contacts" itemprop="url">контакти</a></li>
<li><a href="/search"><i class="fa fa-search"></i>Пошук</a></li>
</ul>

<link rel="stylesheet" href="/fonts/ionicons-2.0.1/css/ionicons.min.css">
<div class="hidden-lesson" title="Інформація про уроки, натисніть для перегляду">
    <div class="icons-event" id="icons-event">
        <i class=""></i>
        <i class=""></i>
    </div>
    <div class="" id="name-event">
    </div>
</div>
</nav>


