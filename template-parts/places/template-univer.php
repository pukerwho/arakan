<?php
  $current_id = get_the_ID();
  getMeta($current_id);
?>

<div class="mb-10">
  <div class="mb-2"><span class="font-medium"><?php _e("Тип учебного заведения", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_type'); ?></span></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Уровень аккредитации", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_yroven_akkreditacii'); ?></span></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Форма обучения", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_forma_obucheniya'); ?></span></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Квалификация", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_kvalifikatciya'); ?></span></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Стоимость обучения", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_stoimost'); ?></span></div>
  <div class="mb-2"><span class="font-medium"><?php _e("Количество студентов", "tarakan"); ?>: <?php echo carbon_get_the_post_meta('crb_univer_kol_vo_studentov'); ?></span></div>
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