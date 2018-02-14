<?php 
	foreach ($data["lastNews"] as $news) {
	echo<<<END
				<div class="news-block">
	         <div class="foto">
	            <div class="news-data">
	               <div class="news-data-wrapper">
	                  <i class="icon-calendar-1"></i>
	                  <span>$news->date</span>
	                  <div class="news-data-hr"></div>
	                  <i class="icon-eye-3"></i>
	                  <span>$news->count</span>
	                  <div class="news-data-hr"></div>
	                  <div class="lastnews-likes-panel">
	                  	<div>
												<i class="icon-thumbs-up"></i>
												<span>$news->likes</span>
	                  	</div>
	                  	<div>
												<i class="icon-thumbs-down"></i>
												<span>$news->dislikes</span>
	                  	</div>
	                  </div>
	                  </div>
	            </div>
	            <div class="foto-wrapper">
	               <a href="/news/read?id=$news->id" rel="nofollow">
	               	<img src="/$news->main_image" alt="ДЦПТО - $news->header" title="НОВИНИ | $news->header">
	               </a>
	            </div>
	         </div>
	         <h2>$news->header</h2>
	         <p>$news->content</p>
	         <a href="/news/read?id=$news->id" rel="nofollow">Читати далі</a>
	      </div>
END;
	}
 ?>