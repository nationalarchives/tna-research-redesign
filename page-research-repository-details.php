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
                                <?php
                                $lead_author = get_post_meta( $post->ID, 'lead_author', true );
                                $other_authors = get_post_meta( $post->ID, 'other_author', true );
                                if (empty ($other_authors)) { echo '<strong>Author:</strong>';
                                } else { echo '<strong>Authors:</strong>'; }
                                    echo ' '.$lead_author;
                                    if (!empty ($other_authors)) {
	                                    echo ', '.$other_authors;
                                    }
                                    ?>
                                <hr>
								<?php the_content(); ?>
                            </div>
                        </article>
					<?php endwhile;
					else: ?>
                        <p>Sorry, no content</p>
					<?php endif;
					wp_reset_query(); ?>
                </main>
				<?php
				$sidebar = get_post_meta( $post->ID, 'sidebar', true );
				if ( $sidebar == 'false' ) {
					// do nothing
				} else {
					get_sidebar( 'siblings' );
				}
				?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>