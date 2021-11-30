<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G-Info
 */

?>

<footer>

  <!-- Treba links -->
  <div class="container mx-auto px-2 lg:px-5  mb-5">
    <h3 class="text-2xl text-gray-700 font-bold mb-2"><?php _e('Популярные сайты', 'tarakan'); ?></h3>
    <div class="treba-links flex flex-wrap items-center bg-white border border-gray-300 py-2 px-4">
      <?php do_shortcode('[render-treba-links]'); ?>
      <?php echo do_shortcode('[render-treba-top-links]'); ?>  
    </div>
  </div>
  <!-- TOP -->
  <div class="bg-gray-600 text-white py-12">
    <div class="container mx-auto px-2 lg:px-5">
      <div class="flex flex-wrap lg:-mx-8">

        <div class="w-full lg:w-6/12 lg:px-8 mb-6">
          <div class="font-bold text-3xl mb-4">Tarakan</div>
          <div class="font-light mb-6">
            <?php _e('У нас можно опубликовать свой отзыв абсолютно о любом месте, где вам приходилось побывать. Можно оставить гневную жалобу, хвалебную благодарность, или даже узнать об акциях и распродажах. Да здравствуют честные отзывы от реальных людей!', 'tarakan'); ?>
          </div>
          <div class="flex text-lg">
            <div class="border-r border-gray-500 pr-5 mr-5">
              <span class="font-semibold text-red-400">1436</span>
              <?php _e('заведений', 'tarakan'); ?>
            </div>
            <div>
              <span class="font-semibold text-red-400">345</span>
              <?php _e('отзывов', 'tarakan'); ?>
            </div>
          </div>
        </div>

        <div class="w-full lg:w-3/12 lg:px-8 mb-6">
          <div class="text-lg font-semibold mb-4">
            <?php _e('Категории', 'tarakan'); ?>
          </div>
          <div>
            <ul>
              <?php $footer_categories = get_terms( array( 
                'taxonomy' => 'place-type', 
                'parent' => 0, 
                'hide_empty' => false,
              ));
              foreach ( array_slice($footer_categories, 0, 5) as $footer_category ): ?>
                <li class="font-light mb-2">
                  <a href="<?php echo get_term_link($footer_category); ?>"><?php echo $footer_category->name ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <div class="w-full lg:w-3/12 lg:px-8">
          <div class="text-lg font-semibold mb-4">
            <?php _e('Популярные города', 'tarakan'); ?>
          </div>
          <div>
            <ul>
              <?php $footer_cities = get_terms( array( 
                'taxonomy' => 'city', 
                'parent' => 0, 
                'hide_empty' => false,
              ));
              foreach ( array_slice($footer_cities, 0, 5) as $footer_city ): ?>
                <li class="font-light mb-2">
                  <a href="<?php echo get_term_link($footer_city); ?>"><?php echo $footer_city->name ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- END TOP -->

  <!-- BOTTOM -->
  <div class="bg-gray-800 pt-12">
    <div class="text-4xl text-center font-black text-white mb-12">
      <span class="text-red-400"><?php _e('Спасибо', 'tarakan'); ?></span><?php _e(', что доверяете нам', 'tarakan'); ?>
    </div>
    <div class="container mx-auto px-2 lg:px-5">
      <div class="flex flex-col-reverse lg:flex-row lg:items-center lg:justify-between lg:border-t lg:border-gray-600 text-white py-6">
        <div>
          © Tarakan — <?php _e('Все права защищены', 'tarakan'); ?>
        </div>
        <div class="mb-4 lg:mb-0">
          <?php _e('Пишите нам на почту', 'tarakan'); ?> — <a href="mailto:hello@tarakan.org.ua">hello@tarakan.org.ua</a>
        </div>
      </div>
    </div>
    
  </div>
  <!-- END BOTTOM -->
	
</footer>

<?php wp_footer(); ?>

</body>
</html>
