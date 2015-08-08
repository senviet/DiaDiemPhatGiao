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


class News extends Base{
	public function __construct(){
		parent::__construct('news','Tin Tức', 'Tin Tức');
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
				'has_archive'     => true,
				'query_var'       => TRUE,
				'hierarchical'    => FALSE,
				'capability_type' => 'post',
				'rewrite'            => array( 'slug' => 'tin-tuc' ),
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