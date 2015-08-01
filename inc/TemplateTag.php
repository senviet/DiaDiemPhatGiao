<?php
namespace BuddhistDirectory;

/**
 * Summary
 * Description.
 *
 * @since  0.9.0
 * @package
 * @subpackage
 * @author nguyenvanduocit
 */
class TemplateTag {
	private static $instance;

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return \BuddhistDirectory\TemplateTag
	 * @author nguyenvanduocit
	 */
	public static function getInstance(){
		if(static::$instance == null){
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 *
	 * @param $locations
	 *
	 * @return string
	 * @author nguyenvanduocit
	 */
	public function formatLocation($locations){
		$html = array();
		foreach($locations as $location){
			$html[] = sprintf('<a href="%1$s">%2$s</a>', get_term_link($location), $location->name);
		}
		return implode(', ', $html);
	}
}