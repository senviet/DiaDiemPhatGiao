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


class Ashrams extends Place {
	public function __construct() {
		parent::__construct( 'ashrams', 'Đạo Tràng', 'Đạo Tràng' );
		$this->thumbnail ='http://diadiemphatgiao.com/wp-content/themes/DiaDiemPhatGiao/img/icon-events.png';
	}

	public function registerPostType() {
		register_post_type( $this->postType,
			array(
				'labels'          => $this->generateLabel(),
				'public'          => TRUE,
				'show_ui'         => TRUE,
				'has_archive'     => true,
				'show_in_menu'    => TRUE,
				'query_var'       => TRUE,
				'hierarchical'    => FALSE,
				'capability_type' => 'post',
				'menu_position'   => NULL,
				'rewrite'            => array( 'slug' => 'dao-trang' ),
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

}