<?php
/*
Plugin Name: Estimated Reading Time
Plugin URI: http://www.ericjohnolson.com/blog/2009/2/23/wordpress-estimated-reading-time-plugin/
Description: This plugin estimates the time it would take for a slightly below average reader to a slightly above average reader to read your post. It then applies the estimated reading time to the top of the post. Make sure to add <?php est_read_time(); ?> to your template.
Version: 1.1
Author: Eric Olson
Author URI: http://www.ericjohnolson.com/blog/
*/

/*  Copyright 2009  Eric_Olson  (email : eric@ericjohnolson.com)

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

function est_read_time() { 
   $wordcount = round(str_word_count(get_the_content()), -2);
   $minutes_fast = ceil($wordcount / 250);
   $minutes_slow = ceil($wordcount / 150);
   
   if ($wordcount <= 150) {echo "Reading time: < 1 minute";} else {echo "Reading time: $minutes_fast - $minutes_slow minutes";
   }
 }
   
?>