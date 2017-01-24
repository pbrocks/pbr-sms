<?php
function detect_published_post(
	$pbr_sms_new_status = null,
	$pbr_sms_old_status = null,
	$pbr_sms_post_id = null ) {
	if ( 'publish' === $pbr_sms_new_status && 'publish' !== $pbr_sms_old_status ) {
		pbr_sms_send_notification( 'This new post has been published: ' . $pbr_sms_post_id->post_title, 'pbr_sms_on_post_publish' );
	}
}
add_action( 'transition_post_status', 'detect_published_post', 10, 3 );
