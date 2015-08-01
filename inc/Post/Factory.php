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

namespace BuddhistDirectory\Post;


/**
 * Class Factory
 * this class store all postype instance
 *
 * @since   0.9.0
 * @access (private, protected, or public)
 * @package BuddhistDirectory\Post
 */
class Factory {
	protected $postTypes;

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 *
	 * @param PostType\Base $instance
	 *
	 * @return void
	 * @author nguyenvanduocit
	 */
	public function add($instance){
		$this->postTypes[$instance->getPostType()] = $instance;
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 *
	 * @param $postType
	 *
	 * @return PostType\Base|null
	 * @author nguyenvanduocit
	 */
	public function get($postType){
		if(array_key_exists($postType, $this->postTypes)){
			return $this->postTypes[$postType];
		}
		return null;
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return PostType\Base[]
	 * @author nguyenvanduocit
	 */
	public function getAll(){
		return $this->postTypes;
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 *
	 * @param $post
	 *
	 * @return null|\stdClass
	 * @author nguyenvanduocit
	 */
	public function populate($post){
		if(is_numeric($post)){
			$post = get_post($post);
		}
		if($post) {
			$postObject = $this->get( $post->post_type );
			if ( $postObject ) {
				return $postObject->populate( $post );
			}
		}
		return null;
	}
}