<?php
if(!defined('WPSEO_VERSION')) {
    define('WPSEO_VERSION', '1.5.4.2');
}
define('YOAST_BASE', dirname(plugin_dir_path(__FILE__)) . '/wordpress-seo/');

require_once(ABSPATH . 'wp-includes/link-template.php');
require_once(YOAST_BASE . '/admin/class-admin.php');
require_once(YOAST_BASE . '/inc/class-wpseo-meta.php');
require_once(YOAST_BASE . '/inc/wpseo-functions.php');
require_once(YOAST_BASE . '/inc/wpseo-non-ajax-functions.php');
require_once(YOAST_BASE . '/inc/options/class-wpseo-options.php');
require_once(YOAST_BASE . '/admin/class-metabox.php');


class NC_Yoast_Interface extends WPSEO_Metabox
{
    function __construct()
    {
        $GLOBALS['wpseo_admin'] = new WPSEO_Admin;
    }
}
