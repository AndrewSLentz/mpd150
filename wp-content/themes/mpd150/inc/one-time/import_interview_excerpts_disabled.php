<?php

function __update_post_meta( $post_id, $field_name, $value = '' )
{
    if ( empty( $value ) OR ! $value )
    {
        delete_post_meta( $post_id, $field_name );
    }
    elseif ( ! get_post_meta( $post_id, $field_name ) )
    {
        add_post_meta( $post_id, $field_name, $value );
    }
    else
    {
        update_post_meta( $post_id, $field_name, $value );
    }
}

function import_excerpts() {
   // after all execution rename your file;
/*   rename( get_template_directory() . '/inc/one-time/import_interview_excerpts.php' , get_template_directory() . '/inc/one-time/import_interview_excerpts_disabled.php' );
	echo('script run!');*/

	$data = array_map('str_getcsv', file(get_template_directory() . "/dedoose-data/10-27-excerpt.csv"));


	$fields = array("media_title", "start", "end", "quote","codes");


	for ($i=7;$i<sizeof($data);$i++) {

		 $my_post = array(
		    'post_title' => $data[$i][3],
		    'post_status' => 'publish',
		    'post_type' => 'interviewexcerpts',
		);
		$the_post_id = wp_insert_post( $my_post );
		__update_post_meta( $the_post_id, 'quote', $data[$i][3] );
		__update_post_meta( $the_post_id, 'media_title', $data[$i][0] );
		__update_post_meta( $the_post_id, 'start', $data[$i][1] );
		__update_post_meta( $the_post_id, 'end', $data[$i][2] );
		

		/* adding codes as tags */
		$tag_array=explode(", ", $data[$i][4]);
		for ($j=0;$j<sizeof($tag_array);$j++) {
			if (!term_exists( $tag_array[$j], 'excerpt-codes' )) {
				wp_insert_term($tag_array[$j], 'excerpt-codes' );
			}
			$term_id = term_exists( $tag_array[$j], 'excerpt-codes' );
			print_r($term_id);
			$terms = wp_set_post_terms($the_post_id,$term_id,'excerpt-codes','true');
		}

	}
}

add_action( 'wp_footer', 'import_excerpts' );