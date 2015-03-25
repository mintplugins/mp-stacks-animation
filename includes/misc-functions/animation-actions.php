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
		$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'bg_waypoint_animation_keyframes', array() );
	
		$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_bg_waypoint_animation_reverse_upon_out', false );
		
		//Disable any Shadows because they lag in the browser
		$animation_js_output .= '
			<script type="text/javascript">
				
				var mp_stacks_shadows_active;
								
				jQuery(document).ready(function($){ 
					$( ".mp-stacks-shadows-css-tag" ).remove();
					mp_stacks_shadows_active = false;
				});
			
			</script>';
		
		//Get JS output to animate this content type upon page load
		$animation_js_output .= mp_core_js_waypoint_animate_child( '#mp-brick-' . $post_id , '.mp-brick-bg-inner', $waypoint_animation_repeater, $reverse_upon_out_of_view ); 
	}
	
	//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
	$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_bg_mouseover_animation_on', false );
	
	//If the Mouse Over animation is set to be "On"
	if ( $mouseover_animation_on ){
		$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'bg_mouseover_animation_keyframes', array() );
				
		//Get JS output to animate this content type upon page load
		$animation_js_output .= mp_core_js_mouse_over_animate_child( '#mp-brick-' . $post_id, ' .mp-brick-bg-inner', $mouseover_animation_repeater, false ); 
	}
	
	return $default_content_output . $animation_js_output;
		
}
add_filter('mp_brick_background_content', 'mp_stacks_animation_animate_background', 11, 3);

/**
 * Filter Animation Output for Both Content-Types
 */
function mp_stacks_animation_animate_content_types( $default_content_output, $mp_stacks_content_type, $post_id ){
	
	global $mp_stacks_animation_ct_number, $mp_stacks_footer_inline_js;
	
	//If this is Content Type 1
	if ( empty( $mp_stacks_animation_ct_number[$post_id] ) ){
		$mp_stacks_animation_ct_number[$post_id] = 1;	
		
		//Disable any Shadows because they lag in the browser
		$mp_stacks_footer_inline_js .= '
		<script type="text/javascript">
							
			jQuery(document).ready(function($){ 
				
				var mp_stacks_shadows_active;
				
				$( document ).on( \'mp_core_animation_start\', function(){ 
					// Remove the css shadow from the tag area temporarily from all bricks
					$( ".mp-stacks-shadows-css-tag" ).remove(); 
					mp_stacks_shadows_active = false;
				});
				$( document ).on( "mp_core_animation_end", function(){ 
					
					mp_stacks_shadows_active = true;
					
					//Wait for 1 full second to make sure another animation hasn\'t triggered before we add shadows back
					var mp_stacks_shadows_waiter = setInterval(function(){ 
						
						if ( mp_stacks_shadows_active ){
							
							clearInterval(mp_stacks_shadows_waiter);
							
							//Remove the css in case we already added it
							$( "#mp-stacks-shadows-css-tag-ct1-' . $post_id . '").remove();
							// Put the Shadow CSS back in the 1st CT style tag
							$( "#mp-stacks-shadows-temp-css-ct1-' . $post_id  . '" ).before( \'<style type="text/css" scoped id="mp-stacks-shadows-css-tag-ct1-' . $post_id . '" class="mp-stacks-shadows-css-tag">\' + $( "#mp-stacks-shadows-temp-css-ct1-' . $post_id  . '" ).html() + \'</style>\'); 
							
						}
						
					}, 1000);
				});
			});
			
		</script>';
		
		//Check if this brick is set to have Content-Type 1's WayPoint animation "on"
		$waypoint_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_waypoint_animation_on', false );
		
		//If the WayPoint animation is set to be "On"
		if ( $waypoint_animation_on ){
			$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'ct1_waypoint_animation_keyframes', array() );
		
			$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_waypoint_animation_reverse_upon_out', false );
			
			//Get JS output to animate this content type upon page load
			$mp_stacks_footer_inline_js .= mp_core_js_waypoint_animate( '#mp-brick-' . $post_id . '-first-content-type-container', $waypoint_animation_repeater, $reverse_upon_out_of_view ); 
		}
		
		//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
		$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct1_mouseover_animation_on', false );
		
		//If the Mouse Over animation is set to be "On"
		if ( $mouseover_animation_on ){
			$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'ct1_mouseover_animation_keyframes', array() );
					
			//Get JS output to animate this content type upon page load
			$mp_stacks_footer_inline_js .= mp_core_js_mouse_over_animate( '#mp-brick-' . $post_id . '-first-content-type-container', $mouseover_animation_repeater ); 
		}
		
		return $default_content_output;
		
	}
	//If this is Content Type 2
	else{
		$mp_stacks_animation_ct_number[$post_id] = 2;	
				
		//Disable any Shadows because they lag in the browser
		$mp_stacks_footer_inline_js .= '
		<script type="text/javascript">
							
			jQuery(document).ready(function($){ 
				
				var mp_stacks_shadows_active;
				
				$( document ).on( \'mp_core_animation_start\', function(){ 
					// Remove the css shadow from the tag area temporarily from all bricks
					$( ".mp-stacks-shadows-css-tag" ).remove(); 
					mp_stacks_shadows_active = false;
				});
				$( document ).on( "mp_core_animation_end", function(){ 
					
					mp_stacks_shadows_active = true;
					
					//Wait for 1 full second to make sure another animation hasn\'t triggered before we add shadows back
					var mp_stacks_shadows_waiter = setInterval(function(){ 
						
						if ( mp_stacks_shadows_active ){
							
							clearInterval(mp_stacks_shadows_waiter);
							
							//Remove the css in case we already added it
							$( "#mp-stacks-shadows-css-tag-ct2-' . $post_id . '").remove();
							// Put the Shadow CSS back in the 2nd CT style tag
							$( "#mp-stacks-shadows-temp-css-ct2-' . $post_id  . '" ).before( \'<style type="text/css" scoped id="mp-stacks-shadows-css-tag-ct2-' . $post_id . '" class="mp-stacks-shadows-css-tag">\' + $( "#mp-stacks-shadows-temp-css-ct2-' . $post_id  . '" ).html() + \'</style>\'); 
							
						}
						
					}, 1000);
				});
			});
			
		</script>';
		
		//Check if this brick is set to have Content-Type 1's WayPoint animation "on"
		$waypoint_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_waypoint_animation_on', false );
		
		//If the animation is not set to be "On", get out of here.
		if ( $waypoint_animation_on ){
			
			$waypoint_animation_repeater = mp_core_get_post_meta( $post_id, 'ct2_waypoint_animation_keyframes', array() );
			
			$reverse_upon_out_of_view = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_waypoint_animation_reverse_upon_out', false );
						
			//Get JS output to animate this content type upon page load
			$mp_stacks_footer_inline_js .= mp_core_js_waypoint_animate( '#mp-brick-' . $post_id . '-second-content-type-container', $waypoint_animation_repeater, $reverse_upon_out_of_view ); 
		
		}
		
		//Check if this brick is set to have Content-Type 1's MouseOver animation "on"
		$mouseover_animation_on = mp_core_get_post_meta_checkbox( $post_id, 'brick_ct2_mouseover_animation_on', false );
		
		//If the Mouse Over animation is set to be "On"
		if ( $mouseover_animation_on ){
			$mouseover_animation_repeater = mp_core_get_post_meta( $post_id, 'ct2_mouseover_animation_keyframes', array() );
					
			//Get JS output to animate this content type upon page load
			$mp_stacks_footer_inline_js .= mp_core_js_mouse_over_animate( '#mp-brick-' . $post_id . '-second-content-type-container', $mouseover_animation_repeater ); 
		}
		
		return $default_content_output;
		
	}
		
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_animation_animate_content_types', 11, 3);
