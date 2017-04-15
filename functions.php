<?php

/*
Theme Name: Mike Sinkula's WordPress Demo
Author: Mike Sinkula of Premium Design Works
Author URI: http://www.premiumdw.com/
Description: This is my demo theme for the WEB170 WordPress class.
Version: 1.0
*/

// Register My Menus
register_nav_menus( array(
	'main-menu' => __('Main'),
));
//

// Enable Featured Images & Post Thumbnails
add_theme_support('post-thumbnails');
//

// Enable excerpts on Pages
add_post_type_support('page', 'excerpt');
//

// Register Sidebar 
register_sidebar(array(
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
));
//


// Get My Bad-Ass Title Tag
function get_my_title_tag() {
	
	global $post; // DO NOT forget this f@#!%#$@%^ thing.
	
	if (is_front_page()) { // the front page
		
		bloginfo('description');
		
	}
	
	elseif ( is_page() || is_single()) { // pages and postings
		
		the_title(); // title of page or posting
		
	}
	
	
	else {
		
		bloginfo('description');
		
	}
		
		
	if ($post->post_parent) { // if there is a parent
		
		echo ' | '; // seperator with spaces
		echo get_the_title($post->post_parent);
		
	}
		
	echo ' | '; // seperator with spaces
	bloginfo('name'); // site name
	echo ' | '; // seperator with spaces
	echo 'Seattle, WA';	// city and state
	
}
//


// Remove Inline Styles from Captions
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
	
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));
	if ( 1 > (int) $width || empty($caption) )
		return $content;
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
//

?>