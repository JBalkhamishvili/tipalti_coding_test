<?php

/*
Plugin Name: Tipalti Coding Test Plugin
Description: A custom plugin for a WorPress Coding challenge.
Version: 1.0
Author: Jumber Balkhamishvili
License: GPL2
*/

/*
 *This plugin is created with following requirements for a coding test
 *  Project Requirements:
1. Create a custom WordPress plugin that provides the functionality described above.
2. Use WordPress coding standards and best practices when developing the plugin.
3. Use the WordPress shortcode API to create a shortcode that can be used to display the
current date and time.
4. Ensure that the shortcode displays the date and time in the format "Day, Month DD,
YYYY HH:MM AM/PM".
5. Allow the user to specify the timezone to use for the date and time display.
6. Ensure that the plugin is well-documented and that all functions, hooks, and filters are
properly commented.
7. Test the plugin thoroughly to ensure it is free from bugs and errors.
 */

//function to display the timezone
function tipalti_datetime_shortcode($atts) {
    //create a variable with all the timezones from the timezone_identifiers_list()
    $timezones = timezone_identifiers_list();

    //setting the standard time zone on Page Load to Europe/London
    $selected_timezone = 'Europe/London';

    //check if a timezone is selected, if yes put the time zone in the variable $selected_timezone
    if (isset($_POST['selected_timezone'])) {
        $selected_timezone = sanitize_text_field($_POST['selected_timezone']);
    }

    //set a default timezone based on the variable $selected_timezone
    date_default_timezone_set($selected_timezone);
    //get current time zone and format it in the way like the reqirements
    $current_datetime = date('l, F j, Y h:i A');

    //creating in the  $timezone_select_form variable a string which will be returned at the end
    $timezone_select_form = '<div class="row"><div class="col">';
    $timezone_select_form .= '<form method="post" action="' . esc_url($_SERVER['REQUEST_URI']) . '">';
    $timezone_select_form .= '<select name="selected_timezone" onchange="this.form.submit()">';

    //foreach loop trough all the timezones to display them in the <select> as options
    foreach ($timezones as $timezone) {
        $selected = $timezone == $selected_timezone ? ' selected' : '';
        $timezone_select_form .= '<option value="' . $timezone . '"' . $selected . '>' . $timezone . '</option>';
    }

    $timezone_select_form .= '</select>';
    $timezone_select_form .= '</form></div>';

    //add the current time zone based on the selected time zone
    $current_datetime_selected = '<div class="col" id="current-datetime_selected">' . $current_datetime . '</div></div>';



    return $timezone_select_form . $current_datetime_selected;
}



//registering the shortcode to be used with  [current_time]
add_shortcode('tipalti_time', 'tipalti_datetime_shortcode');

//****** Improvements *******

/*
another approach to solve this task would be to do it with Javascript to have reduced
server load interactions and more user friendly experience response time everytime on changing the
timezone , instead of making a form and wait for the response
*/
