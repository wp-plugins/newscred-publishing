<?php
/*
Plugin Name: NewsCred CMC
Description: Supercharge your NewsCred CMC experience with this plugin
Version: 0.0.7
Author: Matthew Isabel, Raju Hossain, Riyadh Al Nur
Author URI: http://www.newscred.com
*/

add_filter( 'xmlrpc_methods', 'nc_xmlrpc_methods' );

require_once ABSPATH . 'wp-admin/includes/post.php';
require_once(plugin_dir_path(__FILE__).'yoast.php');

function nc_xmlrpc_methods( $methods ) {
    $methods['wp.getPost'] = 'nc_getPost';
    return $methods;
}

function nc_getPost( $args ) {
    global $wp_xmlrpc_server;

    if ( ! isset( $args[4] ) ) {
        $args[4] = apply_filters( 'xmlrpc_default_post_fields', array( 'post', 'terms', 'custom_fields' ), 'nc_getPost' );
    }

    $post_obj = $wp_xmlrpc_server->wp_getPost( $args );

    $post_obj['permalink'] = nc_getPermalinkPath( $post_obj['post_id'] );
    $post_obj['slug'] = nc_getSlug( $post_obj['post_id'] );

    return $post_obj;
}

function nc_getPermalinkPath ( $post_id ) {
    list( $permalink, $postname ) = get_sample_permalink( $post_id );

    return $permalink;
}

function nc_getSlug ( $post_id ) {
    list( $permalink, $postname ) = get_sample_permalink( $post_id );

    return $postname;
}
