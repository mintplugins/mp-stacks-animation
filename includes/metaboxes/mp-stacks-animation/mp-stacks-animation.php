<?php
/**
 * This page contains the functions to make a metabox for Animation
 *
 * @link http://mintplugins.com/doc/metabox-class/
 * @since 1.0.0
 *
 * @package    MP Stacks + Animation
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2015, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Function which creates new Meta Box
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/metabox-class/
 * @see      MP_CORE_Metabox
 * @return   void
 */
function mp_stacks_animation_create_meta_box(){	
	
	//Array which stores all info about the new metabox
	$mp_stacks_animation_add_meta_box = array(
		'metabox_id' => 'mp_stacks_animation_metabox', 
		'metabox_title' => __( 'Animation Settings', 'mp_stacks'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'side', 
		'metabox_priority' => 'low' ,
		'metabox_load_content_when_opened' => true
	);
	
	//Array which stores all info about the options within the metabox
	$mp_stacks_animation_items_array = array(
		
		'brick_ct1_animation_showhider' => array(
			'field_id'			=> 'brick_ct1_animation_showhider',
			'field_title' 	=> __( 'Content-Type 1\'s Animation', 'mp_stacks_animation'),
			'field_description' 	=> 'Set the Animation for Content-Type 1.',
			'field_type' 	=> 'showhider',
			'field_value' => '0',
		),
			
			//Waypoint animation for Content-Type 1
			'brick_ct1_waypoint_animation_showhider' => array(
				'field_id'			=> 'brick_ct1_waypoint_animation_showhider',
				'field_title' 	=> __( 'Animation Upon In-View', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_ct1_animation_showhider',
			),
				
				'brick_ct1_waypoint_animation_on' => array(
					'field_id'			=> 'brick_ct1_waypoint_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
		
				'ct1_waypoint_animation_repeater_title' => array(
					'field_id'			=> 'ct1_waypoint_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				'ct1_waypoint_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'ct1_waypoint_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe.', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				'ct1_waypoint_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				'ct1_waypoint_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				'ct1_waypoint_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				'ct1_waypoint_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'ct1_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
				
				'brick_ct1_waypoint_animation_reverse_upon_out' => array(
					'field_id'			=> 'brick_ct1_waypoint_animation_reverse_upon_out',
					'field_title' 	=> __( 'Reverse animation when this Brick goes out-of-view?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct1_waypoint_animation_showhider',
				),
			array(
				'field_id'			=> 'brick_ct1_mouseover_animation_showhider',
				'field_title' 	=> __( 'Animation Upon Mouse-Over', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_ct1_animation_showhider',
			),
				//Mouse-Over Animation for Content Type 1
				'brick_ct1_mouseover_animation_on' => array(
					'field_id'			=> 'brick_ct1_mouseover_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_repeater_title' => array(
					'field_id'			=> 'ct1_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'ct1_mouseover_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
				'ct1_mouseover_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'ct1_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct1_mouseover_animation_showhider',
				),
		array(
			'field_id'			=> 'brick_ct2_animation_showhider',
			'field_title' 	=> __( 'Content-Type 2\'s Animation', 'mp_stacks_animation'),
			'field_description' 	=> 'Set the Animation for Content-Type 2.',
			'field_type' 	=> 'showhider',
			'field_value' => '0',
		),
				
			'brick_ct2_waypoint_animation_showhider' => array(
				'field_id'			=> 'brick_ct2_waypoint_animation_showhider',
				'field_title' 	=> __( 'Animation Upon In-View', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_ct2_animation_showhider',
			),
				
				//Page-Load Animation for Content Type 2
				'brick_ct2_waypoint_animation_on' => array(
					'field_id'			=> 'brick_ct2_waypoint_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_repeater_title' => array(
					'field_id'			=> 'ct2_waypoint_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'ct2_waypoint_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				'ct2_waypoint_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'ct2_waypoint_animation_keyframes',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
				
				'brick_ct2_waypoint_animation_reverse_upon_out' => array(
					'field_id'			=> 'brick_ct2_waypoint_animation_reverse_upon_out',
					'field_title' 	=> __( 'Reverse animation when this Brick goes out-of-view?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct2_waypoint_animation_showhider',
				),
			array(
				'field_id'			=> 'brick_ct2_mouseover_animation_showhider',
				'field_title' 	=> __( 'Animation Upon Mouse-Over', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_ct2_animation_showhider',
			),
				
				//Mouse Over Animation for Content Type 2
				'brick_ct2_mouseover_animation_on' => array(
					'field_id'			=> 'brick_ct2_mouseover_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_repeater_title' => array(
					'field_id'			=> 'ct2_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'ct2_mouseover_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
				'ct2_mouseover_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'ct2_mouseover_animation_keyframes',
					'field_showhider' => 'brick_ct2_mouseover_animation_showhider',
				),
		
		//Background Animation Showhider	
		'brick_bg_animation_showhider' => array(
			'field_id'			=> 'brick_bg_animation_showhider',
			'field_title' 	=> __( 'Brick Background Animation', 'mp_stacks_animation'),
			'field_description' 	=> 'Set the Animation for the Background.',
			'field_type' 	=> 'showhider',
			'field_value' => '0',
		),
			
			//Waypoint animation for Background
			'brick_bg_waypoint_animation_showhider' => array(
				'field_id'			=> 'brick_bg_waypoint_animation_showhider',
				'field_title' 	=> __( 'Animation Upon In-View', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_bg_animation_showhider',
			),
				
				'brick_bg_waypoint_animation_on' => array(
					'field_id'			=> 'brick_bg_waypoint_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
		
				'bg_waypoint_animation_repeater_title' => array(
					'field_id'			=> 'bg_waypoint_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				'bg_waypoint_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'bg_waypoint_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				'bg_waypoint_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				'bg_waypoint_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				'bg_waypoint_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				'bg_waypoint_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'bg_waypoint_animation_keyframes',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
				
				'brick_bg_waypoint_animation_reverse_upon_out' => array(
					'field_id'			=> 'brick_bg_waypoint_animation_reverse_upon_out',
					'field_title' 	=> __( 'Reverse animation when this Brick goes out-of-view?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_bg_waypoint_animation_showhider',
				),
			array(
				'field_id'			=> 'brick_bg_mouseover_animation_showhider',
				'field_title' 	=> __( 'Animation Upon Mouse-Over', 'mp_stacks_animation'),
				'field_description' 	=> 'Set the Animation for Content-Type 1.',
				'field_type' 	=> 'showhider',
				'field_value' => '0',
				'field_showhider' => 'brick_bg_animation_showhider',
			),
			//Mouse-Over Animation for background
			'brick_bg_mouseover_animation_on' => array(
					'field_id'			=> 'brick_bg_mouseover_animation_on',
					'field_title' 	=> __( 'Animation On?', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'checkbox',
					'field_value' 	=> '',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_repeater_title' => array(
					'field_id'			=> 'bg_animation_repeater_title',
					'field_title' 	=> __( 'KeyFrame', 'mp_stacks_animation'),
					'field_description' 	=> NULL,
					'field_type' 	=> 'repeatertitle',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_length' => array(
					'field_id'			=> 'animation_length',
					'field_title' 	=> __( 'Animation Length', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the length between this keyframe and the previous one in milliseconds. Default: 500', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '500',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
					'field_container_class' => 'mp_animation_length',
				),
				'bg_mouseover_animation_opacity' => array(
					'field_id'			=> 'opacity',
					'field_title' 	=> __( 'Opacity', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the opacity at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'input_range',
					'field_value' => '100',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_rotation' => array(
					'field_id'			=> 'rotateZ',
					'field_title' 	=> __( 'Rotation', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the rotation degree angle at this keyframe. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_x' => array(
					'field_id'			=> 'translateX',
					'field_title' 	=> __( 'X Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the X position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_y' => array(
					'field_id'			=> 'translateY',
					'field_title' 	=> __( 'Y Position', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Y position, in relation to its starting position, at this keyframe. The unit is pixels. Default: 0', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '0',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
				'bg_mouseover_animation_scale' => array(
					'field_id'			=> 'scale',
					'field_title' 	=> __( 'Scale', 'mp_stacks_animation'),
					'field_description' 	=> __( 'Set the Scale % in relation to its starting size, at this keyframe. Default: 100', 'mp_stacks_animation' ),
					'field_type' 	=> 'number',
					'field_value' => '100',
					'field_repeater' => 'bg_mouseover_animation_keyframes',
					'field_showhider' => 'brick_bg_mouseover_animation_showhider',
				),
	);
	
	
	//Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	$mp_stacks_animation_add_meta_box = has_filter('mp_stacks_animation_meta_box_array') ? apply_filters( 'mp_stacks_animation_meta_box_array', $mp_stacks_animation_add_meta_box) : $mp_stacks_animation_add_meta_box;
	
	//Custom filter to allow for add on plugins to hook in their own extra fields 
	$mp_stacks_animation_items_array = has_filter('mp_stacks_animation_items_array') ? apply_filters( 'mp_stacks_animation_items_array', $mp_stacks_animation_items_array) : $mp_stacks_animation_items_array;
	
	//Create Metabox class
	global $mp_stacks_animation_meta_box;
	$mp_stacks_animation_meta_box = new MP_CORE_Metabox($mp_stacks_animation_add_meta_box, $mp_stacks_animation_items_array);
}
add_action('mp_brick_ajax_metabox', 'mp_stacks_animation_create_meta_box');
add_action('wp_ajax_mp_stacks_animation_metabox', 'mp_stacks_animation_create_meta_box');