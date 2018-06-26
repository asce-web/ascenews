=== Fix My Feed RSS Repair ===
Author:Innovative Solutions 
Contributors: Scriptonite
Tags: RSS, fix RSS, broken feed
Donate:https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RMCSV4J9FALZ6
Requires at least: 3.0
Tested up to: 4.4
Stable Tag:1.4


This is a simple yet powerful plugin to repair your wordpress RSS feed. If you get an "XML Parsing Error: XML or text declaration not at start of entity" on your feed, this is the fix.


== Description ==

This is a simple yet powerful plugin to repair your wordpress RSS feed. This plugin will help you if you get an error that looks similar to this:

XML Parsing Error: XML or text declaration not at start of entity
Location: http://www.yoursite.com/feed/
Line Number 2, Column 2: <?xml version="1.0" encoding="UTF-8"?>
-^

If you get this error and have not been able to resolve your feed issues than this plugin is what you need.  RSS repair adds a new item to your wordpress tools menu. After you do a core update or theme update and your feed stops working, apply the fix and your feed will be as good as new.  

Code sources from: http://wejn.org/stuff/wejnswpwhitespacefix.php.html
 
== Installation ==


1. Upload  to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. go to tools>RSS fix and apply

== Frequently Asked Questions ==

= I've activated the plugin but nothing happened. =
make sure you apply the fix by going to tools>RSS fix and apply it.

= I've updated WordPress and now my feed is broken again =
after updating you may need to go back to tools>RSS fix and re-apply the patch.

= your plugin didn't work, my feed is still broken =
this plugin fixes a specific feed issue, chances are you have a different problem that may need to be manually addressed. Please feel free to contact me.


== Changelog ==
1.0
Plugin created

1.2
Added warning message for users of W3 Total Cache which can sometimes cause a conflict and instructions on how to fix it if it does.

1.3
update for WordPress 4+ compatibility