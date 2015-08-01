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

namespace BuddhistDirectory\Post\Taxonomy;


class Location {
	public function register(){
		$postTypes = PostFactory()->getAll();
		register_taxonomy(
			'location',
			array_keys($postTypes),
			array( 'hierarchical' => true,
			       'label' => 'Location',
			       'rewrite' => array( 'slug' => 'dia-chi' )
			)
		);
	}
}