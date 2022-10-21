<?php 
$current_cat_id = get_queried_object_id();
$taxonomyName = "city";
$term = get_term_by('slug', get_query_var('term'), $taxonomyName);
?>

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
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
          <a itemprop="item" href="<?php echo get_page_url('page-allcity'); ?>" class="text-white opacity-90">
            <span itemprop="name"><?php _e( 'Города', 'tarakan' ); ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
          <span itemprop="name" class="text-white opacity-90"><?php single_term_title(); ?></span>
          <meta itemprop="position" content="3" />
        </li>
      </ul>
    </div>
    <!-- END Хлебные крошки -->
    <h1 class="text-2xl lg:text-4xl text-white font-semibold">
      <?php if((int)$term->parent): ?>
        <?php $parent_term = get_term_by( 'id', $term->parent, 'city' ); ?>
        <?php echo $parent_term->name; ?>: <?php single_term_title(); ?>
      <?php else: ?>
        <?php single_term_title(); ?>
      <?php endif; ?>
    </h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <div class="mb-10">
      <?php if((int)$term->parent) {
        $parent_term = get_term( $term->parent, $taxonomyName );
        $parent_id = $parent_term->term_id; 
      } else {
        $parent_id = get_queried_object_id();
      }
      $child_terms = get_terms($taxonomyName, array('parent' => $parent_id, 'hide_empty' => false ));
      foreach ( $child_terms as $child ): ?>
        <?php $get_link = get_term($child->term_id, $taxonomyName); ?>
        <div class="relative bg-indigo-100 text-black hover:bg-indigo-200 rounded px-6 py-3 mb-2">
          <a href="<?php echo get_term_link( $get_link ); ?>" class="absolute-link"></a>
          <div><span class="text-lg"><?php echo $child->name ?></span></div>
        </div>
      <?php endforeach; ?>
    </div>
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