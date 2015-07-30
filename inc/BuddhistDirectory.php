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


/**
 * Class BuddhistDirectory
 * The main class for project

 *
*@since   0.9.0
 * @access (private, protected, or public)
 * @package BuddhistDirectory
 */
class BuddhistDirectory {
	/** @var Post\Controller  */
	protected $postControler;
	protected $postFactory;
	public function run() {
		$this->postFactory = new Post\Factory();
		add_action('init', array($this, 'onInit'));
	}
	public function onInit(){
		$this->postControler = new Post\Controller();
		$this->postControler->registerPosttype();
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return Post\Factory
	 * @author nguyenvanduocit
	 */
	public function getFactory(){
		return $this->postFactory;
	}
}