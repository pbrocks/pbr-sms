<?php

if ( ! function_exists( 'wp_mail' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}

/**
 * Defines how mail is sent.
 *
 * @access public
 * @param mixed $pbr_sms_phone_number (default: null)
 * @param mixed $pbr_sms_updated (default: null)
 * @param mixed $pbr_sms_updated_item (default: null)
 * @return void
 */

function pbr_sms_send_notification( $pbr_sms_updated_item ) {
	global $pbr_sms_carrier_list;
	$pbr_sms_phone_unformatted = get_option( 'pbr_sms_phone_number' );
	$pbr_sms_phone_formatted = preg_replace( '/(\W*)/', '', $pbr_sms_phone_unformatted );
	$option = get_option( 'pbr_sms_carrier', false );
	$pbr_sms_carrier = $pbr_sms_carrier_list[ $option ];
	// Brings the phone number and carrier together to create the carrier address.
	$pbr_sms_phone = $pbr_sms_phone_formatted . $pbr_sms_carrier;
	wp_mail( $pbr_sms_phone, '', $pbr_sms_updated_item );
}
