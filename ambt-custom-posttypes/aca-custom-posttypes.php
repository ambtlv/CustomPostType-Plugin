<?php
/*!
Plugin Name: AmbertreeCreative Custom Post Type & Taxonomies.
Plugin URI: http://www.ambertreecreative.com
Description: A simple and easy to use plugin for developers that adds custom post types & taxonomies to your WordPress site. Keeping all your custom post types in one place.
Version: 1.1
Author: Daniel Sydney (@ambtlv)
Author URI: http://www.ambertreecreative.com
License: GPL2
*/

/*
Copyright 2016 Daniel Sydney - Ambertree Creative

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This programe is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with thie program.
*/


// Registering custom post type array
function aca_custom_posttypes() {

		// Behind The Confetti (change name) Products Post Types
	    $labels = array(
        'name'               => 'Behind The Confetti Posts',
        'singular_name'      => 'Behind The Confetti Post',
        'menu_name'          => 'Behind The Confetti Posts',
        'name_admin_bar'     => 'Behind The Confetti Post',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Behind The Confetti Post',
        'new_item'           => 'New Behind The Confetti Post',
        'edit_item'          => 'Edit Behind The Confetti Post',
        'view_item'          => 'View Behind The Confetti Post',
        'all_items'          => 'All Behind The Confetti Posts',
        'search_items'       => 'Search Behind The Confetti Posts',
        'parent_item_colon'  => 'Parent Behind The Confetti Posts:',
        'not_found'          => 'No Behind The Confetti Posts found.',
        'not_found_in_trash' => 'No Behind The Confetti Posts found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-pressthis',
        'query_var'          => true,
        // main post archive link...
        'rewrite'            => array( 'slug' => 'behind-the-confetti' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'         => array( 'category')
    );
    // Add and create Archive-, Single- and adding the post name.
	register_post_type('behindtheconfetti', $args );


	    // Behind The Confetti (change name) Testimonials Post Types
// 	    $labels = array(
//         'name'               => 'Behind The Confetti Testimonials',
//         'singular_name'      => 'Behind The Confetti Testimonial',
//         'menu_name'          => 'Behind The Confetti Testimonials',
//         'name_admin_bar'     => 'Behind The Confetti Testimonial',
//         'add_new'            => 'Add New',
//         'add_new_item'       => 'Add New Behind The Confetti Testimonial',
//         'new_item'           => 'New Behind The Confetti Testimonial',
//         'edit_item'          => 'Edit Behind The Confetti Testimonial',
//         'view_item'          => 'View Behind The Confetti Testimonial',
//         'all_items'          => 'All Behind The Confetti Testimonials',
//         'search_items'       => 'Search Behind The Confetti Testimonials',
//         'parent_item_colon'  => 'Parent Behind The Confetti Testimonials:',
//         'not_found'          => 'No Behind The Confetti Testimonials found.',
//         'not_found_in_trash' => 'No Behind The Confetti Testimonials found in Trash.',
//     );

//     $args = array(
//         'labels'             => $labels,
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu'       => true,
//         'menu_icon'          => 'dashicons-businessman',
//         'query_var'          => true,
//         'rewrite'            => array( 'slug' => 'behind-the-confetti-testimonials' ),
//         'capability_type'    => 'post',
//         'has_archive'        => true,
//         'hierarchical'       => false,
//         'menu_position'      => 6,
//         'supports'           => array( 'title', 'editor', 'thumbnail' ),
//         'taxonomies'         => array( 'category', 'post_tag')
//     );
// 	register_post_type('testimonials', $args );
// }

add_action( 'init', 'aca_custom_posttypes');

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    aca_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );


// DASHICON SITE - https://developer.wordpress.org/resource/dashicons