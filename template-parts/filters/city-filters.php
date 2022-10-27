<?php 
$other_items = [
  [
    "slug" => "parking",
    "key" => "_crb_cafe_parking",
    "name" => "Паркинг",
  ],
  [
    "slug" => "wifi",
    "key" => "_crb_cafe_wifi",
    "name" => "Wi-Fi",
  ],
  [
    "slug" => "banket",
    "key" => "_crb_cafe_banket",
    "name" => "Банкет",
  ],
  [
    "slug" => "online-menu",
    "key" => "_crb_cafe_onlinemenu",
    "name" => "Онлайн меню",
  ],
  [
    "slug" => "letnyayaploshadka",
    "key" => "_crb_cafe_letnyayaploshadka",
    "name" => "Летняя площадка",
  ],
  [
    "slug" => "zhivayamuzika",
    "key" => "_crb_cafe_zhivayamuzika",
    "name" => "Живая музыка",
  ],
  [
    "slug" => "kalyan",
    "key" => "_crb_cafe_kalyan",
    "name" => "Кальян",
  ],
  [
    "slug" => "vipkomnati",
    "key" => "_crb_cafe_vipkomnati",
    "name" => "VIP-комната",
  ],
  [
    "slug" => "bizneslanch",
    "key" => "_crb_cafe_bizneslanch",
    "name" => "Бизнес ланч",
  ],
  [
    "slug" => "dostavka",
    "key" => "_crb_cafe_dostavka",
    "name" => "Доставка",
  ],
  [
    "slug" => "covidsafe",
    "key" => "_crb_cafe_covidsafe",
    "name" => "Антиковидные ограничения",
  ],
  [
    "slug" => "detskayakomnata",
    "key" => "_crb_cafe_detskayakomnata",
    "name" => "Детская комната",
  ],
  [
    "slug" => "korporativ",
    "key" => "_crb_cafe_korporativ",
    "name" => "Корпоративы",
  ],
  [
    "slug" => "svadba",
    "key" => "_crb_cafe_svadba",
    "name" => "Свадьбы",
  ],
  [
    "slug" => "beznal",
    "key" => "_crb_cafe_beznal",
    "name" => "Безналичный расчет",
  ],
  // [
  //   "slug" => "",
  //   "key" => "",
  //   "name" => "",
  // ],
];
foreach ($other_items as $other_item): ?>
  <div class="flex items-center px-4 mb-4">
    <input type="checkbox" name="filter-place-<?php echo $other_item["slug"]; ?>" id="filter-place-<?php echo $other_item["slug"]; ?>" class="filter-checkbox" value="yes" data-key="<?php echo $other_item["key"]; ?>" />
    <label for="filter-place-<?php echo $other_item["slug"]; ?>"><?php _e($other_item["name"], "tarakan"); ?></label>
  </div>
<?php endforeach; ?>