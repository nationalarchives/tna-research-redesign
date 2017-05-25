<?php

/**
 * Display Authors
 */
function display_authors()
{
    global $post;

    if (function_exists('get_post_meta')) {
        $lead_author = get_post_meta($post->ID, 'lead_author', true);
        $other_authors = get_post_meta($post->ID, 'other_author', true);

        if (empty ($other_authors)) {
            echo '<strong>Author:</strong>';
        } else {
            echo '<strong>Authors:</strong>';
        }
        echo ' ' . $lead_author;
        if (!empty ($other_authors)) {
            echo '; ' . $other_authors;
        }
    }
    return false;
}

/**
 * @return bool
 */
function display_sidebar()
{
    global $post;
    if (function_exists('get_post_meta') & function_exists('get_sidebar')) {
        if (get_post_meta($post->ID, 'sidebar', true) == 'false') {
            // do nothing
        } else {
            get_sidebar(get_post_meta($post->ID, 'sidebar', true));
        }
    }
    return false;
}

/**
 * @return bool
 */
function display_date_of_publication()
{
    global $post;

    if (function_exists('get_post_meta')) {
        echo date('d F Y', strtotime(get_post_meta($post->ID, 'date_published', true)));
    }
    return false;
}

/**
 * @return bool
 */
function display_keywords_taxonomy()
{
    global $post;
    if (function_exists('wp_get_post_terms')) {
        //displaying custom taxonomy 'keywords'
        $keywords_terms = wp_get_post_terms($post->ID, 'keywords');
        $i = 0;
        foreach ($keywords_terms as $term) {
            $i++;
            if ($i > 1) {
                echo ', ';
            }
            echo $term->name;
        }
    }

    return false;
}

/**
 * @return bool
 */
function display_published_by()
{
    global $post;
    if (function_exists('get_post_meta')) {
        $publishedBy = get_post_meta($post->ID, 'published_by', true);
        if ($publishedBy) {
            echo "<strong>Published by:</strong> $publishedBy";
        }
    }

    return false;
}

/**
 * @return bool
 */
function display_file_url_file_size()
{
    global $post;
    if (function_exists('get_post_meta')) {
        $fileUrl = get_post_meta($post->ID, 'file_url', true);
        $fileSize = get_post_meta($post->ID, 'file_size', true);
        $urlString = sprintf('
                                    <div class="file-link">
                                        <a class="button bottom-spacing" target="_blank" href="%s">View (PDF, %s)</a>
                                    </div>', $fileUrl, $fileSize);
        if ($fileSize && $fileUrl == true) {
            echo $urlString;
        }
    }
    return false;
}