<?php

/*
Plugin Name: MPD150 Interviews
Description: Used to generate the interviews grid
Version: 1.0
Author: Peter VanKoughnett
Author URI: bigriverwebdesign.com
License: GPLv2 or later
*/

function create_posttype_interview() {
 
    register_post_type( 'interview excerpts',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Interview excerpts' ),
                'singular_name' => __( 'Interview excerpt' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Interviews'), 
            'supports' => array('title','author')
        )
    );
}
add_action( 'init', 'create_posttype_interview' );

function display_codes() {

    ?> <div id='interview-codes'> <?php
    /* Get all topical codes */
    $args = array(
        'taxonomy' => 'excerpt-codes',
        'exclude' => '29',
        'exclude_tree' => '33' // excludes role and descendants
    );
    $topics = get_terms($args);
    ?> <h3> Topics </h3>
    <form id='topics'> <?php
    foreach ($topics as $topic) {
        $name = $topic->name;
        $slug = $topic->slug;
        echo sprintf("<div><input type='radio' id='%s' name='topic'><label for='%s'>%s</label></div>",$slug,$slug,$name);
    }?>
    </form>
   <?php

    /* Get all role codes */
    $args = array(
        'taxonomy' => 'excerpt-codes',
        'parent' => '33'
    );

     $roles = get_terms($args);
    ?> <h3> Roles </h3>
    <form id='roles'> <?php
    foreach ($roles as $role) {
        $name = $role->name;
        $slug = $role->slug;
        echo sprintf("<div><input type='radio' id='%s' name='role'><label for='%s'>%s</label></div>",$slug,$slug,$name);
    }?>
    </form>
    <button id="show-all" type="button" class='btn-default btn aligncenter margin-md'> Show All </button>
    </div> <!-- interview codes -->
    <script src="/wp-content/plugins/MPD150-Interviews/interviews.js"></script>

    <?php

}


function display_interviews() {

    display_codes();
    global $post;

    $posts = get_posts(array(
        'posts_per_page'    => -1,
        'post_type'         => 'interviewexcerpts',
    ));


    ?>
    <!-- Created by MPD150-Timeline Plugin -->
     <div class='card-container'><?php

    if( $posts ): 
        foreach( $posts as $post ):

            setup_postdata($post); 
            $slug = sanitize_title(get_the_title());
            ?>
                <div <?php post_class('card')?> >
                    <div class='margin-md'><?php the_title()?></div>
                    <?php 
                    $interview_file_name_doc = get_field('media_title');
                    $interview_file_name_txt = substr($interview_file_name_doc, 0, strpos($interview_file_name_doc,".")) . ".txt";
                    $interview_file_name_txt = str_replace([" ", "#"], "", $interview_file_name_txt);
                    $interview_file_name_txt = urlencode($interview_file_name_txt);
                    $interview_url= $_SERVER['DOCUMENT_ROOT'] . "/wp-content/uploads/interviews/" . $interview_file_name_txt;
                    $interview = file_exists($interview_url);

                    if ($interview) {
                        ?><h4 class="alignleft margin-xs" data-toggle='modal' data-target='#<?php echo $slug ?>'>Read full interview >
                        </h4>
                        <div id='<?php echo($slug); ?>' class='modal fade' role='dialog'>
                            <div class="modal-dialog modal-full">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2>
                                        Full Interview Transcript
                                    </h2>
                                </div>
                                <div class="modal-body">
                                    <?php include($interview_url) ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                         <?php
                    }


                   
                    ?>


                </div>
        <?php endforeach;
    endif; 
	
}

add_shortcode("interviews", "display_interviews");

// Register Custom Taxonomy
function codes_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Codes', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Code', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Codes', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'excerpt-codes', array( 'interviewexcerpts' ), $args );

}
add_action( 'init', 'codes_taxonomy', 0 );

/*function timeline_scriptsandstyles() {
    if (is_page("30")) {
        wp_enqueue_script("interviews", '/wp-content/plugins/MPD150-Timeline/js/interviews.js', array( 'jquery' ), '1.0.0', true );
    }
}*/

?>