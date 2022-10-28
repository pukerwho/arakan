<?php 

function filter_places() {
  //Получаем данные
  $currentCatId = stripslashes_deep($_POST['city_id']);
  $averageCheckValue = stripslashes_deep($_POST['averageCheckValue']);
  $keyArray = stripslashes_deep($_POST['keyArray']);
  foreach ($keyArray as $key) {
    $filter_meta[] = array(
      'key' => $key,
      'value' => 'yes',
      'compare' => '='
    );
  };

  $ajax_query = new WP_Query( array( 
    'post_type' => 'places', 
    'posts_per_page' => -1,
    'order'    => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => 'city',
        'terms' => $currentCatId,
        'field' => 'term_id',
        'include_children' => true,
        'operator' => 'IN'
      )
    ),
    'meta_query' => array(
      'relation' => 'AND',
      $filter_meta,
      array(
        'key' => '_crb_place_price',
        'value' => $averageCheckValue,
        'compare' => '<',
        'type'    => 'NUMERIC'
      )
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