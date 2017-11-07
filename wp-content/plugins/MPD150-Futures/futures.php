<?php

/*
Plugin Name: MPD150 Futures
Description: Used to generate the futures grid
Version: 1.0
Author: Peter VanKoughnett
Author URI: bigriverwebdesign.com
License: GPLv2 or later
*/

function create_posttype_future() {
 
    register_post_type( 'futures',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Futures' ),
                'singular_name' => __( 'Future' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Futures'), 
            'supports' => array('title','author')
        )
    );
}
add_action( 'init', 'create_posttype_future' );

function futures_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Future Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Future Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Future Categories', 'text_domain' ),
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
    register_taxonomy( 'future_categories', array( 'futures' ), $args );

}
add_action( 'init', 'futures_taxonomy', 0 );

function display_futures() {
     $args = array(
        'taxonomy' => 'future_categories',
        'hide_empty' => 'false'
    );
    $topics = get_terms($args);
    $modals='';
    ?>
    <div id='futures'>
    <script src='/wp-content/plugins/MPD150-Futures/futures.js'></script> <?php
    foreach ($topics as $topic) {
        $name = $topic->name;

        $slug = $topic->slug;
        ?> <div class='btn btn-info btn-lg category' class='topic' data-toggle='modal' data-target='#<?php echo($slug); ?>'>
            <h3> <?php echo $name ?> </h3>
            </div>
         <?php

        build_modals($topic,$name, $slug);
        ?>  <?php
    }
    ?> </div> <?php
}

function build_modals($topic, $name, $slug) {
    setup_postdata($topic);
        ?>
        <div id='<?php echo($slug); ?>' class='modal fade' role='dialog' data-backdrop='static'>
            <div class="modal-dialog modal-full">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>
                       <?php echo($name) ?>
                    </h2>
                </div>
                <div class="modal-body">
                    <h4> Existing Resources </h4>
                     <?php echo get_field('description', $topic); ?>
                     <div class="alternatives"> 
                        <h4> Alternatives </h4>
                        <h5> What do you want to see? </h5>

                        <?php
                          //form for users to submit alternatives online
                            $form_options = array(
                                "id" => "alternatives_form",
                                "post_id" => "new_post",
                                "post_title" => true,
                                "new_post" => array (
                                    "post_type"=>"futures",
                                    "post_status"=>"pending",
                                    "tax_input" => array(
                                        array("future_categories"=>array($slug)
                                        )
                                    )
                                ),
                                "submit_value"=>"Submit",
                                'updated_message' => __("Your idea has been submitted and will be posted once approved by an editor", 'acf'),
                            );
                            acf_form($form_options);

                
                        ?>
                        <ul>

                        <?php
                            // displaying submitted and published alternatives
                            $args = array(
                                "post_type"=>"futures",
                                "numberposts"=>-1,
                                "tax_query"=>array(
                                    array(
                                        "taxonomy"=>"future_categories",
                                        "field" => "slug",
                                        "terms" => $slug
                                    )
                                )
                            );
                            $posts = get_posts($args);
                            foreach ($posts as $post) {
                                echo "<li>" . get_field("content",$post) . "</li>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
<?php }


add_shortcode("futures", "display_futures");


