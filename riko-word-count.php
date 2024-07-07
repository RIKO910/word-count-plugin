<?php

/*
 * Plugin Name:       Riko Word Count
 * Plugin URI:        https://woocopilot.com/plugins/word-count/
 * Description:       Boost your content management with the Riko Word Count Monitor plugin for WordPress. This essential tool provides real-time word and character count for your posts and pages, helping you maintain optimal content length for SEO and readability.
 * Version:           1.0.1
 * Requires at least: 6.5
 * Requires PHP:      7.2
 * Author:            WooCopilot
 * Author URI:        https://woocopilot.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       riko-word-count
 * Domain Path:       /languages/
*/

/*
Riko Word Count is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Riko Word Count is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Riko Word Count. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined( 'ABSPATH' ) || exit; // Exist if accessed directly.

// Including classes.
require_once __DIR__ . '/includes/class-riko-word-count.php';

/**
 * Initializing Plugin.
 *
 * @since 1.0.0
 * @retun Object Plugin object.
 */

function riko_word_count() {
    return new Riko_Word_Count(__FILE__, '1.0.1');
}

riko_word_count();