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
		<div class="article-description">
			<p class="location">
				<?php _e($postData->place->title) ?>, <span class="location"><?php echo TemplateTag()->formatLocation($postData->place->location); ?></span>
			</p>
			<p><?php _e($postData->description); ?></p>
		</div>
		<a href="<?php _e(get_permalink()) ?>" class="article-link text-color">XEM THÊM</a>
	</div>
</article>