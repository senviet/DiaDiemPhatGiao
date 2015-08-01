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
 * @since   0.9.0
 * @access (private, protected, or public)
 * @package BuddhistDirectory
 */
class BuddhistDirectory {
	/** @var Post\Controller */
	protected $postControler;
	protected $postFactory;
	/** @var  Image */
	protected $image;

	public function run() {
		$this->postFactory = new Post\Factory();
		$this->image       = new Image();
		add_action( 'init', array( $this, 'onInit' ) );
		add_action( 'after_setup_theme', array( $this, 'afterThemeSetup' ) );
	}

	public function afterThemeSetup() {
		add_theme_support( 'post-thumbnails' );
		$this->image->addImageSize();
	}

	public function onInit() {
		$this->postControler = new Post\Controller();
		$this->postControler->registerPosttype();
		$this->postControler->registerTaxonomy();
	}

	/**
	 * Summary.
	 *
	 * @since  0.9.0
	 * @see
	 * @return Post\Factory
	 * @author nguyenvanduocit
	 */
	public function getFactory() {
		return $this->postFactory;
	}
}