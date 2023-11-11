<?php 
  $current_cat_id = get_queried_object_id();
  $taxonomyName = "city";
  $term = get_term_by('slug', get_query_var('term'), $taxonomyName);
  $city_term = get_term_by( 'id', $term->parent, 'city' );
  $cityName = $city_term->name; 
?>

<div class="pt-20 lg:pt-36">
  <div class="container">
    <!-- title -->
    <h1 class="text-3xl md:text-4xl lg:text-5xl text-center text-black/80 font-semibold mb-16">
      <span class="mr-4 md:mr-5"><?php single_term_title(); ?> <?php _e("в городе", "tarakan"); ?></span>
      <span class="relative whitespace-nowrap">
        <span class="absolute bg-indigo-500 -left-2 -top-1 -bottom-1 -right-2 md:-left-3 md:-top-0 md:-bottom-0 md:-right-3 -rotate-1"></span>
        <span class="relative text-gray-200"> <?php echo $cityName; ?></span>
      </span>
    </h1>
    <!-- end title -->

    <div class="flex flex-wrap lg:-mx-4 mb-16">
      <div class="w-full lg:w-1/4 lg:px-4 mb-6 lg:mb-0">
        <div class="relative flex flex-wrap items-center justify-center bg-black/80 text-gray-50 rounded-lg lg:rounded-none lg:rounded-t-lg px-2 py-3 lg:py-4">
          <div class="block lg:hidden w-full h-full absolute left-0 top-0 filter-open-js z-1"></div>
          <div class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 lg:w-6 h-5 lg:h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>
          </div>
          <div class="text-lg lg:text-xl"><?php _e("Фильтры", "tarakan"); ?></div>
        </div>
        <div class="hidden lg:block bg-white rounded-lg pt-4 filter-card-js">
          <input type="hidden" value="<?php echo get_queried_object_id(); ?>" class="category-filter-id">
          <!-- Средний чек -->
          <div class="border-b border-gray-300 pb-6 mb-6">
            <div class="px-4 mb-4">
              <div class="text-lg font-medium text-gray-700"><?php _e("Средний чек", "tarakan"); ?></div>
              <div>до: <span class="text-indigo-600 font-medium average-check-value-html-js">2000</span> грн.</div>
            </div> 
            <div class="px-4">
              <input type="range" value="2000" min="1" max="2000" class="w-full average-check-value-js"></input>
              <div><?php _e("Управляйте ползунком, чтобы изменить сумму среднего чека", "tarakan"); ?></div>
              <div class="hidden justify-between items-center">
                <div class="border border-gray-300 rounded px-3 py-1">1</div>
                <div class="border border-gray-300 rounded px-3 py-1">2000</div>
              </div>
            </div>
          </div>
          <!-- END Средний чек -->

          <!-- Разное -->
          <div class="border-b border-gray-300 pb-6">
            <div class="text-lg font-bold uppercase opacity-75 px-4 mb-4"><?php _e("Разное", "tarakan"); ?></div>
            <div class="px-4 city-filter-form">
              <?php get_template_part("template-parts/filters/city-filters"); ?>
            </div>
          </div>
          <!-- Разное -->

          <div class="bg-indigo-500 rounded-b-lg cursor-pointer city-filter-submit-js px-2 py-4">
            <div class="text-center text-gray-50 text-lg"><?php _e("Применить", "tarakan"); ?></div>
          </div>

        </div>
      </div>
      <div class="w-full lg:w-3/4 lg:px-4">
        <!-- table -->
        <div class="overflow-x-auto mb-12">
          <table class="w-full table-auto">
            <thead class="bg-black/80 text-gray-200 rounded-t-lg font-bold">
              <tr>
                <th class="whitespace-nowrap px-3 py-3">
                  <div class="text-left font-bold"><?php _e("Название", "tarakan"); ?></div>
                </th>
                <th class="whitespace-nowrap px-3 py-3">
                  <div class="text-left font-bold"><?php _e("Адрес", "tarakan"); ?></div>
                </th>
                <th class="whitespace-nowrap px-3 py-3">
                  <div class="text-left font-bold"><?php _e("Средний чек", "tarakan"); ?></div>
                </th>
                <th class="whitespace-nowrap px-3 py-3">
                  <div class="text-left font-bold"><?php _e("Просмотров", "tarakan"); ?></div>
                </th>
                <th class="whitespace-nowrap px-3 py-3">
                  <div class="text-left font-bold"><?php _e("Рейтинг", "tarakan"); ?></div>
                </th>
              </tr>
            </thead>
            <tbody id="response" class="border border-gray-200 border-t border-t-transparent">
              <?php 
              $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
              $query = new WP_Query( array( 
                'post_type' => 'places', 
                'posts_per_page' => 20,
                'order'    => 'DESC',
                'paged' => $current_page,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'city',
                    'terms' => $current_cat_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  )
                ),
              ) );
              if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part("template-parts/taxonomy-city/item-category"); ?>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </tbody>
          </table>
        </div>
        <!-- end table -->

        <!-- pagination -->
        <div class="b_pagination text-center mb-12">
          <?php 
            $big = 9999999991; // уникальное число
            echo paginate_links( array(
              'format' => '?page=%#%',
              'total' => $query->max_num_pages,
              'current' => $current_page,
              'prev_next' => true,
              'next_text' => (''),
              'prev_text' => (''),
            )); 
          ?>
        </div>
        <!-- end pagination -->
      </div>
    </div>
    
    <!-- content -->
    <?php 
    $seoText = carbon_get_term_meta($current_cat_id, 'crb_city_seo_text');
    if ($seoText && $current_page < 2): ?>
    <div class="mb-12">
      <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 text-center mb-12">📝 <?php _e("Что можно добавить?", "tarakan"); ?></h2>
      <div class="content">
        <div class="flex flex-wrap md:-mx-4">
          <div class="w-full md:w-1/4 md:px-4 mb-8 md:mb-0">
            <div class="single-subjects sticky top-4 mb-5">
              <div class="text-2xl font-bold uppercase mb-3">
                <?php _e('Содержание','tarakan'); ?>:
              </div>
              <div class="single-subjects-inner"></div>
            </div>
          </div>
          <div class="w-full md:w-3/4 md:px-4">
            <div class="bg-white border border-gray-300 rounded-lg p-6 md:p-10">
              <?php echo apply_filters( 'the_content', $seoText  ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- end content --> 

    <!-- breadcrumbs -->
    <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <ul class="inline-flex items-center flex-wrap bg-black/80 rounded-lg px-6 py-2">
        <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
          <a itemprop="item" href="<?php echo home_url(); ?>" class="text-white opacity-90">
            <span itemprop="name"><?php _e( 'Главная', 'tarakan' ); ?></span>
          </a>                        
          <meta itemprop="position" content="1">
        </li>
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
          <a itemprop="item" href="<?php echo get_term_link( $city_term ) ;?>" class="text-white opacity-90">
            <span itemprop="name"><?php echo $cityName; ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
          <span itemprop="name" class="text-white opacity-90"><?php single_term_title(); ?></span>
          <meta itemprop="position" content="3" />
        </li>
      </ul>
    </div>
    <!-- end breadcrumbs -->

  </div>
</div>
