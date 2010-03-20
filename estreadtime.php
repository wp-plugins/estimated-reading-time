<?php
/*
Plugin Name: Estimated Reading Time
Plugin URI: http://website-in-a-weekend.net/estimated-reading-time/
Description: This plugin estimates the time it would take for a slightly below average reader to a slightly above average reader to read your post. It then applies the estimated reading time to the top of the post.
Version: 2.0
Author: Dave Doolin
Author URI: http://website-in-a-weekend.net/
*/

/*  Copyright 2009-2010  Eric_Olson  (email : eric@ericjohnolson.com),
    Copyright 2010  Dave Doolin  (email : david.doolin@gmail.com) 

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
 * Plugin originally developed by Eric John Olson
 * http://www.ericjohnolson.com/blog/
 * 
 * Now being maintained and extended by David M. Doolin
 */

if (!function_exists('est_read_time')):
function est_read_time( $return = false) {
	$wordcount = round(str_word_count(get_the_content()), -2);
	$minutes_fast = ceil($wordcount / 250);
	$minutes_slow = ceil($wordcount / 150);

	if ($wordcount <= 150) {
		$output = __("Reading time: < 1 minute");
	} else {
		$output = sprintf(__("Reading time: %s - %s minutes"), $minutes_fast, $minutes_slow);
	}
	if ($return) {
		return '<p class="estread">' . $output . '</p>';
	} else {
		echo '<p class="estread">' . $output . '</p>';
	}
}
endif;

if (!function_exists('est_the_content')):
function est_the_content( $orig ) {
	// Prepend the reading time to the post content
	return est_read_time(true) . "\n\n" . $orig;
}
endif;

if (function_exists('add_filter')):
add_filter('the_content', 'est_the_content', 9); // Set this to priority 9 so it's called before wptextuarize / wpautop / etc
//add_filter('the_excerpt', 'est_the_content', 9); // Set this to priority 9 so it's called before wptextuarize / wpautop / etc
endif;
   
?>