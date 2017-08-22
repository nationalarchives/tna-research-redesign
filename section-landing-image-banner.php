<?php
/*
Template Name: Section landing image banner
*/

if (function_exists('get_header')
    && function_exists('get_template_part')
    && function_exists('have_posts')
    && function_exists('the_post')
    && function_exists('the_title')
    && function_exists('get_footer')
    && function_exists('get_image_caption')
) {
    global $post;
    get_header();
    get_template_part('breadcrumb');  ?>

    <main id="primary" role="main" class="level-one">
        <?php while (have_posts()) : the_post(); ?>
            <div class="container">
                <div class="row" role="banner">
                    <div class="col-md-12">
                        <article class="banner feature-img feature-img-bg" <?= if_has_post_thumb(); ?>>
                            <div class="entry-header"><h1><?php the_title(); ?></h1></div>
                            <?php banner_content_overlay() ?>
                            <?php get_image_caption('top') ?>
                        </article>
                    </div>
                </div>
                <?php get_template_part('inc/content/children-grandchildren-loop'); ?>
            </div>
        <?php endwhile; ?>
    </main>
    <?php get_footer();
}
