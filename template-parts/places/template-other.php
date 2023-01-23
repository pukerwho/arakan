<?php
  $current_id = get_the_ID();
  getMeta($current_id);
?>

<!-- Parking -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="4" y="4" width="16" height="16" rx="2" />
        <path d="M9 16v-8h4a2 2 0 0 1 0 4h-4" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Паркинг", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_parking') === "yes"): ?>
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
<!-- END Parking -->

<!-- Wi-fi -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="6" y1="18" x2="6" y2="15" />
        <line x1="10" y1="18" x2="10" y2="12" />
        <line x1="14" y1="18" x2="14" y2="9" />
        <line x1="18" y1="18" x2="18" y2="6" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Wi-fi", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_wifi') === "yes"): ?>
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
<!-- END Wi-fi -->

<!-- Банкет -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M13.62 8.382l1.966 -1.967a2 2 0 1 1 3.414 -1.415a2 2 0 1 1 -1.413 3.414l-1.82 1.821" />
          <ellipse transform="rotate(45 8.025 16.475)" cx="8.025" cy="16.475" rx="7" ry="3" />
        <path d="M7.5 16l1 1" />
        <path d="M12.975 21.425c3.905 -3.906 4.855 -9.288 2.121 -12.021c-2.733 -2.734 -8.115 -1.784 -12.02 2.121" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Банкет", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_banket') === "yes"): ?>
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
<!-- END Банкет -->

<!-- Онлайн меню -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Онлайн меню", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_onlinemenu') === "yes"): ?>
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
<!-- END Онлайн меню -->

<!-- Летняя площадка -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="8" y="8" width="8" height="8" rx="1" />
        <line x1="3" y1="8" x2="4" y2="8" />
        <line x1="3" y1="16" x2="4" y2="16" />
        <line x1="8" y1="3" x2="8" y2="4" />
        <line x1="16" y1="3" x2="16" y2="4" />
        <line x1="20" y1="8" x2="21" y2="8" />
        <line x1="20" y1="16" x2="21" y2="16" />
        <line x1="8" y1="20" x2="8" y2="21" />
        <line x1="16" y1="20" x2="16" y2="21" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Летняя площадка", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_letnyayaploshadka') === "yes"): ?>
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
<!-- END Летняя площадка -->

<!-- Живая музыка -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M15.002 12.9a5 5 0 1 0 -3.902 -3.9" />
        <path d="M15.002 12.9l-3.902 -3.899l-7.513 8.584a2 2 0 1 0 2.827 2.83l8.588 -7.515z" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Живая музыка", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_zhivayamuzika') === "yes"): ?>
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
<!-- END Живая музыка -->

<!-- Кальян -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="3" y="13" width="18" height="4" rx="1" />
        <line x1="8" y1="13" x2="8" y2="17" />
        <path d="M16 5v.5a2 2 0 0 0 2 2a2 2 0 0 1 2 2v.5" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Кальян", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_kalyan') === "yes"): ?>
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
<!-- END Кальян -->

<!-- VIP-комната -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("VIP-комната", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_vipkomnati') === "yes"): ?>
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
<!-- END VIP-комната -->

<!-- Бизнес ланч -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M17 5a3 3 0 0 1 2 5.235v6.765a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6.764a3 3 0 0 1 1.824 -5.231l.176 -.005h10z" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Бизнес ланч", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_bizneslanch') === "yes"): ?>
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
<!-- END Бизнес ланч -->

<!-- Доставка -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <circle cx="5" cy="18" r="3" />
        <circle cx="19" cy="18" r="3" />
        <polyline points="12 19 12 15 9 12 14 8 16 11 19 11" />
        <circle cx="17" cy="5" r="1" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Доставка", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_dostavka') === "yes"): ?>
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
<!-- END Доставка -->

<!-- Антиковидные ограничения -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="3" y1="3" x2="21" y2="21" />
        <path d="M8.469 8.46a5 5 0 0 0 7.058 7.084m1.386 -2.608a5 5 0 0 0 -5.826 -5.853" />
        <path d="M12 7v-4m-1 0h2" />
        <path d="M12 7v-4m-1 0h2" transform="rotate(45 12 12)" />
        <path d="M12 7v-4m-1 0h2" transform="rotate(90 12 12)" />
        <line x1="12" y1="3" x2="13" y2="3" transform="rotate(135 12 12)" />
        <path d="M12 7v-4m-1 0h2" transform="rotate(180 12 12)" />
        <path d="M12 7v-4m-1 0h2" transform="rotate(225 12 12)" />
        <path d="M12 7v-4m-1 0h2" transform="rotate(270 12 12)" />
        <line x1="12" y1="3" x2="11" y2="3" transform="rotate(315 12 12)" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Антиковидные ограничения", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_covidsafe') === "yes"): ?>
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
<!-- END Антиковидные ограничения -->

<!-- Детская комната -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-kid" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <circle cx="12" cy="12" r="9" />
        <line x1="9" y1="10" x2="9.01" y2="10" />
        <line x1="15" y1="10" x2="15.01" y2="10" />
        <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
        <path d="M12 3a2 2 0 0 0 0 4" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Детская комната", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_detskayakomnata') === "yes"): ?>
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
<!-- END Детская комната -->

<!-- Корпоративы -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="3" y1="21" x2="21" y2="21" />
        <path d="M5 21v-14l8 -4v18" />
        <path d="M19 21v-10l-6 -4" />
        <line x1="9" y1="9" x2="9" y2="9.01" />
        <line x1="9" y1="12" x2="9" y2="12.01" />
        <line x1="9" y1="15" x2="9" y2="15.01" />
        <line x1="9" y1="18" x2="9" y2="18.01" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Корпоративы", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_korporativ') === "yes"): ?>
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
<!-- END Корпоративы -->

<!-- Свадьбы -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 5h2" />
        <path d="M5 4v2" />
        <path d="M11.5 4l-.5 2" />
        <path d="M18 5h2" />
        <path d="M19 4v2" />
        <path d="M15 9l-1 1" />
        <path d="M18 13l2 -.5" />
        <path d="M18 19h2" />
        <path d="M19 18v2" />
        <path d="M14 16.518l-6.518 -6.518l-4.39 9.58a1.003 1.003 0 0 0 1.329 1.329l9.579 -4.39z" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Свадьбы", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_svadba') === "yes"): ?>
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
<!-- END Свадьбы -->

<!-- Безналичный расчет -->
<div class="flex items-center mb-6">
  <div class="w-1/2 flex items-center mr-6">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="3" y="5" width="18" height="14" rx="3" />
        <line x1="3" y1="10" x2="21" y2="10" />
        <line x1="7" y1="15" x2="7.01" y2="15" />
        <line x1="11" y1="15" x2="13" y2="15" />
      </svg>
    </div>
    <div class="text-lg"><?php _e("Безналичный расчет", "tarakan"); ?>:</div>
  </div>
  <?php if (carbon_get_the_post_meta('crb_cafe_beznal') === "yes"): ?>
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
<!-- END Безналичный расчет -->

<div class="text-2xl my-12"><span class="border-b-4 border-indigo-500">🤔 <?php _e("Оценки посетителей", "tarakan"); ?></span></div>

<table class="place-rating w-full bg-gray-100  shadow-lg border-b-transparent text-sm lg:text-md">
  <tbody>
    <thead>
      <tr>
        <th class="border-r border-gray-700"><?php _e('Критерий', 'tarakan'); ?></th>
        <th><?php _e('Оценка', 'tarakan'); ?></th>
      </tr>
    </thead>
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">⭐️</span> <?php _e('Рейтинг заведения', 'tarakan'); ?></td>
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

    <!-- Оценка Еда -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">🍔</span> <?php _e('Еда', 'tarakan'); ?></td>
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
    <!-- END Оценка Еда -->

    <!-- Оценка Обслуживание -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">🛎️</span> <?php _e('Обслуживание', 'tarakan'); ?></td>
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
    <!-- END Оценка Обслуживание -->

    <!-- Оценка Цена/качество -->
    <tr class="border-b border-gray-300">
      <td class="key"><span class="mr-2">💸</span> <?php _e('Цена/качество', 'tarakan'); ?></td>
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
    <!-- END Оценка Цена/качество -->

    <!-- Оценка Атмосфера -->
    <tr>
      <td class="key"><span class="mr-2">❤️</span> <?php _e('Атмосфера', 'tarakan'); ?></td>
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
    <!-- END Оценка Атмосфера -->

  </tbody>
</table>