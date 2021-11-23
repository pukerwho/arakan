<?php 
$current_cat_id = get_queried_object_id();
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
          <a itemprop="item" href="#" class="text-white opacity-90">
            <span itemprop="name"><?php _e( 'Категории', 'tarakan' ); ?></span>
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
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php single_term_title(); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <div class="flex flex-wrap lg:-mx-4 mb-8">
      <?php 
        $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
        $query = new WP_Query( array( 
          'post_type' => 'places', 
          'posts_per_page' => 20,
          'order'    => 'DESC',
          'paged' => $current_page,
          'tax_query' => array(
            array(
              'taxonomy' => 'place-type',
              'terms' => $current_cat_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="w-full lg:w-1/4 mb-4 lg:px-4">
          <?php get_template_part('template-parts/place-item'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
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