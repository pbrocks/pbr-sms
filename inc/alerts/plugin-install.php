<?php

function pbr_sms_plugin_install( $a, $b, $c ) {
	if ( 'plugin' === $b['type'] && 'install' === $b['action'] ) {
		pbr_sms_send_notification( "Plugin has been installed: {$c['destination_name']}" );
	}
}
