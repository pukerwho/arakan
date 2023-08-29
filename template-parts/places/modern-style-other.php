<div class="bg-white border border-gray-400 rounded">
  <!-- Top Block -->
  <div class="border-b border-gray-200 px-6 py-4 mb-4">
    <div class="block lg:flex lg:flex-row lg:items-center lg:justify-between mb-2">
      <div class="text-xl custom-font hover:text-blue-500 mb-4 lg:mb-0 lg:mr-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <div class="inline-block bg-blue-100  rounded-lg px-2 py-1">
        <?php $c_term = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
        echo $c_term[0]->name; ?>
      </div>
    </div>
    <div class="flex items-center mb-2">
      <div class="flex items-center mb-2">
        <div class="mr-2">
          <?php get_template_part('template-parts/stars'); ?>    
        </div>
        <div class="opacity-75">
          <span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5
        </div>
      </div>
    </div>
    <div class="opacity-75">
      <?php $address = carbon_get_the_post_meta('crb_place_address'); 
      if ($address): ?>
        <?php echo $address; ?>
      <?php else: ?>
        <?php _e("Не указано", "tarakan"); ?>
      <?php endif; ?>
    </div>
  </div>
  <!-- END Top Block -->

  <!-- Bottom Block -->
  <div class="flex justify-between px-6 pb-4">
    <div class="-mx-2">
      <?php $e_types = get_the_terms( get_the_ID(), 'place-type' ); foreach ($e_types as $e_type){ ?>
        <a href="<?php echo get_term_link($e_type->term_id, 'place-type') ?>" class="text-sm hover:text-blue-500 px-2"><?php echo $e_type->name; ?></a> 
      <?php } ?>
    </div>
    <div>
      <a href="<?php the_permalink(); ?>" class="font-bold text-blue-500 hover:underline"><?php _e("Подробнее", "tarakan"); ?></a>
    </div>
  </div>
  <!-- END Bottom Block -->
</div>