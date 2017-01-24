<?php

if ( ! function_exists( 'wp_mail' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}


/**
 * @param $message
 * @param $alert_type
 */
function pbr_sms_send_notification( $message, $alert_type ) {

	global $pbr_sms_carrier_list;

	$users = get_users( esc_sql( 'meta_key=' . $alert_type . '&fields=ID' ) );

	foreach ( $users as $user ) {
		if ( get_user_meta($user, $alert_type, 'true') == '1' ) {
			$pbr_sms_phone   = get_the_author_meta( 'pbr_sms_phone_number', $user );
			$pbr_sms_carrier = get_the_author_meta( 'pbr_sms_carrier', $user );
			$pbr_sms_carrier = $pbr_sms_carrier_list[ $pbr_sms_carrier ];
			$pbr_sms_phone   = $pbr_sms_phone . $pbr_sms_carrier;
			wp_mail( $pbr_sms_phone, '', $message );
		}
	}

}