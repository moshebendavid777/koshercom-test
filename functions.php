<?php
function ns_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'ns_enqueue_styles');

function register_recipe_post_type()
{
  $labels = array(
    'name'               => __('Recipes'),
    'singular_name'      => __('Recipe'),
    'add_new'            => __('Add New Recipe'),
    'add_new_item'       => __('Add New Recipe'),
    'edit_item'          => __('Edit Recipe'),
    'new_item'           => __('New Recipe'),
    'view_item'          => __('View Recipe'),
    'search_items'       => __('Search Recipes'),
    'not_found'          => __('No recipes found'),
    'not_found_in_trash' => __('No recipes found in Trash'),
    'all_items'          => __('All Recipes'),
    'archives'           => __('Recipe Archives'),
    'insert_into_item'   => __('Insert into recipe'),
    'uploaded_to_this_item' => __('Uploaded to this recipe'),
    'featured_image'     => __('Featured image'),
    'set_featured_image' => __('Set featured image'),
    'remove_featured_image' => __('Remove featured image'),
    'use_featured_image' => __('Use as featured image'),
    'menu_name'          => __('Recipes'),
    'filter_items_list'  => __('Filter recipes list'),
    'items_list_navigation' => __('Recipes list navigation'),
    'items_list'         => __('Recipes list'),
    'name_admin_bar'     => __('Recipe'),
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'menu_icon'           => 'dashicons-list-view',
  );

  register_post_type('recipe', $args);
}
add_action('init', 'register_recipe_post_type');



function typesense_available_cpt($available_post_types)
{
  $available_post_types['recipe'] = ['label' => 'Recipe', 'value' => 'recipe'];

  return $available_post_types;
}
add_filter('cm_typesense_available_index_types', 'typesense_available_cpt');
