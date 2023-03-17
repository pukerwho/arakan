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

  <?php if (is_home()): ?>
  <!-- Treba links -->
  <div class="hidden container mx-auto px-2 lg:px-5  mb-5">
    <h3 class="text-2xl text-gray-700 font-bold mb-2"><?php _e('Популярные сайты', 'tarakan'); ?></h3>
    <div class="treba-links flex flex-wrap items-center bg-white border border-gray-300 py-2 px-4">
      <!-- do_shortcode('[render-treba-links]'); 
      echo do_shortcode('[render-treba-top-links]'); -->
    </div>
  </div>
  <?php endif; ?>
  <!-- TOP -->
  <div class="bg-gray-600 text-white py-12">
    <div class="container mx-auto px-2 lg:px-5">
      <div class="flex flex-wrap lg:-mx-8">

        <div class="w-full lg:w-6/12 lg:px-8 mb-6">
          <div class="font-bold text-3xl mb-4">Tarakan</div>
          <div class="font-light mb-6">
            <?php _e('У нас можно опубликовать свой отзыв абсолютно о любом месте, где вам приходилось побывать. Можно оставить гневную жалобу, хвалебную благодарность, или даже узнать об акциях и распродажах. Да здравствуют честные отзывы от реальных людей!', 'tarakan'); ?>
          </div>
          <div class="flex text-lg mb-6">
            <div class="border-r border-gray-500 pr-5 mr-5">
              <span class="font-semibold text-red-400">
                <?php
                $count_places = wp_count_posts('places');
                if ( $count_places ) {
                  $published_places = $count_places->publish;
                  echo round($published_places/2);
                }
                ?>
              </span>
              <?php _e('заведений', 'tarakan'); ?>
            </div>
            <div>
              <span class="font-semibold text-red-400">1029</span>
              <?php _e('отзывов', 'tarakan'); ?>
            </div>
          </div>
          <div class="flex items-center">
            <a href="https://sdamkvartiry.com/">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sdamkvartiry.jpg" alt="sdamkvartiry.com" loading="lazy">
            </a>
            <?php if (is_home()): ?>
              <a href="https://webgolovolomki.com/" class="pl-2">
                <img src="https://tarakan.org.ua/wp-content/uploads/2022/11/web-g.jpg" width="20" alt="webgolovolomki.com" loading="lazy">
              </a>
            <?php endif; ?>
          </div>
        </div>

        <div class="w-full lg:w-3/12 lg:px-8 mb-6">
          <div class="text-lg font-semibold mb-4">
            <?php _e('Навигация', 'tarakan'); ?>
          </div>
          <div>
            <ul>
              <?php wp_nav_menu([
                'theme_location' => 'footer',
                'container' => 'div',
                'menu_class' => 'footer-menu flex flex-col'
              ]); ?> 
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

  <!-- FOOTER TREBA LINKS -->
  <div class="bg-gray-800 py-12">
    <div class="container mx-auto px-2 lg:px-5">
      <div class="footer_treba_links">
        <div class="footer_treba_links-flex">
          <div class="footer_treba_links-tab active" data-seo-tab="search"><?php _e('Сейчас ищут', 'tarakan'); ?></div>
          <div class="footer_treba_links-tab" data-seo-tab="cities"><?php _e('Города' ,'tarakan'); ?></div>
          <div class="footer_treba_links-tab" data-seo-tab="places"><?php _e('Заведения' ,'tarakan'); ?></div>
        </div>
        <div class="footer_treba_links-content active" data-seo-content-tab="search">
          <?php 
            $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $footer_links = footer_links($current_url);
            foreach ($footer_links as $footer_link):
          ?>
            <?php echo $footer_link->top_links; ?>
          <?php endforeach; ?>

          <?php do_shortcode('[render-footer-links]'); ?>
          <?php echo do_shortcode('[render-footer-top-links]'); ?>
        </div>
        <div class="footer_treba_links-content" data-seo-content-tab="cities">
          <div class="flex flex-wrap lg:-mx-4">
            <?php $home_cities = get_terms( array( 
              'taxonomy' => 'city', 
              'parent' => 0, 
              'show_count' => true,
              'hide_empty' => false,
            ));
            shuffle( $home_cities );
            foreach ( array_slice($home_cities, 0, 9) as $home_city ): ?>
              <div class="w-full lg:w-1/3 lg:px-4 mb-1"><a href="<?php echo get_term_link($home_city); ?>" class=""><?php echo $home_city->name ?></a></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="footer_treba_links-content" data-seo-content-tab="places">
          <?php 
            $footer_places = new WP_Query( array(
              'post_type' => 'places',
              'orderby' => 'rand',
              'posts_per_page' => 15,
            ));
            if ($footer_places->have_posts()) : while ($footer_places->have_posts()) : $footer_places->the_post(); ?>
              <div class="w-full lg:w-1/3 lg:px-4 mb-1"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END FOOTER TREBA LINKS -->

  <!-- BOTTOM -->
  <div class="bg-gray-800 ">
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

<!-- Telegram -->
<div class="w-full fixed block md:hidden bottom-2 px-4 z-1">
  <div class="bg-blue-500 relative rounded-md px-4 py-3">
    <a href="https://t.me/joinchat/ULWsxKhqmr85YzQ6" class="w-full h-full absolute t-0 l-0 js-analytics" data-analytics-category="Footer" data-analytics-action="Ссылка на телеграм"></a>
    <div class="flex items-center justify-center">
      <div class="mr-2">
        <svg height="20" viewBox="0 -39 512.00011 512" width="20" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="m504.09375 11.859375c-6.253906-7.648437-15.621094-11.859375-26.378906-11.859375-5.847656 0-12.042969 1.230469-18.410156 3.664062l-433.398438 165.441407c-23 8.777343-26.097656 21.949219-25.8984375 29.019531s4.0390625 20.046875 27.4999995 27.511719c.140626.042969.28125.085937.421876.125l89.898437 25.726562 48.617187 139.023438c6.628907 18.953125 21.507813 30.726562 38.835938 30.726562 10.925781 0 21.671875-4.578125 31.078125-13.234375l55.605469-51.199218 80.652344 64.941406c.007812.007812.019531.011718.027343.019531l.765625.617187c.070313.054688.144532.113282.214844.167969 8.964844 6.953125 18.75 10.625 28.308594 10.628907h.003906c18.675781 0 33.546875-13.824219 37.878906-35.214844l71.011719-350.640625c2.851563-14.074219.460937-26.667969-6.734375-35.464844zm-356.191406 234.742187 173.441406-88.605468-107.996094 114.753906c-1.769531 1.878906-3.023437 4.179688-3.640625 6.683594l-20.824219 84.351562zm68.132812 139.332032c-.71875.660156-1.441406 1.25-2.164062 1.792968l19.320312-78.25 35.144532 28.300782zm265.390625-344.566406-71.011719 350.644531c-.683593 3.355469-2.867187 11.164062-8.480468 11.164062-2.773438 0-6.257813-1.511719-9.824219-4.257812l-91.390625-73.585938c-.011719-.011719-.027344-.023437-.042969-.03125l-54.378906-43.789062 156.175781-165.949219c5-5.3125 5.453125-13.449219 1.074219-19.285156-4.382813-5.835938-12.324219-7.671875-18.820313-4.351563l-256.867187 131.226563-91.121094-26.070313 433.265625-165.390625c3.660156-1.398437 6.214844-1.691406 7.710938-1.691406.917968 0 2.550781.109375 3.15625.855469.796875.972656 1.8125 4.289062.554687 10.511719zm0 0"/></svg>
      </div>
      <div class="text-lg text-white text-center">
        <?php _e('Telegram-канал', 'restx'); ?>  
      </div>
    </div>
  </div>
</div>
<!-- END Telegram -->

<?php if ( is_tax( 'city' ) ): ?>
<div class="modal" data-modal="filter">
  <div class="modal_content bg-white dark:bg-dark-lg w-full lg:w-3/5 mx-4 my-4 lg:my-0 lg:mx-auto">
    <div class="relative border-b mb-4 py-4">
      <div class="modal_content_close absolute left-4 top-1/2 -translate-y-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <div class="text-2xl text-center"><?php _e("Фильтры", "tarakan"); ?></div>
    </div>
    <div class="px-4 mb-4">
      <div>
        <div class="text-lg font-bold uppercase opacity-75 mb-4"><?php _e("Средний чек", "tarakan"); ?> до: <span class="text-indigo-600 average-check-value-html-js">3000</span> грн.</div> 
        <div class="mb-6">
          <input type="range" value="3000" min="1" max="3000" class="w-full average-check-value-js"></input>
          <div class="flex justify-between items-center">
            <div class="border border-gray-300 rounded px-3 py-1">1</div>
            <div class="border border-gray-300 rounded px-3 py-1">3000</div>
          </div>
        </div>
      </div>
      <div class="text-lg font-bold uppercase opacity-75 mb-4"><?php _e("Разное", "tarakan"); ?></div>
      <div class="flex flex-wrap items-center lg:-mx-4 city-filter-form">
        <?php get_template_part("template-parts/filters/city-filters"); ?>
      </div>
    </div>
    <input type="hidden" value="<?php echo get_queried_object_id(); ?>" class="city-filter-id">
    <div class="border-t py-4">
      <div class="px-4">
        <div class="inline-flex items-center relative bg-indigo-500 rounded text-white text-sm lg:text-md cursor-pointer px-4 lg:px-6 py-2 city-filter-submit-js"><?php _e("Применить", "tarakan"); ?></div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="modal-bg hidden"></div>

<?php wp_footer(); ?>

</body>
</html>
