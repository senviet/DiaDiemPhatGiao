<?php
$postData = PostFactory()->populate($post);
?>
<article class="article-8 lead-section video">
	<div class="right">
		<div class="video-container">
			<img class="video-iframe" src="<?php _e($postData->thumbnailURL) ?>" alt="">
		</div>
	</div>
	<div class="left">
		<h3 class="article-heading text-color"><?php _e($postData->title); ?></h3>
		<p class="article-description"><?php _e($postData->description); ?></p>
		<a href="<?php _e(get_permalink()) ?>" class="article-link text-color">XEM THÊM</a>
	</div>
</article>