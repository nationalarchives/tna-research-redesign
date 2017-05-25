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
                                <?php displayAuthors(); ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <strong>Date of publication: </strong>
                                    <?php displayDateOfPublication(); ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <strong>Keywords:</strong>
	                                <?php displayKeywordsTaxonomy() ?>
                                </span>
                                <br/>
                                <span class="entry-meta">
                                    <?php displayPublishedBy(); ?>
                                </span>
                                <hr>
								<?php the_content(); ?>
                                <?php displayFileUrlFileSize(); ?>
                            </div>
                        </article>
					<?php endwhile;
					else: ?>
                        <p>Sorry, no content</p>
					<?php endif;
					wp_reset_query(); ?>
                </main>
				<?php displaySidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>