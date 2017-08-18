<?php
/*
Template Name: Research repository landing
*/
get_header();
?>
<?php get_template_part('breadcrumb'); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
                    <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header img-container"
                                 style="background-image: url('<?php echo make_path_relative($feat_image); ?>')">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content clearfix">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile;
                    else: ?>
                        <p>Sorry, no content</p>
                    <?php endif;
                    wp_reset_query(); ?>
                    <div class="secondary-content">
                        <?php
                        $args = array(
                            'post_type' => 'page',
                            'posts_per_page' => -1,
                            'post_parent' => $post->ID,
                            'order' => 'ASC',
                            'orderby' => 'menu_order',
                            'meta_key' => 'lead_author'
                        );
                        $child = new WP_Query($args); ?>
                        <?php if ($child->have_posts()) : while ($child->have_posts()) : $child->the_post(); ?>
                            <div class="content-box">
                                <a href="<?php echo make_path_relative( get_permalink() ); ?>" title="<?php the_title(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <span class="entry-meta"><?php display_authors(); ?></span>
                                <?php the_excerpt(); ?>
                                <hr>
                            </div>
                        <?php endwhile; else: ?>
                            <p>Sorry, no content</p>
                        <?php endif;
                        wp_reset_query(); ?>
                    </div>
                </main>
                <?php display_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>