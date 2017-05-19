<?php

function research_meta_boxes() {
	$research_meta_boxes = array(
		array(
			'id' => 'author_section',
			'title' => 'Author Section',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Lead Name',
					'desc' => '',
					'id' => 'lead_name',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Other Authors',
					'desc' => '',
					'id' => 'other_author',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Date Published',
					'desc' => '',
					'id' => 'date_published',
					'type' => 'date',
					'std' => ''
				)
			)
		)
	);
	foreach ( $research_meta_boxes as $meta_box ) {
		$research_box = new CreateMetaBox( $meta_box );
	}
}
add_action( 'init', 'research_meta_boxes' );