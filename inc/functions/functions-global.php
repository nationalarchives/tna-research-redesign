<?php
/**
 * Dequeue parent styles for re-enqueuing in the correct order
 */
function dequeue_parent_style()
{
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}

/**
 * Enqueue styles in correct order
 */
function tna_child_styles()
{
    wp_register_style('tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(),
        EDD_VERSION, 'all');
    wp_register_style('tna-child-styles', get_stylesheet_directory_uri() . '/css/main.min.css', array(), '0.1', 'all');
    wp_enqueue_style('tna-parent-styles');
    wp_enqueue_style('tna-child-styles');
}

/**
 * @return string
 */
function if_has_post_thumb()
{
    global $post;
    /**
     * Check if Wordpress functions exists
     * Let the IDE know that you know you are in control
     * */
    if (function_exists('has_post_thumbnail')
        && function_exists('wp_get_attachment_image_src')
        && function_exists('get_post_thumbnail_id')
        && function_exists('make_path_relative_no_pre_path')
    ) {
        $style = '';
        if (has_post_thumbnail()) {
            $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full-page-width');
            $style = 'style="background-image: url(' . make_path_relative_no_pre_path($thumbnail_src[0]) . ');"' ?>
        <?php }
    }
    return $style;
}

/**
 * Show / hide banner content overlay
 */
function banner_content_overlay ()
{
    global $post;
    /**
     * Check if Wordpress functions exists
     * Let the IDE know that you know you are in control
     * */
    if (function_exists('get_post_meta')
        && function_exists('the_content')
    ) {
        $buttonTitle = get_post_meta($post->ID, 'action_button_title', true);
        $buttonUrl = get_post_meta($post->ID, 'action_button_url', true);
        if (empty($post->post_content)) {
            // Do nothing - banner content overlay is not displayed
        } else { // Banner content overlay ?>
            <div class="entry-content">
                <div class="col-xs-9 page-content">
                    <?php the_content(); ?>
                </div>
                <?php
                if ($buttonTitle) { ?>
                    <div class="col-xs-3 call-to-action-button">
                        <a href="<?= $buttonUrl; ?>" title="<?= $buttonTitle; ?>" class="ghost-button">
                            <?= $buttonTitle; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php }
    }
}