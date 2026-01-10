<?php

function add_setup_config() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('menus');

  register_nav_menus([
    // 'header_menu' => 'Menu do Cabeçalho',
  ]);
}
add_action('after_setup_theme', 'add_setup_config', 0);

require_once __DIR__ . '/vite.php';

add_action('wp_enqueue_scripts', 'vite_enqueue_assets');
