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

function BD(){
	global $bd;
	return $bd;
}
function PostFactory(){
	return BD()->getFactory();
}