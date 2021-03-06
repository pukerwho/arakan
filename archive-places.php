<?php get_header(); ?>

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
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
          <span itemprop="name" class="text-white opacity-90"><?php _e('Все места', 'tarakan'); ?></span>
          <meta itemprop="position" content="2" />
        </li>
      </ul>
    </div>
    <!-- END Хлебные крошки -->
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php _e('Все места', 'tarakan'); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <div class="overflow-x-auto shadow-xl mb-10">
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
            $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
            $query = new WP_Query( array( 
              'post_type' => 'places', 
              'posts_per_page' => 20,
              'order'    => 'DESC',
              'paged' => $current_page,
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/place-item-table'); ?>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </tbody>
			</table>
    </div>
    <div class="b_pagination text-center">
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
  </div>
</div>

<?php get_footer(); ?>