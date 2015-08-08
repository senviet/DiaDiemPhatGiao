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


class Eatery extends Place{
	public function __construct(){
		parent::__construct('eatery','Quán ăn', 'Quán ăn');
		$this->thumbnail ='http://diadiemphatgiao.com/wp-content/themes/DiaDiemPhatGiao/img/icon-resources.png';
	}
	public function registerPostType() {
		register_post_type( $this->postType,
			array(
				'labels'          => $this->generateLabel(),
				'public'          => TRUE,
				'has_archive'     => true,
				'show_ui'         => TRUE,
				'show_in_menu'    => TRUE,
				'query_var'       => TRUE,
				'hierarchical'    => FALSE,
				'capability_type' => 'post',
				'rewrite'            => array( 'slug' => 'quan-com' ),
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
}