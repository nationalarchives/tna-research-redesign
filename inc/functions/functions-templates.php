<?php

/**
 * Display Authors
 */
function display_authors() {
	global $post;

	if ( function_exists( 'get_post_meta' ) ) {
		$lead_author   = get_post_meta( $post->ID, 'lead_author', true );
		$other_authors = get_post_meta( $post->ID, 'other_author', true );

		if ( empty ( $other_authors ) ) {
			echo '<strong>Author:</strong>';
		} else {
			echo '<strong>Authors:</strong>';
		}
		echo ' ' . $lead_author;
		if ( ! empty ( $other_authors ) ) {
			echo '; ' . $other_authors;
		}
	}

	return false;
}

/**
 * @return bool
 */
function display_sidebar() {
	global $post;
	if ( function_exists( 'get_post_meta' ) & function_exists( 'get_sidebar' ) ) {
		if ( get_post_meta( $post->ID, 'sidebar', true ) == 'false' ) {
			// do nothing
		} else {
			//get_sidebar(get_post_meta($post->ID, 'research-details', true));
			get_sidebar( 'research-details' );
		}
	}

	return false;
}


/**
 * @return bool
 */
function display_date_of_publication() {
	global $post;

	if ( function_exists( 'get_post_meta' ) ) {
		echo date( 'd F Y', strtotime( get_post_meta( $post->ID, 'date_published', true ) ) );
	}

	return false;
}

/**
 * @return bool
 */
function display_keywords_taxonomy() {
	global $post;
	if ( function_exists( 'wp_get_post_terms' ) ) {
		//displaying custom taxonomy 'keywords'
		$keywords_terms = wp_get_post_terms( $post->ID, 'keywords' );
		$i              = 0;
		foreach ( $keywords_terms as $term ) {
			$i ++;
			if ( $i > 1 ) {
				echo ', ';
			}
			echo $term->name;
		}
	}

	return false;
}

/**
 * @return bool
 */
function display_published_by() {
	global $post;
	if ( function_exists( 'get_post_meta' ) ) {
		$publishedBy = get_post_meta( $post->ID, 'published_by', true );
		if ( $publishedBy ) {
			echo "<strong>Published in:</strong> $publishedBy";
		}
	}

	return false;
}

/**
 * @return bool
 */
function display_file_url_file_size() {
	global $post;
	if ( function_exists( 'get_post_meta' ) ) {
		$fileUrl   = get_post_meta( $post->ID, 'file_url', true );
		$fileSize  = get_post_meta( $post->ID, 'file_size', true );
		$urlString = sprintf( '
                                    <div class="file-link">
                                        <a class="button bottom-spacing" target="_blank" href="%s">View (PDF, %s)</a>
                                    </div>', $fileUrl, $fileSize );
		if ( $fileSize && $fileUrl == true ) {
			echo $urlString;
		}
	}

	return false;
}

/**
 * Display Sidebar Title
 */
function sidebar_title() {
	global $post;
	if ( function_exists( 'is_page_template' ) && function_exists('get_post') && function_exists('get_option') && function_exists('get_post_meta') ) {
		$parent_id       = $post->post_parent;
		$home_title = get_the_title( get_option('page_on_front') );
		$home_id    = get_option( 'page_on_front' );
		// This gets the link to the parent page, based on the parent page ID
		$parent_page_id  = ( $parent_id == 0 ? $home_id : $parent_id );
		$redirectHeading = get_post_meta( $parent_page_id, 'redirectUrl', true );
		if ( is_page_template( 'page-research-repository-landing.php' ) || is_page_template( 'page-research-repository-details.php' && $redirectHeading )) {
			echo 'Also in ' . $home_title;
		}
	}
	return false;
}

/**
 * Display Sidebar Content
 */
function sidebar_content() {
	global $post;
	if ( function_exists( 'is_page_template' ) && function_exists( 'get_post_meta' ) && function_exists('get_option') && function_exists('get_pages') ) {
		   $parent_id       = $post->post_parent;
	       $home_id = get_option('page_on_front');
		if ( is_page_template( 'page-research-repository-landing.php' ) ) {
			$args = array(
				'child_of'     => $parent_id,
				'parent'       => $parent_id,
				'hierarchical' => 0,
				'sort_column'  => 'menu_order',
				'post_type'    => 'page',
				'post_status'  => 'publish',
                'exclude'      => array($post->ID, $home_id)
			);
		} elseif ( is_page_template( 'page-research-repository-details.php' ) ) {
		    $frontPage = get_option('page_on_front');
		    $frontPageID = $frontPage->ID;
			$args = array(
				'child_of'     => $frontPageID,
				'parent'       => $frontPageID,
				'hierarchical' => 0,
				'sort_column'  => 'menu_order',
				'exclude'      => array($parent_id, $home_id),
				'post_type'    => 'page',
				'post_status'  => 'publish'
			);
		}
		$pages = get_pages( $args );
		foreach ( $pages as $page ) {
			$redirect = get_post_meta( $page->ID, 'redirectUrl', true );
			if ( $redirect ) { ?>
                <li>
                    <a href="<?php echo $redirect; ?>" title="<?php echo $page->post_title ?>">
						<?php echo 'Blah' ?>
                    </a>
                </li>
			<?php } else { ?>
                <li>
                    <a href="<?php echo make_path_relative( get_page_link( $page->ID ) ); ?>"
                       title="<?php echo $page->post_title ?>">
						<?php echo $page->post_title; ?>
                    </a>
                </li>
			<?php }
		}
	}
	return false;
}