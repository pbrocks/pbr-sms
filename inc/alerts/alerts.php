<?php

$directory = plugin_dir_path( __FILE__ ) . '/inc';
foreach ( glob( $directory . '*.php' ) as $filename ) {
	require_once $filename;
}
