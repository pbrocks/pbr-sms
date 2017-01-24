=== PBRocks SMS Notifications ===
PBRocks SMS notifications for WordPress
Contributors: JeffMatson
Tags: SMS, text messages, notifications
Requires at least: 2.8
Tested up to: 4.0
Stable tag: 2.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Automatically sends SMS (text message) notifications when events such as a login, theme, plugin, or post change occurs.

== Description ==

Do you need to keep track of changes made on your WordPress site?  The PBRocks SMS Notifications plugin can easily alert you of changes made within the WordPress dashboard.

The plugin is useful to not only keep a log of changes as they are made, but to also monitor unwanted logins.  If an attacker were to successfully log into your WordPress dashboard, you will be instantly notified via text message.

Features:

*	Supports both US and international carriers.
*	No need for an external API.
*	Notifications when a post is changed.
*	Notifications when a user logs in.
*	Notifications when a plugin is installed or updated.
*	Notifications when a theme is installed or updated.
* Fully extensible

== Installation ==

1. Upload the folder to /wp-content/plugins.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Visit the new PBRocks SMS menu item to configure your phone number, carrier, and notification options.

== Frequently Asked Questions ==

= How are text messages sent? =
All carriers support the ability to send text messages via email.  We have simply tapped into that to send all notifications.

== Changelog ==

= 2.0 =
* Carrier list is now easier to manage
* Codebase is now easier to understand
* Codebase is more efficient
* Fully extensible

= 1.1 =
* Ensured compatibility with 4.0
* Modified menu location

= 1.0.4 =
Fixed version info.

= 1.0.3 =
Added docblocks and resolved bug when sending the newly logged in user.

= 1.0.2 =
The "From" address is now set to admin@YOURSITEURL.COM.  Should add some extra
identificaton.

= 1.0.1 =
Fixed bug that affected some users on the carrier selection dropdown.

= 1.0 =
Initial release.
