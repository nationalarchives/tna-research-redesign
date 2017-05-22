<?php
/*
Template Name: Research repository landing
*/
get_header();
?>
<?php get_template_part( 'breadcrumb' ); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
					<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header img-container"
                                 style="background-image: url('<?php echo preg_replace( '/https?:\/\/research.(live|dev|test)lb\.nationalarchives\.gov\.uk\//', '/', $feat_image ); ?>')">
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
                    <div class="col-xs-12 col-md-12 secondary-content">
					    <?php
					    $lead_author = get_post_meta( $post->ID, 'lead_author', true );
						$args = array(
							'post_type'      => 'page',
							'posts_per_page' => - 1,
							'post_parent'    => $post->ID,
							'order'          => 'ASC',
							'orderby'        => 'meta_value',
							'meta_key'       => 'lead_author'
						);
						$child = new WP_Query( $args ); ?>
						<?php if ( $child->have_posts() ) : while ( $child->have_posts() ) : $child->the_post(); ?>
                            <div class="content-box">
                                <?php
    $lead_author = get_post_meta( $post->ID, 'lead_author', true );
    $other_authors = get_post_meta( $post->ID, 'other_author', true );
    ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <span class="entry-meta">
                                    <?php
                                        if ($other_authors) {
                                            echo '<strong>Authors:</strong>';
                                        } else {
                                            echo '<strong>Author:</strong>';
                                        }
                                    ?>
                                </span>
                                <span class="entry-meta">
                                    <?php
                                    echo $lead_author;
                                    if ($other_authors) {
                                        echo ' ; '.$other_authors;
                                    }
                                    ?>
                                </span>
                                <p><?php the_excerpt(); ?></p>
                                <hr>
                            </div>
						<?php endwhile;
						else: ?>
                            <p>Sorry, no content</p>
						<?php endif;
						wp_reset_query(); ?>
                    </div>
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