<?php
if(!function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if(!defined('WPSEO_VERSION')) {
    $seo_plugin = get_plugins()['wordpress-seo/wp-seo.php'];
    define('WPSEO_VERSION', $seo_plugin['Version']);
}

define('YOAST_BASE', dirname(plugin_dir_path(__FILE__)) . '/wordpress-seo/');

require_once(ABSPATH . 'wp-includes/link-template.php');
require_once(YOAST_BASE . '/admin/class-admin.php');
require_once(YOAST_BASE . '/inc/class-wpseo-meta.php');
require_once(YOAST_BASE . '/inc/wpseo-functions.php');
require_once(YOAST_BASE . '/inc/wpseo-non-ajax-functions.php');

// make plugin backward compatible with older versions of yoast
if (WPSEO_VERSION < 2.3) {
    require_once(YOAST_BASE . '/inc/class-wpseo-options.php');
} else {
    require_once(YOAST_BASE . '/inc/options/class-wpseo-options.php');
}

require_once(YOAST_BASE . '/admin/class-metabox.php');

class NC_Yoast_Interface extends WPSEO_Metabox
{
    function __construct()
    {
        $GLOBALS['wpseo_admin'] = new WPSEO_Admin;
    }
}
