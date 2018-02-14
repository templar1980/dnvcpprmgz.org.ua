<!DOCTYPE html>

<body>

   <div class="header-overlay">
   </div>
   <!-- <div class="new-year-line"></div> -->
   <div class="main" id="top">
      <?php 
         require 'templates/header.php';
         $arrImg = ['fon-1', 'fon-2'];
         $img = array_rand($arrImg,1);
echo<<<END
  <picture>
    <source srcset="/img/pages/_header/{$arrImg[$img]}_s.jpg" media="(max-width:750px)"> 
    <img src="/img/pages/_header/{$arrImg[$img]}.jpg" title="" alt="" class="main-img">
  </picture>
END;
         // echo "<img src=\"/img/pages/_header//{$arrImg[$img]}.jpg\" alt=\"\" class=\"main-img\">";
      ?>
      
      <!-- <link rel="stylesheet" href="../CSS/slider.css"> -->
      <div class="main-wrapper">
         <?php require 'templates/sidebar.php'; ?>  
         <div class="content">
            <?php 
            if ($content_view) {
               require 'app/views/'.$content_view; 
            };
            ?>      
         </div>
      </div>
      <?php require 'templates/footer.php'; ?>
   </div>
</div> 
</body>
</html>
