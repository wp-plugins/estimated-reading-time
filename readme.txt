=== Estimated Reading Time ===
Contributors: ericolson
Donate link: 
Tags: word count, reading time
Requires at least: 2.0
Tested up to: 2.7.1
Stable tag: 1.2

== Description ==

The Estimated Reading Time plugin simply estimates and displays the time a user will have to spend reading your post.

== Installation ==

1. Upload `estreadtime.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php est_read_time(); ?>` in your templates

== Frequently Asked Questions ==

= How is the estimation done? =

The estimation is based on a span of 150 words per minute (slightly slower than average) to 250 words per minute (slightly higher than average).  These numbers can be changed easily from within the code of the plugin (lowered to account for more complex content and raised for simpler content).  Future versions of the plugin may allow for the changing of these parameters via an "options" page.