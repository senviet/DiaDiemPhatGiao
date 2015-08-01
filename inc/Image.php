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

namespace BuddhistDirectory;


class Image {
	private static $instance;
	protected $imageSizeList;

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return \BuddhistDirectory\Image
	 * @author nguyenvanduocit
	 */
	public static function getInstance(){
		if(static::$instance == null){
			static::$instance = new static();
		}
		return static::$instance;
	}
	public function __construct(){
		$this->imageSizeList = array(
			'card4header'=>array(
				'width'=>369,
				'height'=>150
			),
			'card8right'=>array(
				'width'=>441,
				'height'=>330
			)
		);
	}
	public function addImageSize(){
		foreach($this->imageSizeList as $name=>$size){
			add_image_size($name, $size['width'], $size['height'], true);
		}
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 *
	 * @param $thumbnailID
	 * @param $size
	 *
	 * @return string
	 * @author nguyenvanduocit
	 */
	public function getFeaturedImageSrc($thumbnailID, $size){
		$sizeDetail = $this->imageSizeList[$size];
		$imageSrc = 'https://placeholdit.imgix.net/~text?txtsize=33&txt=Placeholder&w='.$sizeDetail['width'].'&h='.$sizeDetail['height'];
		$thumbnail = wp_get_attachment_image_src( $thumbnailID, $size );
		if($thumbnail){
			$imageSrc = $thumbnail[0];
		}
		return $imageSrc;
	}
}