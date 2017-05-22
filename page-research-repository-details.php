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
                                $lead_author   = get_post_meta( $post->ID, 'lead_author', true );
                                $other_authors = get_post_meta( $post->ID, 'other_author', true );
                                if ( empty ( $other_authors ) ) {
	                                echo '<strong>Author:</strong>';
                                } else {
	                                echo '<strong>Authors:</strong>';
                                }
                                echo ' ' . $lead_author;
                                if ( ! empty ( $other_authors ) ) {
	                                echo ' ; ' . $other_authors;
                                }
                                ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <strong>Date of publication: </strong>
                                    <?php
                                    $date_published = get_post_meta( $post->ID, 'date_published', true );
                                    $format_date = date('d F Y', strtotime($date_published));
                                    echo $format_date;
                                    ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <strong>Keywords:</strong>
	                                <?php
	                                //displaying custom taxonomy 'keywords'
	                                $keywords_terms = wp_get_post_terms($post->ID, 'keywords');
	                                $i = 0;
	                                foreach ( $keywords_terms as $term ) { $i++;
		                                if ( $i > 1 ) {
			                                echo ', ';
		                                }
		                                echo $term->name;
	                                }
	                                ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <?php
                                        $publishedBy = get_post_meta( $post->ID, 'published_by', true );
                                        if ($publishedBy) {
                                            echo "<strong>Published by:</strong> $publishedBy";
                                        }
                                    ?>
                                </span>
                                <hr>
								<?php the_content(); ?>
                                <?php
                                    $fileUrl = get_post_meta( $post->ID, 'file_url', true );
                                    $fileSize = get_post_meta( $post->ID, 'file_size', true );
                                    $urlString = sprintf('
                                    <div class="file-link">
                                        <a class="button bottom-spacing" target="_blank" href="%s">View (PDF, %s)</a>
                                    </div>', $fileUrl, $fileSize);
                                    if ($fileSize && $fileUrl == true) {
                                        echo $urlString;
                                    }
                                ?>
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
					get_sidebar( 'research-details' );
				}
				?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>