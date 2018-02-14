
<?php 
?>
<header>
 <img itemprop="image" src="/img/pages/_logo/logo.gif" alt="" class="logo">
 <div class="header-text-block">
  <div class="top-menu">
    <div class="mobile-menu" id="mbtn-sidebar-open"><i class="ion-navicon"></i></div>
      <ul>
        <li><a href="/form">Вхід</a></li>
        <li><a href="/sitemap">мапа сайту</a></li>
        <li><a href="/search">пошук</a></li>
      </ul>
    <!-- Gismeteo informer START -->
    <div class="gis-inform"></div>
    <!-- Gismeteo informer END -->
</div>
<div class="name">
 <span><em>д</em><em>н</em><em>і</em><em>п</em><em>р</em><em>о</em><em>в</em><em>с</em><em>ь</em><em>к</em><em>и</em><em>й</em>
  <em>ц</em><em>е</em><em>н</em><em>т</em><em>р</em><i class="line-break"></i>
  <em>п</em><em>р</em><em>о</em><em>ф</em><em>е</em><em>с</em><em>і</em><em>й</em><em>н</em><em>о</em><em>-</em><em>т</em><em>е</em><em>х</em><em>н</em><em>і</em><em>ч</em><em>н</em><em>о</em><em>ї</em><i class="line-break"></i>
  <em>о</em><em>с</em><em>в</em><em>і</em><em>т</em><em>и</em>  
</span>
<span>державний професійно-технічний навчальний заклад </span>
<span>офіційний веб-сайт</span>
</div>
</div>
<img src="/img/pages/_header/emblem.gif" alt="" class="emblem mb-img-hidden">
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

<!-- <link rel="stylesheet" href="/fonts/ionicons-2.0.1/css/ionicons.min.css"> -->
<div class="hidden-lesson" title="Інформація про уроки, натисніть для перегляду">
  <div class="icons-event" id="icons-event">
    <i class=""></i>
    <i class=""></i>
  </div>
  <div class="" id="name-event">
  </div>
</div>
</nav>


