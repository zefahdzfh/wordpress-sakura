<?php
if (!defined('SAKURA_WA')) define('SAKURA_WA', '6281234567890'); // ganti nomor WA asli

// Theme support dasar
function sakura_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  register_nav_menus(['primary' => 'Menu Utama']);
}
add_action('after_setup_theme', 'sakura_setup');

// Enqueue CSS & JS
function sakura_enqueue()
{
  wp_enqueue_style('sakura-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
  wp_enqueue_script('sakura-main', get_template_directory_uri() . '/assets/js/main.js', [], filemtime(get_template_directory() . '/assets/js/main.js'), true);
  wp_localize_script('sakura-main', 'sakuraData', [
    'wa' => SAKURA_WA,
  ]);
}
add_action('wp_enqueue_scripts', 'sakura_enqueue');

// Custom Post Type + Taxonomy Menu Item
function sakura_register_menu_item()
{
  register_post_type('menu_item', [
    'labels' => ['name' => 'Menu Items', 'singular_name' => 'Menu Item'],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'menu'],
    'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('menu_kategori', 'menu_item', [
    'labels' => ['name' => 'Kategori Menu'],
    'public' => true,
    'hierarchical' => true,
    'show_admin_column' => true,
  ]);
}
add_action('init', 'sakura_register_menu_item');
