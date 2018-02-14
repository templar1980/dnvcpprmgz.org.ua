<?php 
$src = $_GET['src'];
echo<<<END
<span><i class="icon-youtube-play"></i>Ми на каналі youtube</span>
<iframe width="100%" height="250" src="{$src}" frameborder="0" allowfullscreen style="margin-bottom: 10px" id="last-youtube-video"></iframe>
<script src="https://apis.google.com/js/platform.js"></script>
<div class="g-ytsubscribe" data-channelid="UCm8p2XTbLVcMAfM_QCJ2A6Q" data-layout="full" data-count="default" data-theme="dark"></div>
END;
 ?>