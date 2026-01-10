<?php

include 'inc/functions/utils.php';
include 'inc/functions/reset-wp.php';
include 'inc/functions/setup-theme.php';

function studiomodus_numeric_pagination($query)
{
  /** Stop execution if there's only 1 page */
  if ($query->max_num_pages <= 1) {
    return;
  }

  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
  $max = intval($query->max_num_pages);

  /** Add current page to the array */
  if ($paged >= 1) {
    $links[] = $paged;
  }

  /** Add the pages around the current page to the array */
  if ($paged >= 3) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if (($paged + 2) <= $max) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="pagination"><ul>' . "\n";

  /** Previous Post Link */
  // if (get_previous_posts_link()) {
  //   $previous_arrow = '<svg style="transform: rotate(180deg);" xmlns="http://www.w3.org/2000/svg" width="15" height="26.237" viewBox="0 0 15 26.237"><path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M21.729,19.309,11.8,9.389a1.875,1.875,0,0,1,2.656-2.648L25.7,17.981a1.871,1.871,0,0,1,.055,2.585L14.465,31.884a1.875,1.875,0,1,1-2.656-2.648Z" transform="translate(-11.251 -6.194)" fill="#000000"/></svg>';
  //   printf('<li class="pagination-previous">%s</li>' . "\n", get_previous_posts_link($previous_arrow));
  // }

  /** Link to first page, plus ellipses if necessary */
  if (!in_array(1, $links)) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

    if (!in_array(2, $links)) {
      echo '<li>…</li>';
    }
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort($links);
  foreach ((array) $links as $link) {
    $class = $paged == $link ? ' class="active"' : '';
    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
  }

  /** Link to last page, plus ellipses if necessary */
  if (!in_array($max, $links)) {
    if (!in_array($max - 1, $links)) {
      echo '<li>…</li>' . "\n";
    }

    $class = $paged == $max ? ' class="active"' : '';
    printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
  }

  /** Next Post Link */
  // if (get_next_posts_link('>', $query->max_num_pages)) {
  //   $next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="26.237" viewBox="0 0 15 26.237"><path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M21.729,19.309,11.8,9.389a1.875,1.875,0,0,1,2.656-2.648L25.7,17.981a1.871,1.871,0,0,1,.055,2.585L14.465,31.884a1.875,1.875,0,1,1-2.656-2.648Z" transform="translate(-11.251 -6.194)" fill="#000000"/></svg>';
  //   printf('<li class="pagination-next">%s</li>' . "\n", get_next_posts_link($next_arrow, $query->max_num_pages));
  // }

  echo '</ul></div>' . "\n";
}

function get_field2($key, $page_id = 0)
{
  $id = $page_id !== 0 ? $page_id : get_the_ID();

  return get_post_meta($id, $key, true);
}
function the_field_2($key, $page_id = 0)
{
  echo get_field2($key, $page_id);
}



