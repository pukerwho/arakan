<?php
  $current_id = get_the_ID();
  getMeta($current_id);
?>

<div class="mb-10">
  <div class="mb-2"><span class="font-medium"><?php _e("Тип учебного заведения", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_type'); ?></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Уровень аккредитации", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_yroven_akkreditacii'); ?></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Форма обучения", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_forma_obucheniya'); ?></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Квалификация", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_kvalifikatciya'); ?></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Стоимость обучения", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_stoimost'); ?></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Количество студентов", "tarakan"); ?></span>: <?php echo carbon_get_the_post_meta('crb_univer_kol_vo_studentov'); ?></div>
</div>

<table class="w-full table-auto border border-gray-300 border-b-transparent mb-10">
  <tbody class="">
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Бесплатное обучение", "tarakan"); ?></td>
      <td class="p-2">
        <?php if (carbon_get_the_post_meta('crb_univer_besplatnoe_obushenie') === "yes"): ?>
          <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg></div>
          </div>
        <?php else: ?>
          <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg></div>
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Платное обучение", "tarakan"); ?></td>
      <td class="p-2">
        <?php if (carbon_get_the_post_meta('crb_univer_platnoe_obushenie') === "yes"): ?>
          <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg></div>
          </div>
        <?php else: ?>
          <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg></div>
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Аспирантура", "tarakan"); ?></td>
      <td class="p-2">
        <?php if (carbon_get_the_post_meta('crb_univer_aspirantura') === "yes"): ?>
          <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg></div>
          </div>
        <?php else: ?>
          <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg></div>
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Военная кафедра", "tarakan"); ?></td>
      <td class="p-2">
        <?php if (carbon_get_the_post_meta('crb_univer_voenka') === "yes"): ?>
          <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg></div>
          </div>
        <?php else: ?>
          <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg></div>
          </div>
        <?php endif; ?>
      </td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Общежитие", "tarakan"); ?></td>
      <td class="p-2">
        <?php if (carbon_get_the_post_meta('crb_univer_obsheghitie') === "yes"): ?>
          <div class="inline-flex items-center bg-green-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Да", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg></div>
          </div>
        <?php else: ?>
          <div class="inline-flex items-center bg-red-200 rounded-xl px-4 py-1">
            <div class="mr-2"><?php _e("Нет", "tarakan"); ?></div>
            <div><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg></div>
          </div>
        <?php endif; ?>
      </td>
    </tr>
  </tbody>
</table>

<div class="text-2xl my-12"><span class="border-b-4 border-indigo-500">🤔 <?php _e("Оценки от студентов", "tarakan"); ?></span></div>

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

    <!-- Оценка Преподаватели -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">👩‍🏫</span> <?php _e('Преподаватели', 'tarakan'); ?></td>
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
    <!-- END Преподаватели -->

    <!-- Оценка Состояние кабинетов -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">🏫</span> <?php _e('Состояние кабинетов', 'tarakan'); ?></td>
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
    <!-- END Оценка Состояние кабинетов -->

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

    <!-- Оценка Учебная программа -->
    <tr>
      <td class="key"><span class="mr-2">📚</span> <?php _e('Учебная программа', 'tarakan'); ?></td>
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
    <!-- END Оценка Учебная программа -->

  </tbody>
</table>