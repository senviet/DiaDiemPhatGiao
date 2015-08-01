<?php
/**
 * Functions file
 * This file for define and call main class.
 *
 * @since  0.9.0
 * @package
 * @subpackage
 * @author nguyenvanduocit
 */

define('BD_VERSION', '1.0.0');
define('BD_FILE', __FILE__);
define('BD_DIR', __DIR__);
define('TEMPLATEURI', get_template_directory_uri());
define('BD_DOMAIN', 'bd_domain');

require_once BD_DIR.'/vendor/autoload.php';
require_once BD_DIR.'/inc/const.php';
require_once BD_DIR.'/inc/alias_functions.php';

/*if (!class_exists( 'ReduxFramework' )) {
	require_once( BD_DIR . '/inc/Redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo )){
	require_once( BD_DIR . '/inc/Redux/config/config.php' );
}*/
global $bd;
$bd = new \BuddhistDirectory\BuddhistDirectory();
$bd->run();