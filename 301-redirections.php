<?php
/**
 * Plugin Name: 301 Redirections
 * Version: 1.0.0
 * Author: Maja Kochanowska
 * Description: Plugin to set 301 redirections. Requires ACF PRO plugin.
 * Text Domain: redirections
 * Slug: redirections
 *
 * @package redirections
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'ACF.php';
require_once plugin_dir_path( __FILE__ ) . 'redirect.php';
