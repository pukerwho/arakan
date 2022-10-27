<?php 

function filter_places() {
  //Получаем данные
  $current_cat_id = stripslashes_deep($_POST['city_id']);
  $keyArray = stripslashes_deep($_POST['keyArray']);
  foreach ($keyArray as $key) {
    $filterargs = array(
      'key' => $key,
      'value' => 'yes',
      'compare' => '='
    ); 
  }

  $ajax_query = new WP_Query( array( 
    'post_type' => 'places', 
    'posts_per_page' => -1,
    'order'    => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => 'city',
        'terms' => $current_cat_id,
        'field' => 'term_id',
        'include_children' => true,
        'operator' => 'IN'
      )
    ),
    'meta_query' => array( 
      'relation' => 'AND',
      $filterargs,
    )
  ) );

  $response = '';

  if($ajax_query->have_posts()) {
    while($ajax_query->have_posts()) : $ajax_query->the_post();
      $response .= get_template_part('template-parts/place-item-table');
    endwhile;
  } else {
    $response = 'empty';
  }
  
  // echo $response;
  die();
}

add_action('wp_ajax_filter_places_click_action', 'filter_places');
add_action('wp_ajax_nopriv_filter_places_click_action', 'filter_places');

?>