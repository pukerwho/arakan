
<div>
  <div class="relative mb-2">
    <a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
    <?php 
      $other_site_snap = carbon_get_the_post_meta('crb_place_url'); 
      $other_site_title = get_the_title();
    ?>
    <?php echo do_shortcode('[snapshot url="'. $other_site_snap .'" alt="'. $other_site_title . '" width="400" height="300"]'); ?>  
  </div>
  <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-1">
    <div class="text-gray-500 text-xs">
      <?php 
      $other_current_terms = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
      foreach (array_slice($other_current_terms, 0,1) as $other_place_term):
      ?>
        <?php if ($other_place_term): ?>
          <span class="font-semibold"><?php echo $other_place_term->name; ?></span>, 
        <?php endif; ?>
      <?php endforeach; ?>

      <?php 
      $other_current_city = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
      foreach (array_slice($other_current_city, 0,1) as $current_city):
      ?>
        <?php if ($current_city): ?>
          <span class="font-semibold"><?php echo $current_city->name; ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
      
    </div>
    <div>
      <?php get_template_part('template-parts/stars'); ?>
    </div>
  </div>
  <a href="<?php the_permalink(); ?>" class="font-semibold text-gray-700 text-sm">
    <?php the_title(); ?> 
  </a>
</div>
