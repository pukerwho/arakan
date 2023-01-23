<?php
  $current_id = get_the_ID();
  getMeta($current_id);
?>
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
          // $meta_rating_food = 'rating_food_'.$current_id;
          $meta_rating_food = 'meta_rating_food';
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
          // $meta_rating_service = 'rating_service_'.$current_id;
          $meta_rating_service = 'meta_rating_service';
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
          // $meta_rating_price = 'rating_price_'.$current_id;
          $meta_rating_price = 'meta_rating_price';
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
          // $meta_rating_atmosfera = 'rating_atmosfera_'.$current_id;
          $meta_rating_atmosfera = 'meta_rating_atmosfera';
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