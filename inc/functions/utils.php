<?php

function get_prop($obj, $keys, $fallback_value = null) {
  $is_key_array = gettype($keys) === 'array';

  if ($is_key_array && count($keys) === 0) {
    return $fallback_value;
  }

  $key = $is_key_array ? $keys[0] : $keys;

  if (!$obj || !property_exists((object) $obj, $key)) {
    return $fallback_value;
  }

  $obj_value = gettype($obj) === 'object' ? $obj->$key : $obj[$key];

  if ($is_key_array && count($keys) > 1) {
    return get_prop($obj_value, array_slice($keys, 1));
  }

  return $obj_value;
}

function get_template_name($page_id = null) {
  if (is_single()) {
    return get_post_type();
  }
  if (!$page_id) {
    $page_id = get_the_ID();
  }
  $template_file = get_post_meta($page_id, '_wp_page_template', true);
  if ($template_file == 'default' || !$template_file) {
    return 'default';
  }
  $templates = wp_get_theme()->get_page_templates();
  return strtolower( $templates[$template_file] );
}

function get_image_alt_text($image_id) {
  $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
  return (bool) $alt_text ? $alt_text : '';
}
