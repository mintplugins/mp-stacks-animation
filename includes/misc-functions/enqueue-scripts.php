<?php
/**
 * This file contains the enqueue scripts function for the MP Stacks + Animation plugin
 *
 * @since 1.0.0
 *
 * @package    MP Stacks + Animation
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2015, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Enqueue JS and CSS for MP Stacks + Animation 
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_animation_css_location
 */
function mp_stacks_animation_enqueue_scripts(){
	
	//Enqueue velocity JS
	wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );
	
	//Enqueue Waypoints JS
	wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

}
add_action( 'wp_enqueue_scripts', 'mp_stacks_animation_enqueue_scripts' );