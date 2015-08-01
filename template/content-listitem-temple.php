<?php
global $wp_query;
$temple = PostFactory()->populate($post);
?>
<article class="article-4 event <?php if( ($wp_query->current_post+1)%3!==0){echo 'nrm';}else{echo 'nrm-d';}; ?>">
	<div class="image-container" style="background-image: url('<?php _e($temple->thumbnailURL) ?>');"></div>
	<div class="article-content">
		<h3 class="article-heading text-color"><?php _e($temple->title); ?></h3>
		<p class="article-description">Mexico City, Mexico</p>
		<a href="<?php _e(get_permalink()) ?>" class="article-link text-color">XEM THÊM</a>
	</div>
</article>