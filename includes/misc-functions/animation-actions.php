<?php
/**
 * Filter Animation Output for Brick Backgrounds
 */
function mp_stacks_animation_animate_background( $default_content_output, $post_id ){

	$animation_js_output = NULL;

	//Check if this brick is set to have Content-Type 1's WayPoint animation "on"
	$waypoint_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_bg_waypoint_animation_on', false );

	//If the WayPoint animation is set to be "On"
	if ( $waypoint_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'bg_waypoint_animation_keyframes', array() );

		$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_bg_waypoint_animation_reverse_upon_out', false );

		//Disable any Shadows because they lag in the browser
		$animation_js_output .= '

		var mp_stacks_shadows_active;

		jQuery(document).ready(function($){
			$( ".mp-stacks-shadows-css-tag" ).remove();
			mp_stacks_shadows_active = false;
		});

		';

		//Get JS output to animate this content type upon page load
		$animation_js_output .= mp_core_js_waypoint_animate_child( '#mp-brick-' . $post_id , '.mp-brick-bg-inner', $waypoint_animation_repeater, $reverse_upon_out_of_view, false );
	}

	//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
	$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_bg_mouseover_animation_on', false );

	//If the Mouse Over animation is set to be "On"
	if ( $mouseover_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'bg_mouseover_animation_keyframes', array() );

		//Get JS output to animate this content type upon page load
		$animation_js_output .= mp_core_js_mouse_over_animate_child( '#mp-brick-' . $post_id, ' .mp-brick-bg-inner', $mouseover_animation_repeater, true, false, 'mp-brick-' . $post_id );
	}

	//Pull in the existing MP Stacks inline js string which is output the Footer.
	global $mp_stacks_footer_inline_js;
	$mp_stacks_footer_inline_js[ 'mp-stacks-animation-js-background-' . $post_id ] = $animation_js_output;

	return $default_content_output;

}
add_filter('mp_brick_background_content', 'mp_stacks_animation_animate_background', 11, 3);

/**
 * Filter Animation Output for Both Content-Types
 */
function mp_stacks_animation_animate_content_types( $default_content_output, $post_id ){

	$js_output = NULL;

	//Check if this brick is set to have Content-Type 1's WayPoint animation "on"
	$ct_1_waypoint_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_waypoint_animation_on', false );

	//If the WayPoint animation is set to be "On"
	if ( $ct_1_waypoint_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'ct1_waypoint_animation_keyframes', array() );

		$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_waypoint_animation_reverse_upon_out', false );

		//Get JS output to animate this content type upon page load
		$js_output .= mp_core_js_waypoint_animate( '#mp-brick-' . $post_id . '-first-content-type-container', $waypoint_animation_repeater, $reverse_upon_out_of_view, false );
	}

	//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
	$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_mouseover_animation_on', false );

	//If the Mouse Over animation is set to be "On"
	if ( $mouseover_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'ct1_mouseover_animation_keyframes', array() );

		//Get JS output to animate this content type upon page load
		$js_output .= mp_core_js_mouse_over_animate( '#mp-brick-' . $post_id . '-first-content-type-container', $mouseover_animation_repeater, true, false );
	}

	//Check if this brick is set to have Content-Type 1's WayPoint animation "on"
	$ct_2_waypoint_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_waypoint_animation_on', false );

	//If the animation is not set to be "On", get out of here.
	if ( $ct_2_waypoint_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'ct2_waypoint_animation_keyframes', array() );

		$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_waypoint_animation_reverse_upon_out', false );

		//Get JS output to animate this content type upon page load
		$js_output .= mp_core_js_waypoint_animate( '#mp-brick-' . $post_id . '-second-content-type-container', $waypoint_animation_repeater, $reverse_upon_out_of_view, false );

	}

	//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
	$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_mouseover_animation_on', false );

	//If the Mouse Over animation is set to be "On"
	if ( $mouseover_animation_on ){

		//Enqueue velocity JS
		wp_enqueue_script( 'velocity_js', MP_CORE_JS_SCRIPTS_URL . 'velocity.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		//Enqueue Waypoints JS
		wp_enqueue_script( 'waypoints_js', MP_CORE_JS_SCRIPTS_URL . 'waypoints.min.js', array( 'jquery' ), MP_STACKS_ANIMATION_VERSION );

		$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'ct2_mouseover_animation_keyframes', array() );

		//Get JS output to animate this content type upon page load
		$js_output .= mp_core_js_mouse_over_animate( '#mp-brick-' . $post_id . '-second-content-type-container', $mouseover_animation_repeater, true, false );
	}

	//Pull in the existing MP Stacks inline js string which is output the Footer.
	global $mp_stacks_footer_inline_js;
	$mp_stacks_footer_inline_js[ 'mp-stacks-animation-content-types-' . $post_id ] = $js_output;

	return $default_content_output;

}
add_filter('mp_stacks_brick_meta_output', 'mp_stacks_animation_animate_content_types', 10, 2 );
