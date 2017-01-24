<?php
if ( current_user_can( 'manage_options' ) ) {
	add_action( 'admin_menu', 'pbr_sms_menu' );
	/**
	 * pbr_sms_menu function.
	 *
	 * @access public
	 * @return void
	 */
	function pbr_sms_menu() {

		add_submenu_page(
			'tools.php',
			__( 'PBR SMS Notfications', 'pbr-sms-notifications' ),
			__( 'PBRocks SMS Notifications', 'pbr-sms-notifications' ),
			'manage_options',
			'pbr-sms-notifications',
			'pbr_sms_notifications_menu',
			99
		);
	}

	function pbr_sms_notifications_menu() {
		?>

		<div class="wrap">

			<h1>PBRocks SMS Notifications configuration</h1>

			<div style="margin-right:auto; float:left;">
				<form method="post" action="<?php admin_url( 'tools.php?page=pbr-sms-notifications' ); ?>">

					<?php // do_action( 'pbr_sms_extenstions_license' ); ?>

					<h3>Allow these users to configure SMS notifications:</h3>

					<table class="form-table">

						<?php
						$blogusers = get_users( esc_sql( 'blog_id=1&orderby=nicename&role!=subscriber' ) );

						foreach ( $blogusers as $user ) :
							$sms_user_selection = 'pbr_sms_allowed_' . $user->user_nicename;
						if ( isset( $_POST[ $sms_user_selection ] )  && '1' === $_POST[ $sms_user_selection ] ) {
							update_user_meta( $user->ID, 'pbr_sms_allowed', '1' );
						}
						if ( isset( $_POST['submit'] ) ) {
							if ( ! isset($_POST[ $sms_user_selection ] ) ) {
								delete_user_meta( $user->ID, 'pbr_sms_allowed');
							}
						}?>

						<tr valign="top">

							<th scope="row"><?php echo esc_html( $user->user_nicename ); ?></th>
							<?php $user_allowed = get_user_meta( $user->ID, 'pbr_sms_allowed', 'true' ); ?>
							<td>
								<label>
									<input type="checkbox" name="<?php echo $sms_user_selection ?>"
									value="1" <?php checked( $user_allowed, '1' ); ?>/>
								</label>
							</td>

						</tr>


					<?php endforeach; ?>



				</table>
				<?php submit_button(); ?>
			</form>

		</div>
<?php echo 'Let\'s remove';
/* ?>
		<div style="margin-left:auto; float:right;">

			<h2>Want more features?</h2>

			<p><a href="https://jeffmatson.net/pbr-sms/">Upgrade to PBR SMS Notifications Pro</a> today!</p>
			<table style="border-collapse:collapse;border-spacing:0;">
				<tr>
					<th style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<h3 style="text-align: center;">Personal License</h3>
					</th>
					<th style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<h3 style="text-align: center;">Developer License</h3>
					</th>
					<th style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<h3 style="text-align: center;">Agency License</h3>
					</th>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">$10</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">$25</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">$50</p>
					</td>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">1 Site</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">5 Sites</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">30 Sites</p>
					</td>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">1 Year Premium Support</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">1 Year Premium Support</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">1 Year Premium Support</p>
					</td>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">Automatic Updates</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">Automatic Updates</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">Automatic Updates</p>
					</td>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">All Extensions</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">All Extensions</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;">All Extensions</p>
					</td>
				</tr>
				<tr>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;"><a
							href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a>
						</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;"><a
							href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a>
						</p>
					</td>
					<td style="padding:10px 5px;border: 1px solid;overflow:hidden;word-break:normal;">
						<p style="text-align: center;"><a
							href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a>
						</p>
					</td>
				</tr>
			</table>
			<h3>Extensions available for plugins you have installed:</h3>

			<?php $available_extensions = wp_remote_retrieve_body( wp_remote_get( 'http://jeffmatson.net/pbr-sms-extensions.php' ) ); ?>
			<?php $available_extensions = json_decode( $available_extensions, true ); ?>

			<?php foreach ( $available_extensions as $key => $value ): ?>

				<?php if ( is_plugin_active( $value ) ): ?>
					<strong><?php echo esc_html( $key ); ?></strong><br/>
				<?php endif; ?>

			<?php endforeach; ?>

			<h3>All notification extensions available:</h3>

			<?php foreach ( $available_extensions as $key => $value ): ?>
				<strong><?php echo esc_html( $key ); ?></strong><br/>
			<?php endforeach; */?>

		</div>
	</div>
	<?php
	}
}
