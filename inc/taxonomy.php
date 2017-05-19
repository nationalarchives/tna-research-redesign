<?php
function custom_taxonomy() {
	$labels = array(
		'name'              => 'Repository keywords',
		'singular_name'     => 'Keyword',
		'search_items'      => 'Search Keyword',
		'all_items'         => 'All keywords',
		'parent_item'       => 'Parent keyword',
		'parent_item_colon' => 'Parent keyword:',
		'edit_item'         => 'Edit keyword',
		'update_item'       => 'Update keyword',
		'add_new_item'      => 'Add new keyword type',
		'new_item_name'     => 'New keyword name',
		'menu_name'         => 'Repository keywords'
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'keyword' )
	);
	register_taxonomy( 'keywords', 'page', $args );
}
add_action( 'init', 'custom_taxonomy' );