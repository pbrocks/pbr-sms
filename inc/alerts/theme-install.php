<?php
function pbr_sms_theme_install( $a, $b, $c ) {

	if ( 'theme' === $b['type'] && 'install' === $b['action'] ) {

		pbr_sms_send_notification( "Theme has been installed: {$c['destination_name']}" );
	}
}
add_action( 'upgrader_post_install', 'pbr_sms_theme_install', 10, 3 );
