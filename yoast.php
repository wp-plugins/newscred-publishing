<?php
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
add_filter('xmlrpc_prepare_post', 'nc_add_yoast_installation_status');

if(is_plugin_active('wordpress-seo/wp-seo.php')) {
    require_once(plugin_dir_path(__FILE__).'nc-yoast-interface.class.php');
    add_action( 'wp_insert_post', 'nc_update_yoast_score' );
}

function nc_update_yoast_score($post_ID){
    $yoast = new NC_Yoast_Interface();
    $post = get_post($post_ID);
    $GLOBALS['post'] = $post;
    $yoast->calculate_results($post);
    return $post_ID;
}


function nc_add_yoast_installation_status($_post, $post, $fields){
    $_post['is_yoast_installed'] = nc_is_yoast_plugin_installed();
    return $_post;
}

function nc_is_yoast_plugin_installed(){
    return is_plugin_active('wordpress-seo/wp-seo.php');
}