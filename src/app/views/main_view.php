  <?php 
if (!isset($_SESSION['loaded'])) {
echo<<<END
<body style="overflow-y: hidden;">
    <div id="body-preloader">
       <div class="JTPreloader jt-animation">
         <div></div>
         <div></div>
         <div></div>
         <div></div>
         <div></div>
       </div>
       <span>Завантаження...</span>
    </div>
END;
} else {
  echo '<body>';
}
   ?>
   <div class="header-overlay"></div>
   <!-- <div class="new-year-line"></div> -->
   <div itemscope itemtype="http://schema.org/LocalBusiness" class="main" id="top" >
    <?php 
    require 'templates/header.php';
    ?>
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> -->
    <div class="collage_main_img">
        <picture class="collage_main_student col_stud_show">
          <source srcset="/img/pages/plug.jpg" media="(max-width:750px)"> 
          <img srcset="/img/pages/_home/main_bg.jpg">
        </picture>
        <picture class="collage_main_student col_stud_show">
          <source srcset="/img/pages/plug.jpg" media="(max-width:750px)"> 
          <img srcset="/img/pages/_home/main_student.png">
        </picture>
         <div class="collage_main_corpus col_corp_hide">
                <div>
                 <picture class="">
                   <source srcset="/img/pages/plug.jpg" media="(max-width:750px)"> 
                   <img srcset="/img/pages/_home/corpus1.jpg" title="" alt="">
                 </picture>
                 <div>Відділення машинобудування</div>
               </div>
               <div>
                 <picture class="">
                   <source srcset="/img/pages/plug.jpg" media="(max-width:750px)"> 
                   <img srcset="/img/pages/_home/corpus2.jpg" title="" alt="">
                 </picture>
                 <div>Відділення зв'язку</div>
               </div>
               <div>
                 <picture class="">
                   <source srcset="/img/pages/plug.jpg" media="(max-width:750px)"> 
                   <img srcset="/img/pages/_home/corpus3.jpg" title="" alt="">
                 </picture>
                 <div>Відділення автотранспорту <br> та будівництва</div>
               </div>
         </div>
    </div>
<div class="main-slider">
   <div class="main-slider-img">
    <ul>

  <?php 
      echo '<div><i class="icon-spin2 animate-spin"></i></div>';
     // foreach ($data["specialty"] as $specialty) {
     //    $des = News::shortText($specialty->description,300);
     //    $html = "<li data-specialty=\"{$specialty->name}\" data-specialty-description=\"{$des}\">";
     //    $html.="<a href=\"/specialty/\">";
     //    $html.="<img src=\"/{$specialty->image}\" alt=\"ДЦПТО - {$specialty->name}\"  title=\"ДЦПТО - {$specialty->name}\">";
     //    $html.="</a></li>";
     //    echo $html;
     //  }
  ?>
    </ul>
</div>
<div class="slider-overlay"></div>
<div class="main-slider-description">
  <p>Проводимо навчання за професіями:</p>
  <p class="specialty">
   <a href=""></a>
</p>
<p class="specialty-description"></p>
<!-- <p class="period">Термін навчання: <span></span></p> -->
<div class="main-slider-control">
   <i class="icon-left-open-big" title="Попередній слайдер"></i>
   <i class="icon-right-open-big" title="Слідуючий слайдер"></i>
   <i class="btn-play-pause icon-play" title="Програвати/Пауза"></i>
</div>
</div>
</div>
<div class="main-wrapper">
  <?php
  require 'templates/sidebar.php';
  ?>  

  <div class="content">

    <div class="history hello">
     <h1>Шановні друзі!</h1>
     <div class="hello-txt">
       <div class="m-img-wrapper">
          <picture class="">
            <source srcset="/img/pages/_home/director_s.jpg" media="(max-width:750px)"> 
            <img src="/img/pages/_home/director.jpg" title="Директор ДЦПТО : Олександр Стрілець" alt="Директор ДЦПТО : Олександр Стрілець">
          </picture>  
         <!-- <img src="/img/pages/_home/director.jpg" alt="Директор ДЦПТО : Олександр Стрілець" title="Директор ДЦПТО : Олександр Стрілець"> -->
       </div>
       <div>
         <p style="font-size: 1.4em; font-weight: bold;">Щиро радий бачити Вас у гостях нашого сайту!</p>
         <p> Впевнений, з часом станете його активними користувачами, героями і дописувачами. </p>
         <p>За усіх часів робоча професія була шанованою в суспільстві, а її кращі представники користувалися в ньому повагою. </p>
         <p>Саме в нашому центрі професійно технічного навчання Ви зможете зробити свій перший крок до такої поваги, ставши професіоналом у будь-якій професії, якої можна тут набути: токар, слюсар, зварювальник, зв'язківець... Втім, уважно користуючись цим сайтом, зрозумієте - їх перелік дуже довгий! А ще дізнаєтесь про колектив педагогів і майстрів - дружний, професійний, що виховує з новачків справжніх майстрів!</p> 
         <p>...І не тільки. Бо життя в нас - багатогранне: спорт, мистецтво, музика - все це складові щоденного буття.</p>
         <p>Отже чекаємо, що багато хто з Вас долучиться до наших спільних справ... Бо Україна чекає реалізації ваших кращих рис - майстерності і професіоналізму. <span>Давайте допоможемо їй в цьому разом!</span></p>
         <p style="float: right; font-style: italic; text-align: right;"> З повагою, директор ДЦПТО <br><span> Олександр Стрілець</span></p>
         <div class="clearfix"></div>
       </div>
     </div>
   
 </div>

 <!-- CONGRATULATION START   -->
 <!-- #code -->
 <!-- CONGRATULATION END   -->

 <!-- INNOVATIONS START-->
 <a href="/innovations" class="innovations_announce" title="Натисніть для перегляду">
  <div class="flip-container">
    <div class="flipper">
      <div class="front">
        <img src="/img/pages/_home/innov/front.jpg" alt="">
    </div>
    <div class="back">
        <img src="/img/pages/_home/innov/back.jpg" alt="">
    </div>
</div>
</div>
<div><span>дуальна система навчання</span><span>інноваційні  технології</span><span>огляд системи навчання</span></div>
</a>

<!-- INNOVATIONS END -->

<h1><a href="/news">ОСТАННІ НОВИНИ</a></h1>
<div class="last-news-block">
  <?php
  include 'templates/last_news.php';
  ?>
</div>
<br>

<h1 id="events"><a href="#">АНОНСИ</a></h1>
<div class="announcement-block">


  <!-- START ANNOUNCE  -->
  <a href="/safetyhealth/internet"><img src="/img/pages/_home/temp/internet.jpg" alt="" style="width: 100%; margin-bottom: 20px"></a>

  <img src="/img/pages/_home/temp/privat.jpg" alt="" style="width: 65%; display: block; margin: 5px auto;">

  <!-- END ANNOUNCE  -->

</div> 

<h1></i>ОГОЛОШЕННЯ</h1>
<div class="mob-warning">
    <picture class="">
      <source srcset="/img/pages/_home/temp/mobile_s.jpg" media="(max-width:750px)"> 
      <img src="/img/pages/_home/temp/mobile.png" title="" alt="">
    </picture>
  <!-- <img src="/img/all/warning/full-s.png" alt="">
  <img src="/img/all/warning/mobile-s.png" alt=""> -->
  <p>Раді повідомити Вас, що ми запустили в <em>тестовому</em> режимі адаптовану версію сайту для <em>мобільних</em> пристроїв з шириною екрану менше 750 пікселів. Ящо Ви помітили помилку, просимо надіслати лист <a href="mailto:templar1980@ukr.net">адміністратору</a>. Дякуємо, за розуміння!</p>
</div>

<div class="advert-block work" style="margin-top: 10px">
   <!--   <div class="advert-text">
      <h3><i class="icon-mic"></i><span class="advert-date">13.02.17 15:00</span> <span>|</span>Вручення спортивних нагород</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus recusandae iure veritatis. Laboriosam nulla iure quis quos dolor possimus asperiores.</p>
  </div> -->
  <div class="advert-header"><i class="icon-mic"></i>Запрошуємо на роботу<i class="icon-down-open-big"></i> <br> <span style="font-size: 0.65em; text-transform: none; padding-left: 22px;  color: #a5a5a5; line-height: 0.8em;">Натисніть для перегляду</span></div>
  <div class="advert-text">

      <div style="line-height: 1.3em;">
        <h3>Державний професійно-технічний навчальний заклад <strong>«Дніпровський центр професійно-технічної освіти»</strong> <span style="margin-right: 0">оголошує</span> конкурс на заміщення вакантних посад:</h3>
       <!-- <div style="
       text-align: center;
       ">Державний професійно-технічний навчальний заклад «Дніпровський центр професійно-технічної освіти» <span>оголошує</span> конкурс на заміщення вакантних посад:</div> -->
        <p style="
       margin: 0;
       margin-top: 20px;
       font-weight: bold;
       ">Керівник гуртка художньої самодіяльності</p>
       <p style="
       margin: 0;
       margin-top: 10px;
       font-weight: bold;
       ">Викладачі:</p>
       <ul style="
       list-style: circle outside;
       padding-left: 30px;
       margin: 5px 0;
       ">
       <!-- <li>біології</li> -->
       <!-- <li>математики, інформатики</li> -->
       <li>спецтехнології з професії «Слюсар з ремонту автомобілів»</li>
       <li>спецтехнології з професії «Оператор поштового зв’язку</li>
   </ul>
   <p style="margin-bottom: 5px"><span style="
   color: #dd137b;
   ">Кваліфікаційні вимоги:</span> вища освіта за фахом</p>
   <p style="
   margin: 0;
   font-weight: bold;
   ">Майстри виробничого навчання з професій:</p>
   <ul style="
   list-style: circle outside;
   padding-left: 30px;
   margin: 5px 0;
   ">
   <li>електрогазозварник</li>
   <li>електромонтер</li>
   <li>слюсар з ремонту автомобілів</li>
   <li>оператор поштового зв’язку</li>
   <li>штукатур, лицювальник – плиточник, маляр</li>
   <li>оформлювач вітрин, приміщень та будівель</li>
   <li>реставратор декоративних штукатурок і ліпних виробів</li>
   <li>верстатник широкого профілю, оператор верстатів з програмним керуванням</li>
</ul>
<p style="margin-bottom: 5px"><span style="color: #dd137b;">Кваліфікаційні вимоги:</span> освіта за фахом, наявність робітничої кваліфікації.</p>
<p>Навчальний заклад забезпечує проживання в межах міста, соціальні гарантії передбачені трудовим законодавством України та гарантує отримання додаткових пільг та бонусів передбачених соціальним пакетом. </p>
<div style="
text-align: center;
color: #dd137b;
font-weight: bold;
margin: 10px 0;
font-size: 1.3em;
">Головна вимога: бажання працювати з молоддю!</div>
<p style="
margin: 0; text-align: center;
">За довідками звертатися: <br> м.Дніпро, вул. Алтайська, 6-а</p>

<p style="text-align: center;">Телефон: 067-664-06-00, 050-272-54-14</p>
</div>
</div>
</div>


</div>
</div>
<!-- <div class="clear-fix"></div>
<div class="partner-line">
  <div class="name-line">
    Наші партнери
  </div>
  <div class="inner-wrapper">
   <div class="partner-window">
    <div class="partner-line-item">
      <img src="/img/all/employers/alan_logo.png" alt="">
      <span>Алан</span>
    </div>
    <div class="partner-line-item">
      <img src="/img/all/employers/dtrz_logo.png" alt="">
      <span>ПАТ «Дніпропетровський тепловозоремонтний завод»</span>
    </div>
    <div class="partner-line-item">
      <img src="/img/all/employers/epi_logo.png" alt="">
      <span>Name</span>
    </div>
    <div class="partner-line-item">
      <img src="/img/all/employers/privat_logo.png" alt="">
      <span>Name</span>
    </div>
    <div class="partner-line-item">
      <img src="/img/all/employers/dts_logo.png" alt="">
      <span>Name</span>
    </div>
    <div class="partner-line-item">item6</div>
    <div class="partner-line-item">item7</div>
    <div class="partner-line-item">item8</div>
    <div class="partner-line-item">item9</div>
    <div class="partner-line-item">item10</div>
   </div>
  </div>
</div> -->
<?php
require 'templates/footer.php';
?>
</div> 
</body>
</html>
