<?php
/*
Template Name: ВСЕ ГОРОДА
*/
?>

<?php get_header(); ?>

<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
  <div class="container mx-auto px-2 lg:px-5">
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php _e("Все города", "tarakan"); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <div class="flex flex-wrap -mx-2">
      <?php $home_cities = get_terms( array( 
        'taxonomy' => 'city', 
        'parent' => 0, 
        'show_count' => true,
        'hide_empty' => false,
      ));
      shuffle( $home_cities );
      foreach ( $home_cities as $home_city ): ?>
        <div class="w-1/2 lg:w-1/4 relative px-2 mb-10">
          <a href="<?php echo get_term_link($home_city); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
          <div class="h-52 mb-4">
            <img src="<?php echo carbon_get_term_meta($home_city->term_id, 'crb_city_img' ); ?>" alt="<?php echo $home_city->name ?>" loading="lazy" class="w-full h-full object-cover rounded-lg">
          </div>
          <div class="font-semibold text-gray-700 text-lg">
            <?php echo $home_city->name ?>
          </div>
          <div class="text-sm text-gray-600">
            <?php _e('Кол-во заведений в городе', 'tarakan'); ?>:
            <span class="font-semibold">
              <?php 
                $count_places_in_city = $home_city->count; 
                echo $count_places_in_city;
              ?>
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>