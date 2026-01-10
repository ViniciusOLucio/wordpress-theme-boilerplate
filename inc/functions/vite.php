<?php

/**w
 * Helper para carregar assets do Vite no WordPress
 */

function is_vite_development() {
  return file_exists(get_theme_file_path('hot'));
}

function vite_asset($entry) {
  if (is_vite_development()) {
    return 'http://localhost:5173/' . $entry;
  }

  $manifest_path = get_theme_file_path('dist/.vite/manifest.json');

  if (!file_exists($manifest_path)) {
    return '';
  }

  $manifest = json_decode(file_get_contents($manifest_path), true);

  if (isset($manifest[$entry])) {
    return get_theme_file_uri('dist/' . $manifest[$entry]['file']);
  }

  return '';
}

function vite_enqueue_assets() {
  if (is_vite_development()) {
    wp_enqueue_script(
      'vite-client',
      'http://localhost:5173/@vite/client',
      [],
      null,
      false
    );
  }

  wp_enqueue_script(
    'theme-app',
    vite_asset('assets/js/app.js'),
    [],
    null,
    false
  );

  add_filter('script_loader_tag', function($tag, $handle) {
    if ($handle === 'vite-client' || $handle === 'theme-app') {
      // Remove o type="text/javascript" e adiciona type="module"
      $tag = preg_replace('/type=["\']text\/javascript["\']/', '', $tag);
      $tag = str_replace('<script', '<script type="module"', $tag);
    }
    return $tag;
  }, 10, 2);

  if (!is_vite_development()) {
    $css_path = vite_asset('assets/css/main.scss');
    if ($css_path) {
      wp_enqueue_style(
        'theme-style',
        $css_path,
        [],
        null
      );
    }
  }
}
