<?php
/*
Template Name: Section landing with no images or children
*/
get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>
	<main id="primary" role="main" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<article>
						<div class="entry-header">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row entry-content">
							<?php get_template_part( 'inc/content/feature-box' ); ?>
						</div>
					</article>
				</div>
			</div>
			<?php get_template_part( 'inc/content/children-grandchildren-loop-no-children-no-image' ); ?>
		</div>
	</main>
<?php get_footer(); ?>