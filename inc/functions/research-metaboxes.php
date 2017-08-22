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
					'name' => 'Lead Author',
					'desc' => '',
					'id' => 'lead_author',
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
				),
				array(
					'name' => 'Published by',
					'desc' => '',
					'id' => 'published_by',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'File Url',
					'desc' => 'Type or paste the url for the file in this field',
					'id' => 'file_url',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'File Size',
					'desc' => 'Type or paste the file size for the file',
					'id' => 'file_size',
					'type' => 'text',
					'std' => ''
				),
			)
		)
	);
	if (isset($_GET['post'])) {
		$post_id = $_GET['post'];
	} else {
		if (isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		} else {
			$post_id = '';
		}
	}
	if( !isset( $post_id ) ) return;
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
	if ($template_file == 'page-research-repository-details.php') {
		foreach ( $research_meta_boxes as $meta_box ) {
			$research_box = new CreateMetaBox( $meta_box );
		}
	}
}

/**
 *
 */
function section_landing_image_banner() {
    $section_landing_meta_boxes = array(
        array(
            'id' => 'section_landing_image_banner',
            'title' => 'Section landing image banner',
            'pages' => 'page',
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Action button title',
                    'desc' => '',
                    'id' => 'action_button_title',
                    'type' => 'text',
                    'std' => ''
                ),
                array(
                    'name' => 'Action button url',
                    'desc' => '',
                    'id' => 'action_button_url',
                    'type' => 'text',
                    'std' => ''
                )
            )
        )
    );
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else {
        if (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        } else {
            $post_id = '';
        }
    }
    if( !isset( $post_id ) ) return;
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'section-landing-image-banner.php') {
        foreach ( $section_landing_meta_boxes as $meta_box ) {
            $research_box = new CreateMetaBox( $meta_box );
        }
    }
}

