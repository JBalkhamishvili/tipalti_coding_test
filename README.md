Tipalti Coding Test Plugin
===========================

Description
-----------
The Tipalti Coding Test Plugin is a custom WordPress plugin developed for a coding challenge. The plugin provides a shortcode that displays the current date and time in the format "Day, Month DD, YYYY HH:MM AM/PM". Users can specify their preferred timezone through a dropdown menu on the frontend, and the date and time will be displayed accordingly.

Version: 1.0
Author: Jumber Balkhamishvili
License: GPL2

Requirements
------------
- WordPress 4.0 or higher
- PHP 5.3 or higher

Installation
------------
1. Upload the 'tipalti-coding-test-plugin' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

Usage
-----
1. To display the current date and time with the timezone selection dropdown, simply insert the following shortcode into your post or page content:

   [tipalti_time]

2. Save the post or page, and the current date and time with the timezone selection dropdown will be displayed on the frontend.

Functionality
-------------
1. The plugin uses the PHP `timezone_identifiers_list()` function to retrieve the list of available timezones.
2. Users can select their preferred timezone from the dropdown menu, which will update the displayed date and time accordingly.
3. The plugin uses the WordPress Shortcode API to create and manage the shortcode functionality.
4. The plugin follows WordPress coding standards and best practices.

Custom Functions
----------------
1. `tipalti_datetime_shortcode($atts)`: This function is responsible for generating the output of the shortcode. It creates a timezone selection dropdown menu and displays the current date and time based on the selected timezone. It handles the form submission for updating the timezone preference.

Shortcodes
----------
1. `[tipalti_time]`: Use this shortcode in your post or page content to display the current date and time with the timezone selection dropdown.

Support
-------
If you have any questions or need assistance with the plugin, please contact the plugin author, Jumber Balkhamishvili.
