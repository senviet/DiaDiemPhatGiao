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
	protected $imageSizeList;
	public function __construct(){
		$this->imageSizeList = array(
			'card4header'=>array(
				'width'=>369,
				'height'=>150
			),
			'card8right'=>array(
				'width'=>640,
				'height'=>480
			)
		);
	}
	public function addImageSize(){
		foreach($this->imageSizeList as $name=>$size){
			add_image_size($name, $size['width'], $size['height'], true);
		}
	}
}