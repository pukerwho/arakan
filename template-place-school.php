<?php
/*
Template Name: PlaceSchool
Template Post Type: places
*/

get_header(); 
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php 
  $current_id = get_the_ID();
  $countNumber = tutCount(get_the_ID());
  getMeta($current_id);
?>
  <div>
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
      <div class="container mx-auto px-2 lg:px-5">
        <!-- Хлебные крошки -->
        <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>" class="text-white opacity-90">
                <span itemprop="name"><?php _e( 'Главная', 'tarakan' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_post_type_archive_link('places'); ?>" class="text-white opacity-90">
                <span itemprop="name"><?php _e( 'Каталог', 'tarakan' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <?php 
            $current_term = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
            foreach (array_slice($current_term, 0,1) as $myterm); {
            } ?>
            <?php if ($myterm): ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
              <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'place-type') ?>" class="text-white opacity-90">
                <span itemprop="name"><?php echo $myterm->name; ?></span>
              </a>
              <meta itemprop="position" content="3" />
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <!-- END Хлебные крошки -->
        <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php the_title(); ?> 
          <?php 
          $current_city = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
          foreach (array_slice($current_city, 0,1) as $city); {
          } ?>
          <?php if ($city): ?>
          <span class="text-xl lg:text-2xl text-gray-200">
          , <?php echo $city->name; ?>
          </span>
          <?php endif; ?>
        </h1>
      </div>  
    </div>
    
    <div class="container mx-auto px-2 lg:px-5 -mt-20">
      <div class="bg-white shadow-lg rounded-lg mb-12">
        <div class="flex flex-col lg:flex-row lg:-mx-2">
          <div class="w-full lg:w-8/12 lg:px-16 lg:py-10 lg:border-r-2 mb-4 lg:mb-0">
            <div class="border-b-2 px-4 lg:px-0 pt-4 lg:pt-0 pb-8 mb-8">
              <div class="text-2xl mb-12"><span class="border-b-4 border-indigo-500">🤔 <?php _e("Что известно про место?", "tarakan"); ?></span></div>
              
              <!-- template sad -->
              <?php if (carbon_get_the_post_meta('crb_template_sad')): ?>
              <div>
                <!-- свободные места -->
                <div class="flex items-center mb-6">
                  <div class="w-1/2 flex items-center mr-6">
                    <div class="mr-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                      </svg>
                    </div>
                    <div class="text-lg"><?php _e("Есть свободные места", "tarakan"); ?>:</div>
                  </div>
                  <?php if (carbon_get_the_post_meta('crb_sad_free') === "yes"): ?>
                    <div class="w-1/2">
                      <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
                        <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
                        <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg></div>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="w-1/2">
                      <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
                        <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
                        <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg></div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <!-- end свободные места -->

                <h2 class="text-xl uppercase mb-4"><?php _e("Творческие кружки", "tarakan"); ?>:</h2>
                <div class="mb-4">

                  <?php if (carbon_get_the_post_meta('crb_sad_kylinariya') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Кулинария", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_maluvannya') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Рисование", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_music') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Музыка", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_khoreogrphiya') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Хореография", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_aktorska_maystrenist') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Актерское мастерство", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_aplication') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Аппликация", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_vokal') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Вокал", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_lego_construyuvannya') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Лего-конструирование", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_lipka') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Лепка", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_logic') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Логика", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_sensorica') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Сенсорика", "tarakan"); ?></span>
                  <?php endif; ?>

                </div>
                <h2 class="text-xl uppercase mb-4"><?php _e("Спортивные кружки", "tarakan"); ?>:</h2>
                <div class="mb-4">

                  <?php if (carbon_get_the_post_meta('crb_sad_gymnastick') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Гимнастика", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_dytyachiy_fitness') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Детский фитнес", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_tanci') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Танцы", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_football') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Футбол", "tarakan"); ?></span>
                  <?php endif; ?>

                </div>
                <h2 class="text-xl uppercase mb-4"><?php _e("Преимущества", "tarakan"); ?>:</h2>
                <div class="mb-4">

                  <?php if (carbon_get_the_post_meta('crb_sad_logoped') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Логопед", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_licar') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Медицинское сопровождение", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_ohorona') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Охрана", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_doshkilna_pidgotovka') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Подготовка к школе", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_psycholog') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Психолог", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_videonaglyad') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Видеонаблюдение для родителей", "tarakan"); ?></span>
                  <?php endif; ?>

                  <?php if (carbon_get_the_post_meta('crb_sad_okrema_territoriya') === "yes"): ?>
                    <span class="place-school-items"><?php _e("Отдельная территория", "tarakan"); ?></span>
                  <?php endif; ?>

                </div>
              </div>

              <div class="text-2xl my-12"><span class="border-b-4 border-indigo-500">🤔 <?php _e("Оценки от родителей", "tarakan"); ?></span></div>

              <table class="place-rating w-full bg-gray-100 shadow-lg border-b-transparent text-sm lg:text-md">
                <tbody>
                  <thead>
                    <tr>
                      <th class="border-r border-gray-700"><?php _e('Критерий', 'tarakan'); ?></th>
                      <th><?php _e('Оценка', 'tarakan'); ?></th>
                    </tr>
                  </thead>
                  <tr class="border-b border-gray-300">
                    <td class="key"><span class="mr-2">⭐️</span> <?php _e('Общий рейтинг', 'tarakan'); ?></td>
                    <td class="value" xitemprop="aggregateRating" xitemscope="" xitemtype="http://schema.org/aggregateRating">
                      <?php 
                        $meta_rating_count = carbon_get_the_post_meta('crb_place_reviews_count'); 
                        $rating_value = carbon_get_the_post_meta('crb_place_rating'); 
                        $rating_value_width = ($rating_value / 5) * 100;
                      ?>
                      <div class="rating-row relative font-semibold">
                        <div class="flex items-center justify-center text-center">
                          <div class="relative z-1" style="width:<?php echo $rating_value_width; ?>%">
                            <span xitemprop="ratingValue"><?php echo $rating_value ?>/5 - </span> (<?php _e('Оценок', 'tarakan'); ?>: <span xitemprop="reviewCount"><?php echo $meta_rating_count; ?></span>)
                          </div>
                          <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $rating_value_width; ?>%"></div>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <!-- Оценка Воспитатели / Учителя -->
                  <tr class="border-b border-gray-300">
                    <td class="key"><span class="mr-2">👩‍🏫</span> <?php _e('Воспитатели/Учителя', 'tarakan'); ?></td>
                    <td class="value">
                      <?php 
                        $meta_rating_food = 'rating_food_'.$current_id;
                        $rating_food_front = get_post_meta( $current_id, $meta_rating_food, true );
                        $rating_food_width = ($rating_food_front / 5) * 100;
                      ?>
                      <div class="rating-row relative font-semibold">
                        <div class="relative text-center z-1" style="width:<?php echo $rating_food_width; ?>%"><?php echo $rating_food_front; ?></div>
                        <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $rating_food_width; ?>%"></div>
                      </div>
                    </td>
                  </tr>
                  <!-- END Воспитатели / Учителя -->

                  <!-- Оценка Состояние комнат/классов -->
                  <tr class="border-b border-gray-300">
                    <td class="key"><span class="mr-2">🏫</span> <?php _e('Состояние комнат/классов', 'tarakan'); ?></td>
                    <td class="value">
                      <?php 
                        $meta_rating_service = 'rating_service_'.$current_id;
                        $rating_service_front = get_post_meta( $current_id, $meta_rating_service, true );
                        $rating_service_width = ($rating_service_front / 5) * 100;
                      ?>
                      <div class="rating-row relative font-semibold">
                        <div class="relative text-center z-1" style="width:<?php echo $rating_service_width; ?>%"><?php echo $rating_service_front; ?></div>
                        <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $rating_service_width; ?>%"></div>
                      </div>
                    </td>
                  </tr>
                  <!-- END Оценка Состояние комнат/классов -->

                  <!-- Оценка Руководство -->
                  <tr class="border-b border-gray-300">
                    <td class="key"><span class="mr-2">📓</span> <?php _e('Руководство', 'tarakan'); ?></td>
                    <td class="value">
                      <?php 
                        $meta_rating_price = 'rating_price_'.$current_id;
                        $rating_price_front = get_post_meta( $current_id, $meta_rating_price, true );
                        $rating_price_width = ($rating_price_front / 5) * 100;
                      ?>
                      <div class="rating-row relative font-semibold">
                        <div class="relative text-center z-1" style="width:<?php echo $rating_price_width; ?>%"><?php echo $rating_price_front; ?></div>
                        <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $rating_price_width; ?>%"></div>
                      </div>
                    </td>
                  </tr>
                  <!-- END Оценка Руководство -->

                  <!-- Оценка Питание -->
                  <tr>
                    <td class="key"><span class="mr-2">🥗</span> <?php _e('Питание', 'tarakan'); ?></td>
                    <td class="value">
                      <?php 
                        $meta_rating_atmosfera = 'rating_atmosfera_'.$current_id;
                        $rating_atmosfera_front = get_post_meta( $current_id, $meta_rating_atmosfera, true );
                        $rating_atmosfera_width = ($rating_atmosfera_front / 5) * 100;
                      ?>
                      <div class="rating-row relative font-semibold">
                        <div class="relative text-center z-1" style="width:<?php echo $rating_atmosfera_width; ?>%"><?php echo $rating_atmosfera_front; ?></div>
                        <div class="h-full absolute left-0 top-0 bg-green-300 rounded-xl text-center py-2" style="width:<?php echo $rating_atmosfera_width; ?>%"></div>
                      </div>
                    </td>
                  </tr>
                  <!-- END Оценка Питание -->

                </tbody>
              </table>
              <?php endif; ?>
              <!-- end template sad -->

            </div> 
            <div class="flex flex-row justify-between items-center px-4 lg:px-0">

              <!-- Добавить в избранное -->
              <div class="flex items-center border-2 border-indigo-500 rounded text-indigo-500 text-sm lg:text-md px-4 py-2">
                <div class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 lg:h-6 w-4 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </div>
                <div>
                  <?php _e('В избранное', 'tarakan'); ?>
                </div>
              </div>
              <!-- END Добавить в избранное -->

              <!-- Поделиться -->
              <div class="flex items-center">
                <div class="text-gray-700 lg:mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 lg:h-6 w-4 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                </div>
                <?php do_action('show_social_share_buttons'); ?>
              </div>
              <!-- END Поделиться -->

            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4 lg:px-10 py-10 ">
            <!-- Notices -->
            <div class="flex items-center border-b-2 pb-6 mb-6">
              <div class="text-green-600 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="font-light">
                <?php _e('Проверено модератором', 'tarakan'); ?>
              </div>
            </div>
            <!-- END Notices -->

            <div class="border-b-2 pb-6 mb-6">

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Адрес', 'tarakan'); ?></span>: <span class="italic"><?php echo carbon_get_the_post_meta('crb_place_address'); ?></span>
              </div>

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Телефоны', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_phones'); ?></span>
              </div>

              <?php if (carbon_get_the_post_meta('crb_place_email')): ?>
              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Email', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_email'); ?></span>
              </div>
              <?php endif; ?>
              
              <?php if (carbon_get_the_post_meta('crb_place_url')): ?>
              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Сайт', 'tarakan'); ?></span>: <a href="<?php echo carbon_get_the_post_meta('crb_place_url'); ?>" target="_blank" rel="nofollow" class="text-indigo-500"><?php echo carbon_get_the_post_meta('crb_place_url'); ?></a>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_price')): ?>
                <div class="text-gray-700 mb-4">
                  <span class="font-semibold"><?php _e('Средний чек', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_price'); ?></span>
                </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_finansyvannya')): ?>
                <div class="text-gray-700 mb-4">
                  <span class="font-semibold"><?php _e('Форма собственности', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_finansyvannya'); ?></span>
                </div>
              <?php endif; ?>

              <div class="text-gray-700 font-semibold">
                <?php _e('Категория', 'tarakan'); ?>: <a href="<?php echo get_term_link($myterm->term_id, 'place-type') ?>" class="text-red-400"><?php echo $myterm->name; ?></a>
              </div>
            </div>

            <div class="bg-indigo-50 rounded text-sm font-light p-4 mb-6">
              <div class="flex items-center mb-2">
                <div class="mr-2">
                  <?php get_template_part('template-parts/stars'); ?>    
                </div>
                <div class="opacity-75">
                  <span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5
                </div>
              </div>
              <div class="opacity-75">
                <?php _e('На основе', 'tarakan'); ?> <span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_reviews_count'); ?></span> <?php _e('отзывов', 'tarakan'); ?>
              </div>
            </div>

            <div class="mb-6">
              <a href="#reviews" class="block text-white text-lg text-center bg-red-400 rounded px-4 py-2">
                <?php _e('Оставить отзыв', 'tarakan'); ?>
              </a>
            </div>

            <div class="border-b-2 pb-4 mb-4">
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Обновлено', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo get_the_modified_time('d.m.Y') ?>
                </div>
              </div>
            </div>

            <div class="border-b-2 pb-4 mb-4">
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Добавлено', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo get_the_date('d.m.Y'); ?>
                </div>
              </div>
            </div>

            <div>
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Просмотров', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo $countNumber; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div>
        <!-- Табы -->
        <div class="place_tabs mb-10">
          <ul class="flex flex-col lg:flex-row lg:items-center font-light px-5 lg:px-10">
            <li class="place_tab active text-lg cursor-pointer p-5" data-place_tab="Reviews">
              <?php _e('Отзывы', 'tarakan'); ?>
            </li>
          </ul>
        </div>
        <!-- END Табы -->

        <!-- ТАБЫ Контент -->
        <div id="reviews" class="mb-20">
          <div class="place_tab_content active" data-place_tab="Reviews">
            <div class="w-full lg:w-8/12">
              <?php comments_template(); ?>
            </div>
          </div>
        </div>
        <!-- ТАБЫ Контент -->

        <!-- Похожие места -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b mb-6 pb-6">
          <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
            <?php _e('Похожие места', 'tarakan'); ?>
          </h2>
          <div>
            <a href="<?php echo get_post_type_archive_link('places'); ?>" class="text-indigo-500 border border-indigo-500 rounded px-5 py-2">
              <?php _e('Больше мест', 'tarakan'); ?>
            </a>
          </div>
        </div>

        <div class="overflow-x-auto shadow-xl mb-20">
          <table class="w-full table-auto">
            <thead class="bg-gray-100 text-gray-500 border border-gray-200 uppercase">
              <tr>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left font-bold"><?php _e("Название", "tarakan"); ?></div>
                </th>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left font-bold"><?php _e("Город", "tarakan"); ?></div>
                </th>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left font-bold"><?php _e("Адрес", "tarakan"); ?></div>
                </th>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left font-bold"><?php _e("Категория", "tarakan"); ?></div>
                </th>
                <th class="text-left whitespace-nowrap px-2 py-3">
                  <div class="text-left font-bold"><?php _e("Рейтинг", "tarakan"); ?></div>
                </th>
              </tr>
            </thead>
            <tbody class="text-sm">
              <?php 
                $c_term = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
                $current_id = get_the_ID();
                $custom_query = new WP_Query( array( 
                'post_type' => 'places', 
                'posts_per_page' => 5,
                'post__not_in' => array($current_id),
                'tax_query' => array(
                  array(
                    'taxonomy' => 'city',
                    'terms' => $c_term[0]->term_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  )
                ),
              ) );
              if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <?php get_template_part('template-parts/place-item-table'); ?>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </tbody>
				  </table>
        </div>
        <!-- END Похожие места -->

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b mb-6 pb-6">
          <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
            <?php _e('Публикации', 'tarakan'); ?>
          </h2>
        </div>
        <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 mb-10">
          <?php 
            $custom_query = new WP_Query( array( 
            'post_type' => 'post', 
            'posts_per_page' => 3,
            'orderby' => 'rand',
          ) );
          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0 lg:px-4">
							<div class="h-full border border-gray-300 rounded">
								<div class="h-52 mb-4">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-t">
								</div>
								
								<div class="text-lg font-semibold text-gray-700 px-4 mb-3">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</div>
								<div class="text-sm font-light text-gray-700 px-4 mb-3">
									<?php 
										$content_text = wp_strip_all_tags( get_the_content() );
										echo mb_strimwidth($content_text, 0, 105, '...');
									?>
								</div>
								<div class="flex items-center text-gray-700 text-sm px-4 pb-4">
									<div class="border-r pr-4 mr-4">
										<?php echo get_the_date('d.m.Y'); ?>
									</div>
									<div class="flex items-center">
										<div class="mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
											</svg>
										</div>
										<div>
											<?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>

      </div>
    </div>
  </div>
<?php endwhile; endif; wp_reset_postdata();  ?>

<?php get_footer();
