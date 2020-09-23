<?php 

// Change Posts post type to Whatever on frontend
function qb_starter_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Zine';
    $submenu['edit.php'][5][0] = 'Zine';
    $submenu['edit.php'][10][0] = 'Add Article';
    $submenu['edit.php'][16][0] = 'Article Tags';
}
function qb_starter_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    
    $labels->name = 'Article';
    $labels->singular_name = 'Article';
    $labels->add_new = 'Add Articles';
    $labels->add_new_item = 'Add Articles';
    $labels->edit_item = 'Edit Articles';
    $labels->new_item = 'Articles';
    $labels->view_item = 'View Articles';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No Articles found';
    $labels->not_found_in_trash = 'No Articles found in Trash';
    $labels->all_items = 'All Articles';
    $labels->menu_name = 'Articles';
    $labels->name_admin_bar = 'Zine';
}
add_action( 'admin_menu', 'qb_starter_change_post_label' );
add_action( 'init', 'qb_starter_change_post_object' );