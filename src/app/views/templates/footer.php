<?php 
    // echo '<link rel="stylesheet" href="'.View::linkStamp('/css/footer.css').'">';
?>
<div class="clear-fix"></div>
<footer>
   <div class="footer-content">
      <div class="footer-content-col">
         <img src="/img/pages/_logo/logo_sq.gif" alt="" class="logo">
         <div itemprop="name">дніпровський центр професійно-технічної освіти </div>
         <div>офіційний веб-сайт</div>
         <div>Телефони для довідок: <br><span itemprop="telephone" id="_telephone3">+38(096) 195-14-17<br>+38(095) 332-36-79</span></div>
         <div>Електронна пошта: <span itemprop="email"><a href="mailto:dneprnvc@ukr.net">dneprnvc@ukr.net</a></span></div>
         <div>СОЦМЕРЕЖІ</div>
         <div class="social">
         		<a href="https://www.facebook.com/groups/342365412821114/?ref=aymt_homepage_panels"><i class="icon-facebook-rect"></i></a>
         		<!-- <a href="https://vk.com/club77913288"><i class="icon-vkontakte-1"></i></a>
         		<a href="https://ok.ru/profile/571410593344"><i class="icon-odnoklassniki-rect"></i></a> -->
         		<a href="https://www.youtube.com/channel/UCm8p2XTbLVcMAfM_QCJ2A6Q"><i class="icon-youtube"></i></a>
         </div>
      </div>
      <div class="footer-content-separator"></div>
      <div class="footer-content-col">
         <span>Швидкі посилання</span>
         <a href="/">Головна</a>
         <a href="/search">Пошук</a>
         <a href="/specialty">Напрямки підготовки</a>
         <a href="/employers">Наші партнери</a>
         <a href="/docvstup">Документи для вступу</a>
         <a href="/priyom">Приймальна комісія</a>
         <a href="/contacts">Контакти</a>
         <a href="/news">Новини</a>
         <a href="/openinf">Відкриті ресурси</a>
         <a href="/schedule">Розклад уроків</a>
         <a href="/books">Електронна бібліотека</a>
      </div>
      <div class="footer-content-separator"></div>
      <div class="footer-content-col">
         <form action="#" enctype="text/plain" id="callback-form">
            <span>Задати питання</span>
            <fieldset>
               <input type="text" maxlength="50" placeholder="Вкажіть Ваше ім'я" name="name" required="">
               <input type="email" maxlength="30" placeholder="Вкажіть Ваш e-mail" name="email" required="">
            </fieldset>
            <textarea required="" name="msg" placeholder="Напишіть Ваше запитання"></textarea>
            <span class="question">Розв'яжіть це просте математичне завдання і введіть відповідь. Наприклад, для 1+3 введіть 4.</span>
            <?php 
               $model = new Model_Footer();
               $question = $model->getQuestion();
               echo "<span class=\"question\" id=\"question\" data-id=\"{$question['id']}\">{$question['question']}"." =</span>";
             ?>
            
            <input type="number" maxlength="2" required="" class="answer" name="answer" placeholder="Введіть відповідь" autocomplete="off">
            <button type="submit" id="send-question"><i class="icon-mail-1"></i><span>Надіслати</span></button>
         </form>
       <!--   <i class="icon-spin5 animate-spin"></i>
       <div class="send-msg"></div> -->
      </div>


<!-- MyCounter v.2.0 -->
   <script type="text/javascript" >my_id = 164428;
     my_width = 88;
     my_height = 51;
     my_alt = "MyCounter - счётчик и статистика";
     //</script>
     <script type="text/javascript"
       src="http://scripts.mycounter.ua/counter2.0.js">
  </script>
  <noscript>
     <a target="_blank" href="https://mycounter.ua/"><img
     src="http://get.mycounter.ua/counter.php?id=164428"
     title="MyCounter - счётчик и статистика"
     alt="MyCounter - счётчик и статистика"
     width="88" height="51" border="0" /></a>
  </noscript>
<!--/ MyCounter -->
   </div>

</footer> </span>
<div class="btn-toTop">
         <i class="icon-up-open-big"></i>
      </div>  
      