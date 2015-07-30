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
 * Class Controller
 * This class control the post
 *
 * @since   0.9.0
 * @access (private, protected, or public)
 * @package BuddhistDirectory\Post
 */
class Controller {
	protected $postTypeList;

	public function __construct() {
		$this->postTypeList = apply_filters( 'bd_posttype_list', array(
			'\BuddhistDirectory\Post\PostType\Ashrams',
			'\BuddhistDirectory\Post\PostType\Eatery',
			'\BuddhistDirectory\Post\PostType\Restaurant',
			'\BuddhistDirectory\Post\PostType\Store',
			'\BuddhistDirectory\Post\PostType\Temple',
			'\BuddhistDirectory\Post\PostType\Event',
			'\BuddhistDirectory\Post\PostType\News',
		) );
	}

	public function registerPosttype() {
		$postFactory = PostFactory();
		foreach($this->postTypeList as $postTypeClassPath){
			if (class_exists($postTypeClassPath)){
				/** @var PostType\Base $loadedClass */
				$loadedClass = new $postTypeClassPath();
				$loadedClass->registerPostType();
				$postFactory->add($loadedClass);
			}
		}
	}
}