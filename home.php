<?php
get_header();
?>

<?php
	get_template_part('template/intro-section');
	get_template_part('template/home-section-event');
	get_template_part('template/home-section-temple');
?>
<div class="photo-strip" style="background-image: url('<?php _e(get_template_directory_uri()) ?>/img/photo-strip-home.jpg');"></div>
<?php  get_footer(); ?>