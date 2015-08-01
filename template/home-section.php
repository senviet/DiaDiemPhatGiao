<?php
$postTypeList = PostFactory()->getAll();
$sectionTypes = array('events', 'resources', 'spotlight');
foreach($postTypeList as $postType): ?>
	<?php
	global $wp_query;
	$args = array(
		'post_type'      => $postType->getPostType(),
		'paged'          => 1,
		'posts_per_page' => 3,
		'post_status'    => array( 'publish' )
	);
	$wp_query = new WP_Query( $args );
	if(have_posts()):?>
	<section class="<?php echo $sectionTypes[array_rand($sectionTypes)]; ?> home-section">
		<div class="color-block section-color"></div>
		<div class="container">
			<?php the_post(); ?>
			<div class="row lead-row">
				<div class="section-title-container">
					<div class="section-title-text">
						<h2 class="section-title" id="events"><?php _e($postType->getName()); ?></h2>
						<p class="section-subtitle"><?php _e($postType->getDescription()); ?></p>
					</div>
					<img src="<?php _e($postType->getThumbnail()); ?>" alt="Events Calendar Icon" class="section-icon">
				</div>
				<?php get_template_part('template/content-lead', $postType->getPostType()); ?>
			</div>
			<div class="row section-row">
				<?php
					while(have_posts()):the_post();
						get_template_part('template/content-listitem',  $postType->getPostType());
					endwhile;
				?>
			</div>
			<div class="row">
				<a href="<?php _e(get_post_type_archive_link($postType->getPostType())); ?>" class="link-all">
					<span class="link-all-text text-color">XEM TẤT CẢ <?php _e($postType->getName()); ?></span>
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="43px" height="43px" viewBox="0 0 43 43" enable-background="new 0 0 43 43" xml:space="preserve">
                        <g>
	                        <path class="chevron fill-color" fill="#38A4DD" d="M25.354,21.834l-5.729,5.523c-0.098,0.094-0.214,0.142-0.348,0.142c-0.134,0-0.25-0.047-0.348-0.142
                                l-1.282-1.235c-0.098-0.095-0.147-0.207-0.147-0.335c0-0.129,0.049-0.241,0.147-0.335l4.1-3.953l-4.1-3.953
                                c-0.098-0.094-0.147-0.206-0.147-0.335c0-0.129,0.049-0.241,0.147-0.335l1.282-1.236c0.098-0.094,0.214-0.142,0.348-0.142
                                c0.133,0,0.25,0.047,0.348,0.142l5.729,5.523c0.098,0.095,0.146,0.207,0.146,0.335C25.5,21.629,25.451,21.741,25.354,21.834z"/>
                        </g>
						<path class="circle" fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#374850" stroke-width="3" stroke-miterlimit="10" d="M21.5,1.5
                            c11.046,0,20,8.955,20,20s-8.954,20-20,20s-20-8.954-20-20S10.454,1.5,21.5,1.5z"/>
                    </svg>
				</a>
			</div>

		</div>
	</section>
		<?php
	endif;
	wp_reset_postdata();
	?>
<?php endforeach; ?>