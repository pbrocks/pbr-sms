<?php
/**
 * Plugin Name: PBRocks SMS Notifications
 * Plugin URI: http://github.com/pbrocks/pbr-sms
 * Description: Send SMS notifications when things are updated.
 * Version: 2.1
 * Author: Jeff Matson & @pbrocks
 * Author URI: http://github.com/pbrocks
 * License: GPL2
 */

global $pbr_sms_file_location;

$pbr_sms_file_location = plugin_basename( __FILE__ );
$directory            = plugin_dir_path( __FILE__ );

require_once $directory . '/functions.php';
require_once $directory . '/pbr-sms-options.php';
require_once $directory . '/carrier-list.php';
require_once $directory . '/pbr-sms-user-settings.php';
require_once $directory . '/inc/alerts/alerts.php';
