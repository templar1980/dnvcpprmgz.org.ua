<!-- user-scalable=no -->
<?php
echo <<<END
<!DOCTYPE html>
<html lang="uk">
<head>
   <meta charset="UTF-8">
   <meta name="description" content="{$description}">
   <meta name="keywords" content="{$keywords}">
   <meta name="viewport" content="width=device-width, maximum-scale=1.0">
END;
if ($noindex) {
   echo '<meta name="robots" content="noindex">';
}
else {
      echo<<<END
      <!-- Разметка JSON-LD, созданная Мастером разметки структурированных данных Google. -->
      <script type="application/ld+json">
      {
        "@context" : "http://schema.org",
        "@type" : "LocalBusiness",
        "name" : "дніпровський центр професійно-технічної освіти",
        "image" : "http://dnvcpprmgz.org.ua/img/logo.png",
        "telephone" : "+38(096) 195-14-17 +38(095) 332-36-79",
        "email" : "dneprnvc@ukr.net"
      }
      </script>
END;
}

if (!empty($meta)) {
   foreach ($meta as $row) {
      echo $row;
   };
}

echo <<<END
   <title>{$title}</title>
   <link rel="shortcut icon" href="/img/gear.ico">

   <link rel="stylesheet" href="/fonts/awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="/fonts/css/fontello.css" >
   <link rel="stylesheet" href="/css/_link.css">
   <script src="/js/_link.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
END;

   // <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
   // <link rel="stylesheet" href="/fonts/css/animation.css">
   // <script src="/js/jquery.js"></script>
   // <script src="/js/jquery.cookie.js"></script>
   
   echo '<link rel="stylesheet" href="'.View::linkStamp('/css/header.css').'">';
   echo  '<link rel="stylesheet" href="'.View::linkStamp('/css/home.css').'">';
   echo  '<link rel="stylesheet" href="'.View::linkStamp('/css/main.css').'">';
   echo  '<link rel="stylesheet" href="'.View::linkStamp('/css/static_page.css').'">';
   echo '<link rel="stylesheet" href="'.View::linkStamp('/css/footer.css').'">';
    if (!empty($css)) {
       foreach ($css as $row) {
          $link = View::linkStamp($row);
          echo "<link rel=\"stylesheet\" href=\"{$link}\">";
       };
    };
    if ( file_exists('./css/mobile.css') ) {
       echo  '<link rel="stylesheet" href="'.View::linkStamp('/css/mobile.css').'">';
     };
    

    if (!empty($js)) {
       foreach ($js as $row) {
          $link = View::linkStamp($row);
          echo "<script src=\"{$link}\"></script>";
       };
    }
   echo '<script src="'.View::linkStamp('/js/mobile.js').'"> </script>';
   echo '<script src="'.View::linkStamp('/js/sidebar-controls.js').'"> </script>';
   echo '<script src="'.View::linkStamp('/js/clock.js').'"> </script>';
   echo '<script src="'.View::linkStamp('/js/object.js').'"> </script>';
echo '<!--[if lt IE 9]>';
echo '<script src="//html5sniv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
echo '</head>';
?>

