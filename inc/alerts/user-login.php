<?php
if ( ! function_exists( 'wp_get_current_user' ) ) {

	include( ABSPATH . 'wp-includes/pluggable.php' );

}

global $current_user;

wp_get_current_user();

$pbr_sms_new_user_logged_in = ! empty ( $current_user->user_login ) ? $current_user->user_login : '';

if ( '' === $pbr_sms_new_user_logged_in ) {

	/**
	* detect_user_login function.
	*
	* @access public
	* @param mixed $pbr_sms_new_user_logged_in
	* @return void
	*/
	function detect_user_login( $pbr_sms_new_user_logged_in ) {

		pbr_sms_send_notification( 'User successfully logged in: ' . $pbr_sms_new_user_logged_in, 'pbr_sms_on_user_login' );

	}
	add_action( 'wp_login', 'detect_user_login', 10, 2 );
}
