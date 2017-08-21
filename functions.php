<?php
/**
 * Require Once
 */
require_once 'src/setThemeGlobals.php';
require_once 'src/identifyEnvironmentFromIP.php';

/**
 * For Breadcrumbs and URLs
 */
setThemeGlobals(identifyEnvironmentFromIP($_SERVER['SERVER_ADDR'], $_SERVER['REMOTE_ADDR']));

/**
 * Include functions
 */
include 'inc/functions/research-metaboxes.php';
include 'inc/functions/taxonomy.php';
include 'inc/functions/functions-global.php';
include 'inc/functions/functions-templates.php';

/**
 * Add actions
 */
if (function_exists('add_action'))
{
    add_action('wp_enqueue_scripts', 'dequeue_parent_style', 9999);
    add_action('wp_head', 'dequeue_parent_style', 9999);
    add_action('wp_enqueue_scripts', 'tna_child_styles');
    add_action('init', 'custom_taxonomy');
    add_action('init', 'research_meta_boxes');
    add_action('init', 'section_landing_image_banner');
}
