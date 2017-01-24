<?php
/**
 * Plugin Name: PBRocks SMS Notifications
 * Plugin URI: http://jeffmatson.net/pbr-sms
 * Description: Send SMS notifications when things are updated.
 * Version: 2.0.1
 * Author: Jeff Matson
 * Author URI: http://jeffmatson.net
 * License: GPL2
 */
$directory = plugin_dir_path( __FILE__ );
require_once $directory . '/functions.php';
require_once $directory . '/pbr-sms-options.php';
require_once $directory . '/carrier-list.php';
require_once $directory . '/alerts/alerts.php';
