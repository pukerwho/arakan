<?php
  $current_id = get_the_ID();
  getMeta($current_id);
?>

<table class="w-full table-auto border border-gray-300 border-b-transparent mb-10">
  <tbody class="">
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Название", "tarakan"); ?></td>
      <td class="p-2"><?php the_title(); ?></td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Добавлено на сайт", "tarakan"); ?></td>
      <td class="p-2"><?php echo get_the_date('d.m.Y'); ?></td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Форма обучения", "tarakan"); ?></td>
      <td class="p-2"><?php echo carbon_get_the_post_meta('crb_school_forma_navchannya'); ?></td>
    </tr>
    <tr class="border-b border-b-gray-300">
      <td class="p-2"><?php _e("Язык обучения", "tarakan"); ?></td>
      <td class="p-2"><?php _e("Украинский", "tarakan"); ?></td>
    </tr>
  </tbody>
</table>

<h2 class="text-xl uppercase mb-4"><?php _e("Преимущества", "tarakan"); ?>:</h2>
<ul class="list-disc ml-4">
  <?php if (carbon_get_the_post_meta('crb_school_vchitelya_nauvishchoi_category') === 'yes'): ?>
    <li><?php _e("Сертифицированные педагоги", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_ohorona') === 'yes'): ?>
    <li><?php _e("Охрана", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_medichna_dopomoga') === 'yes'): ?>
    <li><?php _e("Медицинская помощь", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_videospoctrereghennya') === 'yes'): ?>
    <li><?php _e("Видеонаблюдение", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_dopolnitelnie_kruzhki') === 'yes'): ?>
    <li><?php _e("Дополнительные кружки", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_repetitorstvo') === 'yes'): ?>
    <li><?php _e("Репетиторство", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_stolovaya') === 'yes'): ?>
    <li><?php _e("Столовая", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_ychastvolimpiadah') === 'yes'): ?>
    <li><?php _e("Участие в олимпиадах", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_sportivny_dosyagnennya') === 'yes'): ?>
    <li><?php _e("Спортивные достижения", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_pogliblene_vivchannya_matematiky') === 'yes'): ?>
    <li><?php _e("Углубленное изучение математики", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_pogliblene_vuvchannya_angliyskoyi') === 'yes'): ?>
    <li><?php _e("Углубленное изучение английского языка", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_pidgotovka_do_dpa_zno') === 'yes'): ?>
    <li><?php _e("Подготовка к ГНА и ВНО", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_druga_inozemna_mova') === 'yes'): ?>
    <li><?php _e("Возможность учить второй иностранный язык", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_postiyniy_syprovid_klasnogo_kerivnyka') === 'yes'): ?>
    <li><?php _e("Постоянное сопровождение классного руководителя", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_bezkostovni_pidruchnyki') === 'yes'): ?>
    <li><?php _e("Бесплатные учебники", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_finansova_gramotnist') === 'yes'): ?>
    <li><?php _e("Финансовая грамотность", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_suchasne_osnaschennya_klasiv') === 'yes'): ?>
    <li><?php _e("Современная оснастка классов", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_suchasni_navchalni_materialy') === 'yes'): ?>
    <li><?php _e("Современные учебные материалы, учебники", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_edyna_it_platforma') === 'yes'): ?>
    <li><?php _e("Единая IT-платформа", "tarakan"); ?>;</li>
  <?php endif; ?>
  <?php if (carbon_get_the_post_meta('crb_school_systema_motivaciy') === 'yes'): ?>
    <li><?php _e("Система мотивации", "tarakan"); ?>;</li>
  <?php endif; ?>
</ul>

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

    <!-- Оценка Учителя -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">👩‍🏫</span> <?php _e('Учителя', 'tarakan'); ?></td>
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
    <!-- END Учителя -->

    <!-- Оценка Состояние классов -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">🏫</span> <?php _e('Состояние классов', 'tarakan'); ?></td>
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

    <!-- Оценка Программа -->
    <tr>
      <td class="key"><span class="mr-2">📚</span> <?php _e('Программа', 'tarakan'); ?></td>
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
    <!-- END Оценка Программа -->

  </tbody>
</table>