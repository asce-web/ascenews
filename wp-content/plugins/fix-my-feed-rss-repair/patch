<?php
function ___wejns_wp_whitespace_fix($input) {
    /* valid content-type? */
    $allowed = false;

    /* found content-type header? */
    $found = false;

    /* we mangle the output if (and only if) output type is text/* */
    foreach (headers_list() as $header) {
        if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
            $allowed = true;
        }

        if (preg_match("/^content-type:\\s+/i", $header)) {
            $found = true;
        }
    }

    /* do the actual work */
    if ($allowed || !$found) {
        return preg_replace("/\\A\\s*/m", "", $input);
    } else {
        return $input;
    }
}

/* start output buffering using custom callback */
ob_start("___wejns_wp_whitespace_fix");
?>

<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require('./wp-blog-header.php');
?>