<?php

function pbr_sms_plugin_install( $a, $b, $c ) {

	if ( 'plugin' === $b['type'] && 'update' === $b['action'] ) {

		pbr_sms_send_notification( "Plugin has been updated: {$c['destination_name']}" );

	}

}
