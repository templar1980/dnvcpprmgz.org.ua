<!DOCTYPE html>

<body itemscope itemtype="http://schema.org/Product">

   <div class="header-overlay"></div>
   <div class="main" id="top">
      <div class="content">
         <?php 
         if ($content_view) {
            require 'app/views/'.$content_view; 
         };
         ?>      
      </div>
   </div>
</div> 
</body>
</html>
