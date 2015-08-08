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
abstract class Base {
	protected $postType;
	protected $name;
	protected $singularName;
	protected $thumbnail;
	protected $populateFields;

	/**
	 * @param string $postType
	 * @param string $singularName Singulare name
	 * @param string $name
	 * @param string $description
	 * @param string $thumbnail
	 */
	public function __construct($postType, $singularName = '', $name = '', $thumbnail='', $populateFields = array()){
		$this->postType = $postType;
		$this->name = $name;
		$this->singularName = $singularName;
		$this->thumbnail=$thumbnail;
		$this->populateFields = $populateFields;
	}
	abstract  public function registerPostType();

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return string
	 * @author nguyenvanduocit
	 */
	public function getPostType() {
		return $this->postType;
	}
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getSingularName() {
		return $this->singularName;
	}

	/**
	 * @param string $singularName
	 */
	public function setSingularName( $singularName ) {
		$this->singularName = $singularName;
	}


	/**
	 * @return mixed
	 */
	public function getThumbnail() {
		return $this->thumbnail;
	}

	/**
	 * @param mixed $thumbnail
	 */
	public function setThumbnail( $thumbnail ) {
		$this->thumbnail = $thumbnail;
	}

	/**
	 * @return array
	 */
	public function getPopulateFields() {
		return $this->populateFields;
	}

	/**
	 * @param array $populateFields
	 */
	public function setPopulateFields( $populateFields ) {
		$this->populateFields = $populateFields;
	}

	/**
	 * Generate the label for postype.
	 *
	 * @since  0.9.0
	 * @see
	 * @return string[]
	 * @author nguyenvanduocit
	 */
	protected function generateLabel(){
		$label = array(
			'name' => _x($this->name, 'post type general name'),
			'singular_name' => _x($this->singularName, 'post type singular name'),
			'add_new' => _x('Add New', 'post'),
			'add_new_item' => __('Add New '.$this->singularName),
			'edit_item' => __('Edit '.$this->singularName),
			'new_item' =>  __('New '.$this->singularName),
			'view_item' =>  __('View '.$this->name),
			'search_items' =>  __('Search '.$this->name),
			'not_found' =>  __('No '.$this->name.' found.'),
			'not_found_in_trash' =>  __('No '.$this->name.' found in Trash.'),
			'all_items' => __( 'All '.$this->name )
		);
		return $label;
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
	 * @author   nguyenvanduocit
	 */
	public function populate($post){
		if(is_numeric($post)){
			$post = get_post($post);
		}
		if($post instanceof \WP_Post) {
			$postData                 = new \stdClass();
			$postData->ID             = $post->ID;
			$postData->title          = $post->post_title;
			$postData->description    = $post->post_excerpt;
			$postData->content        = $post->post_content;
			$postData->published_date = $post->post_date;
			$postData->modified_date  = $post->post_modified;
			$postData->thumbnailID    = get_post_thumbnail_id( $post->ID );
			$postData->thumbnailURL = Image()->getFeaturedImageSrc($postData->thumbnailID, 'card4header');;

			return $postData;
		}
		return null;
	}
}