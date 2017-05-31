<?php
/*
Template Name: Research repository details
*/
get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content clearfix">
                                <span class="entry-meta">
                                <?php display_authors(); ?>
                                </span>
                                <br/>
	                            <?php
                                    global $post;
                                    $datePublished = get_post_meta( $post->ID, 'date_published', true );
                                    if (!empty($datePublished)) {
	                                    echo'<span class="entry-meta">';
                                        echo '<strong>Date of publication: </strong>';
                                        display_date_of_publication();
                                        echo '</span><br/>';
                                    }
                                ?>
								<?php
                                    if ( display_keywords_taxonomy() >= 1 ) {
                                        echo '<span class="entry-meta">';
                                        echo '<strong>Keywords:</strong>';
                                        display_keywords_taxonomy();
                                        echo '</span><br/>';
                                    }
								?>
                                <?php
                                    $publishedBy = get_post_meta( $post->ID, 'published_by', true );
                                    if (!empty($publishedBy)) {
                                        echo '<span class="entry-meta">';
                                        display_published_by();
                                        echo '</span>';
                                    }
                                ?>
                                <hr>
								<?php the_content(); ?>
								<?php display_file_url_file_size(); ?>
                            </div>
                        </article>
					<?php endwhile;
					else: ?>
                        <p>Sorry, no content</p>
					<?php endif;
					wp_reset_query(); ?>
                </main>
				<?php display_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>