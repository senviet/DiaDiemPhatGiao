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


/**
 * Class Base
 * This is the base class for all posttype
 *
 * @since   0.9.0
 * @access (private, protected, or public)
 * @package BuddhistDirectory\Post
 */
abstract class Place extends Base{

	public function populate($post) {
		$postData = parent::populate($post);
		$postData->location = wp_get_post_terms($post->ID, 'location', array("fields" => "all"));
		return $postData;
	}
}