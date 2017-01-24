<?php
$directory = plugin_dir_path( __FILE__ );
require_once $directory . 'carrier-list.php';
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
      __( 'PBR SMS Notifications', 'pbr-sms-notifications' ),
      'manage_options',
      'pbr-sms-notifications',
      'pbr_sms_notifications_menu',
      99
    );
  add_action( 'admin_init', 'update_pbr_sms_settings' );
  }
/**
* update_pbr_sms_settings function.
*
* @access public
* @return void
*/
function update_pbr_sms_settings() {
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_post_publish' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_phone_number' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_carrier' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_user_login' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_plugin_update' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_plugin_install' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_post_update' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_theme_update' );
  register_setting( 'pbr_sms_settings', 'pbr_sms_on_theme_install' );
  do_action('pbr_sms_register');
}
/**
* pbr_sms_notifications_menu function.
*
* @access public
* @return void
*/
function pbr_sms_notifications_menu() {
?>
  <div class="wrap">
    <h1><?php _e('PBR SMS Notifications configuration'); ?></h1>
    <?php
    if( isset( $_GET[ 'tab' ] ) ) {
      $active_tab = $_GET[ 'tab' ];
    }
    else {
      $active_tab = 'general';
    }
    ?>
    <h2 class="nav-tab-wrapper">
      <a href="?page=pbr-sms-notifications&tab=general" <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?> class="nav-tab">General</a>
      <a href="?page=pbr-sms-notifications&tab=pro" <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?> class="nav-tab">Pro</a>
      <?php do_action('pbr_sms_add_tab'); ?>
    </h2>
    <form method="post" action="options.php">
      <?php
      if (empty($active_tab)) {
        $active_tab == 'general';
      }
      if( $active_tab == 'general' ) {
        ?>
        <?php settings_fields( 'pbr_sms_settings' ); ?>
        <?php do_settings_sections( 'pbr_sms_settings' ); ?>
        <?php if (did_action( 'pbr_sms_add_tab' ) < 1) {
        echo '<h3>Want more features?</h3>';
        echo '<p><a href="https://jeffmatson.net/pbr-sms/">Upgrade to PBR SMS Notifications Pro</a> today!</p>';
      } ?>
        <table class="form-table">
          <tr valign="top">
            <th scope="row"><?php _e('Phone number') ?>:</th>
            <td><input type="text" name="pbr_sms_phone_number" value="<?php echo get_option('pbr_sms_phone_number'); ?>"/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Cell carrier'); ?>:</th>
            <?php $pbr_sms_options_carrier = get_option('pbr_sms_carrier'); ?>
            <td>
              <select name="pbr_sms_carrier">
                <?php
                global $pbr_sms_carrier_list;
                foreach ($pbr_sms_carrier_list as $carrier_name => $carrier_address) {
                  $carrier_select_option = '<option value="';
                  $carrier_select_option .= $carrier_name;
                  $carrier_select_option .= '"';
                  if ( $pbr_sms_options_carrier == $carrier_name) {
                    $carrier_select_option .= ' selected';
                  }
                  $carrier_select_option .= '>' . $carrier_name . '</option>';
                  echo $carrier_select_option;
                }
                ?>
              </select>
            </td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a post is published'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_post_publish" value="1" <?php if (get_option('pbr_sms_on_post_publish') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a post is updated'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_post_update" value="1" <?php if (get_option('pbr_sms_on_post_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when user logs in') ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_user_login" value="1" <?php if (get_option('pbr_sms_on_user_login') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS when a plugin is installed'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_plugin_install" value="1" <?php if (get_option('pbr_sms_on_plugin_install') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a plugin is updated'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_plugin_update" value="1" <?php if (get_option('pbr_sms_on_plugin_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a theme is installed'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_theme_install" value="1" <?php if (get_option('pbr_sms_on_theme_install') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Send SMS a theme is updated'); ?>:</th>
            <td><input type="checkbox" name="pbr_sms_on_theme_update" value="1" <?php if (get_option('pbr_sms_on_theme_update') == '1') { echo 'checked'; }?>/></td>
          </tr>
          <?php  ?>
        </table>
      <?php
      submit_button();
      }
      if( $active_tab == 'pro' ) {
        echo '<h2>Want more notification options?  GO PRO!</h2>'; ?>
      <table style="border-collapse:collapse;border-spacing:0;">
  <tr>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Personal License</h3></th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Developer License</h3></th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><h3><center>Agency License</h3></th>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$10</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$25</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>$50</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Site</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>25 Sites</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Unlimited Sites</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>1 Year Premium Support</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>Automatic Updates</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center>All Extensions</center></td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a></center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a></center></td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;"><center><a href="https://jeffmatson.net/downloads/pbr-sms-notifications-pro/">Upgrade Now!</a></center></td>
  </tr>
</table>
<?php
        echo '<h3>Notifications for plugins you have installed:</h3>';
        $available_extensions = wp_remote_retrieve_body( wp_remote_get('http://jeffmatson.net/pbr-sms-extensions.php') );
        $available_extensions = json_decode($available_extensions, true);
        foreach ($available_extensions as $key => $value) {
          if (is_plugin_active($value)) {
          echo '<strong>' . $key . '</strong><br/>';
          }
        }
        echo '<h3>All notification extensions available:</h3>';
        foreach ($available_extensions as $key => $value) {
          echo '<strong>' . $key . '</strong><br/>';
        }
      }
      elseif (did_action( 'pbr_sms_add_tab' ) >= 1) {
        do_action('pbr_sms_extensions_menu');
      }
?>
      </form>
    </div>
    <?php

}
