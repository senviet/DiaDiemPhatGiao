<?php
global $wp_query;
$event = PostFactory()->populate($post);
?>
<article class="article-4 event <?php if( ($wp_query->current_post+1)%3!==0){echo 'nrm';}else{echo 'nrm-d';}; ?>">
	<div class="image-container" style="background-image: url('<?php _e($event->thumbnailURL) ?>');">
		<p class="date"><?php _e($event->start_datetime->format('d')); ?> - <?php _e($event->end_datetime->format('d')); ?></p>
		<p class="month"><?php _e($event->start_datetime->format('d/m')); ?> - <?php _e($event->end_datetime->format('d/m')); ?></p>
	</div>
	<div class="article-content">
		<h3 class="article-heading text-color"><?php _e($event->title); ?></h3>
		<p class="article-description"><?php _e($event->place->title) ?></p>
		<a href="<?php _e(get_permalink()) ?>" class="article-link text-color">THAM GIA NGAY</a>
	</div>
</article>