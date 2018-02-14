<?php echo '<link rel="stylesheet" href="/css/sidebar.css">'?> 
<?php echo '<script src="/js/sidebar_timer.js"></script>'?> 
<div class="sidebar">
  <div class="top-ornament">
  </div>
  <ul class="sidebar-menu-1">
    <li>
      <span class="hidden"><i class="icon-street-view"></i>Наш центр<i class="icon-up-open-big"></i></span>
      <ul class="sidebar-menu-2">
        <li class="selected"><a href="/">ГОЛОВНА</a></li>

        <li class="selected"><a href="/news">НОВИНИ
           <?php  
           $model = new Model_News();
           $qtNews = $model -> getQtNewNews();
           if ($qtNews>0) {
              echo "<div class=\"qt-news-block\" style=\"left: 92px; right: initial; top: 1px\" title=\"Кількість новин за 24 години\">{$qtNews}</div>";
          };
          ?>
      </a></li>
      <li class="selected"><a href="/characteristic">Загальна інформація</a></li>
      <li class="selected"><a href="/history">Історія та сучасність</a></li>
      <li class="selected"><a href="/files/plain.pdf" target="_blank" title="План роботи центру на 2016-2017н.р.">План роботи</a></li>
      <li class="selected"><a href="/employers">Наші партнери та роботодавці</a></li>
      <li class="selected"><a href="/contacts">Контакти</a></li>
      <li class="selected"><a href="/reviews">Пропозиції та відгуки</a></li>
      <li class="selected"><a href="#" id="callback">Надіслати лист</a></li>
  </ul>
</li>
<li>
  <span class="hidden"><i class="fa fa-folder-open"></i>Відкритий доступ<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/license">Установчі документи</a></li>
    <li class="selected"><a href="/openinf">Відкриті ресурси</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-users-1"></i>Педагогічний колектив<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/collective/index?group=admin">Адміністрація</a></li>
    <li class="selected"><a href="/collective/index?group=teacher">Викладачі</a></li>
    <li class="selected"><a href="/collective/index?group=master">Майстри в/н</a></li>
    <li class="selected"><a href="/collective/index?group=tutor">Виховний напрямок</a></li>
    <li class="selected"><a href="/collective/index?group=other">Інші працівники</a></li>
</ul>
</li>

<li>
  <span class="hidden"><i class="icon-link-ext"></i>Методична робота<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/metwork">Методична робота центру</a></li>
    <li class="selected"><a href="/method">Методичні комісії</a></li>
    <li class="selected"><a href="/junmaster">Школа молодого працівника</a></li>
    <li class="selected"><a href="/invprojects">Інноваційні проекти</a></li>
    <li class="selected"><a href="/attestation">Атестація</a></li>
    <li class="selected"><a href="/journal">Сучасний вісник</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-comment"></i>Виховна робота<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/files/План 2017-2018 виховна робота.pdf" target="_blank">План виховної роботи</a></li>
    <li class="selected"><a href="/government ">Учнівське самоврядування</a></li>
    <li class="selected"><a href="/uconstruct">Гурткова робота</a></li>
    <!-- <li class="selected"><a href="/uconstruct">Профспілкова організація</a></li> -->
    <li class="selected"><a href="/sport">Спортивні досягнення</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-database"></i>Матеріально-технічна база <i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/travel">Віртуальна подорож центром</a></li>
</ul>
</li>
<li>
  <span class="hidden"> <i class="icon-road"></i>Абітурієнту<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/umovivstup">Загальні умови вступу</a></li>
    <li class="selected"><a href="/specialty">Напрямки підготовки</a></li>
    <li class="selected"><a href="/docvstup">Документи для вступу</a></li>
    <li class="selected"><a href="/doprof">Допрофесійна підготовка</a></li>
    <li class="selected"><a href="/priyom">Приймальна комісія</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-address-book-1"></i>Учнівська сторінка<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/rules">Правила для учнів</a></li>
    <li class="selected"><a href="/bells">Розклад дзвінків</a></li>
    <li class="selected"><a href="/schedule">Розклад уроків</a></li>
    <li class="selected"><a href="/dka">Державна кваліфікаційна атестація</a></li>
    <li class="selected"><a href="/dpa">Державна підсумкова атестація</a></li>
    <li class="selected"><a href="/zno">ЗНО</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-award"></i>Наші досягнення<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/platform">Платформа успіху</a></li>
    <li class="selected"><a href="/zal">Зал слави</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-info-circled"></i>Інформація для батьків<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/pamyatka">Памятка для батьків</a></li>
    <li class="selected"><a href="/uconstruct">Батьківський комітет</a></li>
    <li class="selected"><a href="/poradi">Поради психолога</a></li>
</ul>
</li>
<li>
  <span class="hidden"><i class="icon-doc-text-inv"></i>Електронна бібліотека<i class="icon-down-open-big"></i></span>
  <ul class="sidebar-menu-2">
    <li class="selected"><a href="/doc">Нормативні документи</a></li>
    <li class="selected"><a href="/books">Підручники</a></li>
    <li class="selected"><a href="/booklinks">Для педпрацівників</a></li>
    <li class="selected"><a href="/standart">Держстандарти ПТО</a></li>
</ul>
</li>
</ul>
<div class="coutdown-timer">
  <span><i class="icon-volume"></i>НАГАДУЄМО</span>
  <img src="/img/sidebar/att.png" alt="" style="width: 90%;">
  <div>До початку<br> Зовнішнього Незалежного Оцінювання <br> <strong>залишилося</strong></div>
  <div class="timer" id="timer" data-deadline='05/22/2018 09:00:00'>
    <div class="timer-list timer-list-day">
      <div id="days">00</div>
      <div>днів</div>
  </div>
  <div class="timer-list" >
      <div id="hours">00</div>
      <div>годин</div>
  </div>
  <div class="timer-list" >
      <div id="minutes">00</div>
      <div>хвилин</div>
  </div>
  <div class="timer-list" >
      <div id="seconds">00</div>
      <div>секунд</div>
  </div>
</div>

</div>
<?php  
$model = new Model_Birthday();
$teachers = $model->getNowBirthdayTeachers();
$students = $model->getNowBirthday();
if (count($teachers)>0 OR count($students)>0) {
   echo "<div class=\"birthday\">";
   echo "<span><i class=\"icon-child\"></i>ВІТАЄМО</span>";
};
if (count($teachers)>0) {
   echo<<<END
   <div class="birthday-administration">
   <div>Вітаємо наших працівників <br> з Днем Народження:</div>
END;

   foreach ($teachers as $row) {
      $qtyear = date('Y') - $row['bdate'];
      $name = explode(' ', $row['name']);
      $surname = $name[0];
      $name = $name[1].' '.$name[2];
      if (!strlen($row['photo_url'])) {
         $url = $row['man']?NPHOTO_MAN:NPHOTO_WOMAN;
     } else {
         $url = $row['photo_url'];
     };
     echo<<<END
     <div class="birthday-administration-person">
     <div class="birthday-administration-person-wrapper">  
     <img src="/{$url}">
     </div>
     <div class="birthday-administration-surname">{$surname}</div>
     <div class="birthday-administration-name">{$name}</div>
     <div class="birthday-administration-position">{$row['position']}</div>
     <div>Щиро вітаємо з {$qtyear}-річчям!</div>
     </div>
END;
 }
 echo<<<END
 <div class="birthday-text"> Бажаємо Вам щастя і достатку, <br> Ясного неба, сонця, тепла, <br> В житті щодень лиш злагоди й порядку, <br> Щоб доля Ваша світлою була.</div>
 </div>
END;
};

if (count($students)>0) {
   echo<<<END
   <div class="birthday-students">
   <div>Вітаємо наших учнів <br> з Днем Народження:</div>
   <div class="birthday-wrapper" style="">
   <img src="/img/all/giphy.gif" alt="" class="birthday-foto">
   </div>
END;
   foreach ($students as $row) {
      $arrName = explode(' ', $row['name']);
      $str = '<em>'.$arrName[0].'</em><br>'.' '.$arrName[1].' '.$arrName[2].'<br> <strong>группа ('.$row['ngroup'].') </strong>';
      echo "<div class=\"birthday-name\">{$str}</div>";
  }
  echo<<<END
  <div class="birthday-text">
  Нехай в житті все буде, що потрібно, <br>
  Без чого не складається життя: <br>
  Кохання, щастя, вірні друзі <br>
  І вічно юна, нестаріюча душа. <br>
  </div>
  </div>
END;
}
if (count($teachers)>0 OR count($students)>0) {
   echo "</div>";
};
?>

<div class="youtube">
<span><i class="icon-youtube-play"></i>Ми на каналі youtube</span>
<iframe width="100%" height="250" src="" frameborder="0" allowfullscreen style="margin-bottom: 10px" id="last-youtube-video"></iframe>
<script src="https://apis.google.com/js/platform.js"></script>
<div class="g-ytsubscribe" data-channelid="UCm8p2XTbLVcMAfM_QCJ2A6Q" data-layout="full" data-count="default" data-theme="dark"></div>
</div>
<div class="useful-links">
<span><i class="fa fa-check"></i>Опитування</span>
<div class="interview-question">
<?php 
$model = new Model_Interview();
$interview = $model->getDataForHtml();
echo $interview[0]['question'];
$checkIp = $model->checkIP($_SERVER['REMOTE_ADDR']);
?>
</div>
<?php 
$style = empty($checkIp)?'block':'none';
echo "<div class=\"interview\" style=\"display:{$style}\">";
require_once 'interview_question.php';
?>
</div>

<?php 
$style = empty($checkIp)?'none':'block';
echo "<div class=\"answer-interview\" style=\"display:{$style}\">";
echo "<div class=\"answer-interview-wrapper\" >";
require_once 'interview_answer.php';
echo $html;
?>
</div>
<div class="buttons-row">
<button id="int-interview" style="font-size: 0.8em; width: 65%">Повернутись до голосування</button>
</div>
</div>
</div>
<div class="useful-links">
<span><i class="icon-export"></i>Корисні посилання</span>
<ul>
<li>
<a href="http://mon.gov.ua/">
<?php 
echo '<img src="/img/link-2.png" alt="">';
?>
Міністерство освіти та науки України</a>
</li>
<li>
<a href="http://department.osvita-dnepr.com/">
<?php 
echo '<img src="/img/link-4.png" alt="">';
?>
Департамент освіти та науки Дніпропетровської ОДА</a>
</li>
<li>
<a href="http://nmc-pto.dp.ua/">
<?php 
echo '<img src="/img/link-3.png" alt="">';
?>
Навчально-методичний центр ПТО у Дніпропетровській області</a>
</li>
<li>
<a href="http://adm.dp.gov.ua/">
<?php 
echo '<img src="/img/link-1.png" alt="">';
?>
Дніпропетровська ОДА</a>
</li>
</ul>
</div>

<div class="holidays">
<span><i class="icon-calendar-3"></i>свята та події</span>
<a href="http://www.dilovamova.com/"><img alt="Святковий календар. Спілкуємося українською мовою" title="Святковий календар. Спілкуємося українською мовою" src="http://www.dilovamova.com/images/wpi.cache/informer/informer_300_02.png"></a>
</div>
<div class="bottom-ornament">
</div>
</div>
