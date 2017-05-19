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
	                <?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-header img-container"
                                 style="background-image: url('<?php echo preg_replace('/https?:\/\/research.(live|dev|test)lb\.nationalarchives\.gov\.uk\//','/', $feat_image); ?>')">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="entry-content clearfix">
								<?php the_content(); ?>
                            </div>
                        </article>
					<?php endwhile; endif; ?>
                    <div class="col-xs-12 col-md-12 secondary-content">
                        <div class="content-box">
                            <a href="#"><h3>This is a title</h3></a>
                            <span class="entry-meta">
                                <strong>Author:</strong>
                            </span>
                            <span class="entry-meta">
                                John Doe
                            </span>
                            <p>
                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero
                                are also reproduced in their exact original form, accompanied by English versions from
                                the 1914 translation by H. Rackham.
                            </p>
                            <hr>
                        </div>
                        <div class="content-box">
                            <a href="#"><h3>This is a title</h3></a>
                            <span class="entry-meta">
                                <strong>Author:</strong>
                            </span>
                            <span class="entry-meta">
                                John Doe
                            </span>
                            <p>
                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero
                                are also reproduced in their exact original form, accompanied by English versions from
                                the 1914 translation by H. Rackham.
                            </p>
                            <hr>
                        </div>
                        <div class="content-box">
                            <a href="#"><h3>This is a title</h3></a>
                            <span class="entry-meta">
                                <strong>Author:</strong>
                            </span>
                            <span class="entry-meta">
                                John Doe
                            </span>
                            <p>
                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero
                                are also reproduced in their exact original form, accompanied by English versions from
                                the 1914 translation by H. Rackham.
                            </p>
                            <hr>
                        </div>
                    </div>
                </main>
				<?php
				$sidebar = get_post_meta( $post->ID, 'sidebar', true );
				if ( $sidebar == 'false' ) {
					// do nothing
				} else {
					get_sidebar( $sidebar );
				}
				?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>