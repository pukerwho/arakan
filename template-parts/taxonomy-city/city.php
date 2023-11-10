<?php 
  $current_cat_id = get_queried_object_id();
  $taxonomyName = "city";
  $current_lang = pll_current_language();
?>

<div class="pt-20 lg:pt-36">
  <div class="container">
    <!-- title -->
    <h1 class="text-3xl md:text-4xl lg:text-5xl text-center text-black/80 font-semibold mb-16">
      <span class="mr-4 md:mr-5"><?php _e("Все заведения в городе", "tarakan"); ?></span>
      <span class="relative whitespace-nowrap">
        <span class="absolute bg-indigo-500 -left-2 -top-1 -bottom-1 -right-2 md:-left-3 md:-top-0 md:-bottom-0 md:-right-3 -rotate-1"></span>
        <span class="relative text-gray-200"><?php single_term_title(); ?></span>
      </span>
    </h1>
    <!-- end title -->

    <?php 
    $query_rating = new WP_Query( array( 
      'post_type' => 'rating', 
      'posts_per_page' => -1,
      'order'    => 'DESC',
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
    if ($query_rating->have_posts()): ?>
    <div class="custom-cards flex items-center flex-nowrap md:flex-wrap overflow-x-scroll md:overflow-x-auto -mx-2 mb-12">
    <?php while ($query_rating->have_posts()) : $query_rating->the_post(); ?>
      <div class="w-full min-w-[180px] lg:min-w-auto lg:w-1/4 px-2">
        <div class="relative">
          <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
          <div>
            <?php 
              $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
            ?>
            <img 
            class="w-full h-[250px] lg:h-[320px] object-cover rounded-lg" 
            alt="<?php the_title(); ?>" 
            src="<?php echo $medium_thumb; ?>" 
            srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
            loading="lazy" 
            data-src="<?php echo $medium_thumb; ?>" 
            data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
          </div>
          <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-transparent to-black rounded-lg"></div>
          <div class="absolute bottom-4 left-4 right-4 text-base lg:text-lg font-semibold text-white text-center"><?php the_title(); ?></div>
        </div>
      </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>


    <!-- popular --> 
    <div class="mb-16">
      <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 mb-6">🔥 <?php _e("Популярные в этом месяце", "tarakan"); ?></h2>
      <div class="text-lg opacity-75 mb-10"><?php _e("На основе количества просмотров страниц на нашем сайте", "tarakan"); ?></div>
      <!-- table popular -->
      <div class="overflow-x-auto">
        <table class="w-full table-auto">
          <thead class="bg-black/80 text-gray-200 font-bold">
            <tr>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Место", "tarakan"); ?></div>
              </th>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Название", "tarakan"); ?></div>
              </th>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Категория", "tarakan"); ?></div>
              </th>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Адрес", "tarakan"); ?></div>
              </th>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Просмотров", "tarakan"); ?></div>
              </th>
              <th class="whitespace-nowrap px-3 py-3">
                <div class="text-left font-bold"><?php _e("Рейтинг", "tarakan"); ?></div>
              </th>
            </tr>
          </thead>
          <tbody class="border border-gray-200 border-t border-t-transparent">
            <?php 
              $i = 0;
              $query = new WP_Query( array( 
                'post_type' => 'places', 
                'posts_per_page' => 10,
                'meta_key' => 'place_count',
                'orderby' => 'meta_value_num',
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
            <?php $i=$i+1; ?>
              <tr class="border-b border-gray-200 text-gray-600 even:bg-white first-of-type:bg-green-200">
                <td class="whitespace-nowrap px-3 py-3"><?php echo $i; ?></td>
                <td class="whitespace-nowrap px-3">
                  <div class="hover:text-red-400 font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                </td>
                <td class="whitespace-nowrap px-3">
                  <?php 
                  $other_current_terms = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
                  foreach (array_slice($other_current_terms, 0,1) as $other_place_term):
                  ?>
                    <?php if ($other_place_term): ?>
                      <div class="text-gray-500 hover:text-red-400"><a href="<?php echo get_term_link( $other_place_term ) ;?>"><?php echo $other_place_term->name; ?></a></div> 
                    <?php endif; ?>
                  <?php endforeach; ?>
                </td>
                <td class="whitespace-nowrap px-3"><?php echo carbon_get_the_post_meta('crb_place_address'); ?></td>
                <td class="whitespace-nowrap px-3"><?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?></td>
                <td class="whitespace-nowrap px-3"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5</td>
              </tr>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </tbody>
        </table>
      </div>
      <!-- end table popular -->
    </div>
    <!-- end popular --> 

    <!-- categories --> 
    <div class="mb-12">
      <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 text-center mb-6">👀 <?php _e("Ищите что-то конкретное", "tarakan"); ?>?</h2>
      <div class="text-lg text-center opacity-75 mb-10"><?php _e("Какие заведения есть в городе", "tarakan"); ?>.</div>
      <div class="flex flex-wrap lg:-mx-4">
        <?php $parent_id = get_queried_object_id();
        $child_terms = get_terms($taxonomyName, array('parent' => $parent_id, 'hide_empty' => false ));
        foreach ( $child_terms as $child ): ?>
          <div class="w-full md:w-1/2 lg:w-1/3 md:px-4 mb-4 md:mb-6">
            <div class="relative flex justify-between items-center bg-white border border-gray-400 rounded p-4">
              <a href="<?php echo get_term_link( $child ); ?>" class="absolute-link"></a>
              <div class="flex items-center mr-2">
                <div class="text-xl font-medium"><?php echo $child->name; ?></div>
              </div>
              <div><?php echo $child->count; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- end categories --> 

    <!-- reviews --> 
    <div class="mb-12">
      <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 text-center mb-6">💬 <?php _e("Советы от местных", "tarakan"); ?></h2>
      <div class="text-lg text-center opacity-75 mb-10"><?php _e("Отзывы посетителей", "tarakan"); ?>.</div>
      <div class="flex flex-wrap md:-mx-4">
        <?php 
        $current_translations_id = pll_get_term_translations($current_cat_id);
        $cats__in_array = array(); 
        $cat_translation_id = pll_get_term_translations($current_cat_id);
        foreach ($cat_translation_id as $cat_id) { 
          array_push($cats__in_array, $cat_id); 
        }
        $query_reviews = new WP_Query( array( 
          'post_type' => 'places', 
          'posts_per_page' => 10,
          'lang' => 'ru,uk',
          'order'    => 'DESC',
          'comment_count' => array(
            'value' => 0,
            'compare' => '>'
          ),
          'tax_query' => array(
            array(
              'taxonomy' => 'city',
              'terms' => $cats__in_array,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($query_reviews->have_posts()) : while ($query_reviews->have_posts()) : $query_reviews->the_post(); ?>
        <?php 
        $post_reviews_id = get_the_ID(); 
        $post__in_array = array(); 
        $translation_id = pll_get_post_translations($post_reviews_id);
        foreach ($translation_id as $tr_id) { 
          array_push($post__in_array, $tr_id); 
        }
        $args = array( 'post__in' => $post__in_array, 'status' => 'approve', 'type' => 'comment', );
        $comments = get_comments( $args );
        foreach($comments as $comment): ?>
          <?php if ($comment->comment_parent === '0'): ?> 
            <div id="comment-<?php echo $comment->comment_ID; ?>" class="w-full md:w-1/2 md:px-4 mb-8">
              <div class="bg-white border border-gray-200 rounded">
                <div class="bg-black/80 text-gray-200 px-4 py-2 mb-4">
                  <?php $current_lang_post_id = pll_get_post( $post_reviews_id, $current_lang ); ?>
                  <a href="<?php echo get_permalink($current_lang_post_id); ?>"><?php the_title(); ?></a>
                </div>
                <div class="font-bold px-4 mb-4"><?php echo $comment->comment_author; ?></div>
                <div class="italic px-4 mb-4">"<?php echo $comment->comment_content; ?>"</div>
                <div class="flex items-center px-4 mb-4">
                  <div class="mr-2"><?php _e("Оценка от посетителя", "tarakan"); ?>: </div>
                  <?php 
                    $comment_rating = carbon_get_comment_meta( $comment->comment_ID, 'crb_comment_rating' ); 
                    $comment_id_css = '#comment-'.$comment->comment_ID;
                  ?>
                  <style>
                    <?php echo $comment_id_css; ?> .comment-rating .comment-rating-star:nth-child(-n+<?php echo $comment_rating; ?>) {
                      fill: #ffaa46;
                      stroke: transparent;
                    }
                  </style>
                  <div class="comment-rating flex text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="text-sm border-t border-gray-200 px-4 py-4"><?php _e("Дата отзыва", "tarakan"); ?>: <span class="underline"><?php echo get_comment_date('F jS, Y', $comment->comment_ID); ?></span></div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endwhile; else: ?>
        <div class="mx-auto px-4">
          <div class="bg-indigo-50 rounded-lg text-lg px-6 py-3">
            🤷‍♂️ <?php _e("Пока никто еще ничего не написал", "tarakan"); ?>
          </div>
        </div>
      <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- end reviews --> 

    <!-- content -->
    <?php 
    $seoText = carbon_get_term_meta($current_cat_id, 'crb_city_seo_text');
    if ($seoText && $current_page < 2): ?>
    <div class="mb-12">
      <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 text-center mb-12">📝 <?php _e("Несколько слов про город", "tarakan"); ?></h2>
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
    <!-- end breadcrumbs -->
  </div>
</div>
