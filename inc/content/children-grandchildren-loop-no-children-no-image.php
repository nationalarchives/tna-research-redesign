<div class="row equal-heights" id="equal-heights">
	<?php
	$page_id    = ( is_front_page() ? 0 : get_the_ID() ); //Gets the id for the current page.
	$childpages = new WP_Query( array(
			'post_type'      => 'page',
			'post_parent'    => $page_id,
			'posts_per_page' => - 1,
			'post__not_in'   => array( get_option( 'page_on_front' ) ),
			'orderby'        => 'menu_order date',
			'order'          => 'ASC'
		)
	);
	while ( $childpages->have_posts() ) : $childpages->the_post();
		?>
        <div class="col-xs-12 col-sm-6 col-md-6 box">
            <article>
                <div class="entry-header">
                    <h2 class="separator-heading">
						<?php $redirect = get_post_meta( $post->ID, 'redirectUrl', true );
						if ( $redirect ) { ?>
                            <a href="<?php echo $redirect; ?>" title="<?php echo $post->post_title ?>">
								<?php the_title(); ?>
                            </a>
						<?php } else { ?>
                            <a href="<?php echo make_path_relative( get_page_link() ); ?>"
                               title="<?php echo $post->post_title ?>">
								<?php the_title(); ?>
                            </a>
						<?php } ?>
                    </h2>
                </div>
                <div class="entry-content clearfix">
						<?php
						if ( has_excerpt( $post->ID ) ) {
							echo the_excerpt();
						} else {
							echo "<p>" . first_sentence( get_the_content() ) . "</p>";
						}
						?>
                </div>
            </article>
        </div>
	<?php endwhile;
	wp_reset_postdata();
	?>
</div>