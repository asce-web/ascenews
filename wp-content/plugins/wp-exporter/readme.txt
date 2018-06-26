=== WordPress Exporter ===
Contributors: zourbuth
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W6D3WAJTVKAFC
Tags: export, exporter, import, importer, xml, rss, wxr, posts, pages, media, attachment, comments, custom fields, categories, tags, terms, author
Requires at least: 3.0
Tested up to: 4.8
Stable tag: 0.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Export single or multiple posts, pages, comments, custom fields, categories, tags and more to an export file.

== Description ==
Export a single post or page with its comments, custom fields and terms easily. This plugin will add custom export queries at the WordPress export administration page. Use <a target="_blank" href="http://wordpress.org/plugins/wordpress-importer/">WordPress Importer</a> to import into WordPress site. Ability to create advanced export with custom post queries.

<h3>Key Features & Options</h3>
<ul>
	<li>Export single or multiple posts.</li>
	<li>Export single or multiple pages.</li>
	<li>Export single or multiple custom post type.</li>
	<li>Export single or multiple media or attachment.</li>
	<li>Export comments, custom fields and terms.</li>
	<li>Export menu at admin bar for each edit page.</li>
	<li>Export post status option.</li>
	<li>Custom export query. Read more how to <a href="http://www.ground6.com/wordpress-plugins/wordpress-exporter/creating-custom-export-query/">create custom export query</a>.</li>
</ul>

To import from a WordPress export file into a WordPress blog, please see the <a href="http://codex.wordpress.org/Importing_Content#WordPress" target="_blank" rel="nofollow">Codex page on Importing Content</a>.

<h3>Supports & Features</h3>
This plugin does not match to your site style? Is this script not quite working as it should? Having trouble installing? Or need some custom modifications that aren’t already included? Or you want more features on next release? Feel free to get in touch about any of your queries via <a href="http://www.ground6.com/wordpress-plugins/wordpress-exporter/">plugin homepage</a>.


== Installation ==
You can use the built in installer and upgrader, or you can install the plugin manually.
<ul>
<li>Go to the menu 'Plugins' -> 'Install' and search for 'WordPress Exporter'</li>
<li>Click 'install'</li>
</ul>

To show export menu at admin bar, put this defined constant in wp-config.php or theme functions.php<br />
<pre>define('WP_EXPORTER_ADMIN_BAR', true);</pre>

To change exported post status (i.e. to draft), put this defined constant in wp-config.php or theme functions.php<br />
<pre>define('WP_EXPORTER_POST_STATUS', 'draft');</pre><br />

For more post statuses please read this documentation <a href="https://codex.wordpress.org/Post_Status#Default_Statuses">Post Status</a>.

Read more about <a href="https://codex.wordpress.org/Editing_wp-config.php" target="_blank">editing wp-config.php</a>.


== Frequently Asked Questions ==
http://www.ground6.com/wordpress-plugins/wordpress-exporter/supports/

== Screenshots ==
1. Advanced export interface
2. Admin bar export menu at edit page

== Changelog ==
= 0.0.6 =
- Added custom post types support
- Added translation for Export admin menu bar
= 0.0.5 =
- Updated WXR
- Added admin bar export menu at edit post/page
- Added export post status option
= 0.0.4 =
- Added media/attachment import
- Added post id after title
= 0.0.3 =
- Fixed spinner
= 0.0.2 =
- Created wp_exporter_queries filter hook
- Created wp_exporter_post_ids filter hook
- Created wp_exporter_form action hook
= 0.0.1 =
- Initial release


== Upgrade Notice ==
Upgrade via WordPress plugins page.