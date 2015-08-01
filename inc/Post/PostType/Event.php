<?php
/**
 * Summary
 * Description.
 *
 * @since  0.9.0
 * @package
 * @subpackage
 * @author nguyenvanduocit
 */

namespace BuddhistDirectory\Post\PostType;


class Event extends Base{
	public function __construct(){
		parent::__construct('event');
		$this->name = 'Sự kiện';
		$this->singularName = 'Sự kiện';
		$this->description = 'The place for ashrams';
		$this->thumbnail ='http://diadiemphatgiao.com/wp-content/themes/DiaDiemPhatGiao/img/icon-resources.png';
	}
	public function registerPostType() {
		register_post_type( $this->postType,
			array(
				'labels'          => $this->generateLabel(),
				'public'          => TRUE,
				'show_ui'         => TRUE,
				'show_in_menu'    => TRUE,
				'query_var'       => TRUE,
				'hierarchical'    => FALSE,
				'has_archive'     => true,
				'capability_type' => 'post',
				'rewrite'         => array( 'slug' => 'su-kien' ),
				'menu_position'   => NULL,
				'supports'        => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'comments',
					'custom-fields',
					'featured'
				)
			)
		);
	}

	/**
	 * Summary.
	 *
	 * @since    0.9.0
	 * @see
	 *
	 * @param $post
	 *
	 * @return \stdClass
	 * @internal param \WP_Post $postData
	 * @author   nguyenvanduocit
	 */
	public function populate($post) {
		$postData = parent::populate($post);
		$startDatetime = get_post_meta($post->ID, META_EVENT_DATETIME_START, true);
		$endDatetime = get_post_meta($post->ID, META_EVENT_DATETIME_END, true);
		/** @var \DateTime start_datetime */
		$postData->start_datetime = \DateTime::createFromFormat('Y-m-d H:i:s', $startDatetime);
		$postData->end_datetime = \DateTime::createFromFormat('Y-m-d H:i:s', $endDatetime);
		$placeId = get_post_meta($post->ID, META_EVENT_PLACE_ID, true);
		$postData->place = PostFactory()->populate($placeId);

		return $postData;
	}
}