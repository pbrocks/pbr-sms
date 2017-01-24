<?php
function pbr_sms_theme_update( $a, $b, $c ) {

	if ( 'theme' === $b['type'] && 'update' === $b['action'] ) {

		pbr_sms_send_notification( 'Theme has been updated: ' . $c['destination_name'], 'pbr_sms_on_theme_update' );

	}

}
add_action( 'upgrader_post_install', 'pbr_sms_theme_update', 10, 3 );
