<?php
    /*
     Plugin Name: Insert Time
     Plugin URI: https://github.com/Shereef/insertTime
     Description: Adds a shorcode [time] tp insert your local time at page loading in a post, just write [time], [datetime] or [date] in your post after activating this.
     Version: 1.0
     Author: Shereef Marzouk
     Author URI: http://shereef.net
     License: MIT
     */
    // NOTE: This plugins I made for my website for a very simple reason, I am only publishing it so people can extend and use it.
    /*  
     Copyright (c) 2012 Shereef Marzouk
     
     Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
     
     The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
     
     THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */
    
    add_shortcode("time", "timeHandler");
    add_shortcode("Time", "timeHandler");
    add_shortcode("TIME", "timeHandler");
    function timeHandler() {
        //run function that actually does the work of the plugin
        $result = insertTime();
        //send back text to replace shortcode in post
        return $result;
    }
    
    add_shortcode("dateTime", "dateTimeHandler");
    add_shortcode("DateTime", "dateTimeHandler");
    add_shortcode("Datetime", "dateTimeHandler");
    add_shortcode("datetime", "dateTimeHandler");
    add_shortcode("DATETIME", "dateTimeHandler");
    function dateTimeHandler() {
        //run function that actually does the work of the plugin
        $result = insertDateTime();
        //send back text to replace shortcode in post
        return $result;
    }
    
    add_shortcode("date", "dateHandler");
    add_shortcode("Date", "dateHandler");
    add_shortcode("DATE", "dateHandler");
    function dateHandler() {
        //run function that actually does the work of the plugin
        $result = insertDate();
        //send back text to replace shortcode in post
        return $result;
    }
    
    function insertTime() {
        //process plugin
        $type = 'mysql';
        list($date, $time) = explode(' ', current_time($type, $gmt = 0));//$time = date('h:i:s A', current_time($type, $gmt = 0));
        $offset = get_option('gmt_offset');
        //send back text to calling function
        return '<label alt="at page loading time" class="insertTime currentTime">' . $time . ($offset > 0 ? ' GMT+' : ' GMT') . $offset . '</label>';
    }
    
    function insertDate() {
        //process plugin
        $type = 'mysql';
        list($date, $time) = explode(' ', current_time($type, $gmt = 0));//date('Y-m-d h:i:s', current_time($type, $gmt = 0));
        //send back text to calling function
        return '<label alt="at page loading time" class="insertTime currentDate">' . $date . '</label>';
    }
    
    function insertDateTime() {
        //process plugin
        $type = 'mysql';
        $datetime = current_time($type, $gmt = 0);
        $offset = get_option('gmt_offset');
        //send back text to calling function
        return '<label alt="at page loading time" class="insertTime currentDateTime">' . $datetime . ($offset > 0 ? ' GMT+' : ' GMT') . $offset . '</label>';
    }
?>
