<?php
function pbr_sms_post_update( $post_id, $post_after, $post_before ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	} else {
		pbr_sms_send_notification( "A post has been updated: {$post_after->post_title}" );
	}
}

// function pbr_sms_post_update( $post_id, $post_after, $post_before ) {
// 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
// 		return;
// 	} else {
// 		pbr_sms_send_notification( 'A post has been updated: ' . $post_after->post_title, 'pbr_sms_on_post_update');
// 	}
// }
add_action( 'post_updated', 'pbr_sms_post_update', 10, 3 );
