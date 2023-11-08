<?php 
get_header(); 
$city_term = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
$placetype_term = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
$countNumber = tutCount(get_the_ID());
?>

<div class="container pt-20 lg:pt-36">
  <div class="w-full lg:w-3/4 mx-auto">
    <h1 class="text-3xl md:text-4xl lg:text-5xl text-center text-black/80 font-semibold mb-12"><?php the_title(); ?></h1>
    <!-- meta -->
    <div class="flex items-center justify-center text-gray-600 mb-12">
      <div class="flex justify-center items-center">
        <div class="mr-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div><?php _e("Просмотров", "tarakan"); ?>: <?php echo $countNumber; ?></div>
      </div>
      <div class="mx-4">|</div>
      <div class="flex justify-center items-center">
        <div class="mr-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
          </svg>
        </div>
        <div><?php _e("Обновлено", "tarakan"); ?>: <?php echo get_the_modified_time('d.m.Y') ?></div>
      </div>
    </div>
    <!-- end meta -->
    <!-- image -->
    <?php 
      $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
    ?>
    <?php if ($medium_thumb): ?>
      <div class="bg-white border border-gray-300 rounded-lg -rotate-1 p-8 mb-12">
        <img 
        class="w-full h-full object-cover rounded-lg " 
        alt="<?php the_title(); ?>" 
        src="<?php echo $medium_thumb; ?>" 
        srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
        loading="lazy" 
        data-src="<?php echo $medium_thumb; ?>" 
        data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
      </div>
    <?php endif; ?>
    <!-- end image --> 
    <div class="w-full lg:w-4/5 mx-auto">
      <div class="text-lg opacity-75 mb-10">
        <div class="bg-yellow-100 border-2 border-dotted border-gray-500 rounded-lg p-6"><?php _e("Это субъективный рейтинг, который мы пытались сделать максимально объективным", "tarakan"); ?>. <?php _e("Вы можете повлиять на формирование этого рейтинга - поставьте честную оценку заведению, которое вы посетили", "tarakan"); ?>.</div>
      </div>
      <!-- our --> 
      <div class="mb-12">
        <div class="flex justify-center items-center mb-12">
          <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 mr-4"><?php _e("Наш выбор", "tarakan"); ?></h2>
          <div><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/crown.svg" class="w-8 h-8 md:w-12 md:h-12 rotate-12"></div>
        </div>
        <?php $our_place = carbon_get_the_post_meta('crb_rating_our_place'); $our_place_id = $our_place[0]['id']; ?>
        <div class="bg-white border border-gray-300 rounded-lg mb-12">
          <div class="flex flex-wrap relative">
            <a href="<?php echo get_permalink($our_place_id); ?>" class="absolute-link"></a>
            <?php $place_photo = carbon_get_post_meta($our_place_id, 'crb_place_photos'); 
            if ($place_photo): ?>
              <div><img src="<?php $photo_src = wp_get_attachment_image_src($place_photo[0], 'medium'); echo $photo_src[0];  ?>" loading="lazy" class="max-h-[185px]"></div>
            <?php endif; ?>
            <div class="px-4 py-6">
              <div class="flex items-center justify-between mb-4">
                <div class="text-xl font-bold mr-2"><?php echo get_the_title($our_place_id); ?></div>
                <div class="text-4xl -rotate-12">👍</div>
              </div>
              <div class="text-gray-700 mb-4"><?php _e("Адрес", "tarakan"); ?>: <?php echo carbon_get_post_meta($our_place_id, 'crb_place_address'); ?></div>
              <div class="flex items-center">
                <div class="mr-2"><?php get_template_part('template-parts/stars'); ?></div>
                <div class="opacity-75">
                  <span class="font-medium"><?php echo carbon_get_post_meta($our_place_id, 'crb_place_rating'); ?></span>/5
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border-b border-gray-300 pb-12 mb-12">
          <?php 
          $post__in_array = array(); 
          $translation_id = pll_get_post_translations($our_place_id);
          foreach ($translation_id as $tr_id) { 
            array_push($post__in_array, $tr_id); 
          }
          $args = array( 'post__in' => $post__in_array, 'status' => 'approve', 'type' => 'comment', );
          $comments = get_comments( $args );
          foreach(array_slice($comments, 0,1) as $comment): ?>
          <div class="italic mb-4"><?php echo $comment->comment_content; ?></div>
          <div class="font-bold"><?php echo $comment->comment_author; ?></div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- end our --> 

      <!-- rating --> 
      <div class="mb-16">
        <div class="flex justify-center">
          <h2 class="inline-block text-2xl md:text-3xl lg:text-4xl text-white uppercase bg-indigo-500 rounded-lg -rotate-2 px-4 py-2 mb-12"><?php _e("Рейтинг", "tarakan"); ?></h2>
        </div>
        <!-- table rating -->
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
                    'relation' => 'AND',
                    array(
                      'taxonomy' => 'city',
                      'terms' => $city_term[0]->term_id,
                      'field' => 'term_id',
                      'include_children' => true,
                      'operator' => 'IN'
                    ),
                    array(
                      'taxonomy' => 'place-type',
                      'terms' => $placetype_term[0]->term_id,
                      'field' => 'term_id',
                      'include_children' => true,
                      'operator' => 'IN'
                    ),
                  ),
                ) );
              if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php $i=$i+1; ?>
                <tr class="border-b border-gray-200 text-gray-600 even:bg-white">
                  <td class="whitespace-nowrap px-3 py-3"><?php echo $i; ?></td>
                  <td class="whitespace-nowrap px-3">
                    <div class="hover:text-red-400 font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                  </td>
                  <td class="whitespace-nowrap px-3"><?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?></td>
                  <td class="whitespace-nowrap px-3"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5</td>
                </tr>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </tbody>
          </table>
        </div>
        <!-- end table rating -->
      </div>
      <!-- end rating --> 
      <!-- comments --> 
      <div>
        <h2 class="text-2xl md:text-3xl lg:text-4xl text-black/80 text-center mb-6">💬 <?php _e("Что говорят люди", "tarakan"); ?></h2>
        <div class="text-lg text-center opacity-75 mb-10"><?php _e("Отзывы от посетителей", "tarakan"); ?></div>
        <div>
        <?php 
          $city_translations_id = pll_get_term_translations($city_term[0]->term_id);
          $city__in_array = array(); 
          foreach ($city_translations_id as $city_id) { 
            array_push($city__in_array, $city_id); 
          }
          $placetype_translations_id = pll_get_term_translations($placetype_term[0]->term_id);
          $placetype__in_array = array(); 
          foreach ($placetype_translations_id as $placetype_id) { 
            array_push($placetype__in_array, $placetype_id); 
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
              'relation' => 'AND',
              array(
                'taxonomy' => 'city',
                'terms' => $city__in_array,
                'field' => 'term_id',
                'include_children' => true,
                'operator' => 'IN'
              ),
              array(
                'taxonomy' => 'place-type',
                'terms' => $placetype__in_array,
                'field' => 'term_id',
                'include_children' => true,
                'operator' => 'IN'
              ),
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
              <div id="comment-<?php echo $comment->comment_ID; ?>" class="w-full mb-8">
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
      <!-- end comments --> 

      <!-- content -->
      <?php if ( get_the_content() ) { ?>
      <div class="mb-6">
        <div class="content">
          <div class="bg-white border border-gray-300 ounded-lg p-6 md:p-10">
            <div class="single-subjects mb-5">
              <div class="single-subjects-inner"></div>
            </div>
            <div>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
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
            <a itemprop="item" href="<?php echo get_term_link($city_term[0]); ?>" class="text-white opacity-90">
              <span itemprop="name"><?php echo $city_term[0]->name; ?></span>
            </a>                        
            <meta itemprop="position" content="2">
          </li>
          <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
            <span itemprop="name" class="text-white opacity-90"><?php the_title(); ?></span>
            <meta itemprop="position" content="3" />
          </li>
        </ul>
      </div>
      <!-- end breadcrumbs -->
    </div>
  </div>

</div>

<?php get_footer();