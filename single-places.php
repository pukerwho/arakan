<?php get_header(); ?>

<?php 
  $current_id = get_the_ID();
  $countNumber = tutCount(get_the_ID());
  $c_term = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div>
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
              <a itemprop="item" href="<?php echo get_post_type_archive_link('places'); ?>" class="text-white opacity-90">
                <span itemprop="name"><?php _e( 'Каталог', 'tarakan' ); ?></span>
              </a>                        
              <meta itemprop="position" content="2">
            </li>
            <?php 
            $current_term = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
            foreach (array_slice($current_term, 0,1) as $myterm); {
            } ?>
            <?php if ($myterm): ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
              <a itemprop="item" href="<?php echo get_term_link($myterm->term_id, 'place-type') ?>" class="text-white opacity-90">
                <span itemprop="name"><?php echo $myterm->name; ?></span>
              </a>
              <meta itemprop="position" content="3" />
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <!-- END Хлебные крошки -->
        <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php the_title(); ?> </h1>
        <?php if (carbon_get_the_post_meta('crb_place_other')): ?>
          <div class="text-gray-200 text-lg italic mt-6"><?php _e("Сеть заведений", "tarakan"); ?></div>
        <?php endif; ?>
      </div>  
    </div>
    
    <div class="container mx-auto px-2 lg:px-5 -mt-20">
      <div class="bg-white shadow-lg rounded-lg mb-12">
        <div class="flex flex-col lg:flex-row lg:-mx-2">
          <div class="w-full lg:w-8/12 lg:px-16 lg:py-10 lg:border-r-2 mb-4 lg:mb-0">

            <div id="reviews" class="border-b border-gray-300 mb-8 pb-8 pt-6 lg:pt-0 px-4 lg:px-0">
              <div class="place_tab_content active" data-place_tab="Reviews">
                <h2 class="text-2xl mb-6">💬 <?php _e("Отзывы", "tarakan"); ?></h2>
                <div class="w-full">
                  <?php get_template_part('template-parts/comments/place-comments', get_post_type() ); ?>
                </div>
              </div>
            </div>

            <?php $get_content = get_the_content(); if ($get_content): ?>
            <div class="px-4 lg:px-0 mb-12">
              <h2 class="text-2xl mb-6">📋 <?php _e("Описание", "tarakan"); ?></h2>
              <div class="content">
                <?php the_content(); ?>
              </div>
            </div>
            <?php endif; ?>
            
            <?php 
              $photos = carbon_get_the_post_meta('crb_place_photos');
              if ($photos):
            ?>
            <div class="px-4 lg:px-0 mb-8">
              <h2 class="text-2xl mb-6">📋 <?php _e("Фото", "tarakan"); ?></h2>
              <div class="flex flex-wrap items-center -mx-2">
              <?php foreach ( $photos as $photo ): ?>
                <?php 
                  $photo_src_large = wp_get_attachment_image_src($photo, 'large'); 
                  $photo_src_medium = wp_get_attachment_image_src($photo, 'medium'); 
                ?>
                <div class="w-1/2 lg:w-1/4 px-2 mb-4">
                  <a href="<?php echo $photo_src_large[0]; ?>" data-lightbox="product-gallery" data-title="<?php the_title(); ?>">
                    <img src="<?php echo $photo_src_medium[0]; ?>" loading="lazy" class="w-full h-[150px] lg:h-[175px] object-cover bg-custom-gray dark:bg-dark-xl rounded-lg"> 
                  </a>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

            <div class="border-b-2 px-4 lg:px-0 pt-4 lg:pt-0 pb-8 mb-8">
              <div class="text-2xl mb-12"><span class="border-b-4 border-indigo-500">🤔 <?php _e("Что известно про место?", "tarakan"); ?></span></div>

              <!-- templates -->
              <?php if (carbon_get_the_post_meta('crb_template_sad') === 'yes'): ?>
                <?php echo get_template_part('template-parts/places/template-sad'); ?>
              <?php elseif (carbon_get_the_post_meta('crb_template_univer') === 'yes'): ?>
                <?php echo get_template_part('template-parts/places/template-univer'); ?>
              <?php elseif (carbon_get_the_post_meta('crb_template_school') === 'yes'): ?>
                <?php echo get_template_part('template-parts/places/template-school'); ?>
              <?php else: ?>
                <?php echo get_template_part('template-parts/places/template-other'); ?>
              <?php endif; ?>
              <!-- end templates -->

            </div>
            
            <div class="flex flex-row justify-between items-center px-4 lg:px-0">

              <!-- Добавить в избранное -->
              <div class="flex items-center border-2 border-indigo-500 rounded text-indigo-500 text-sm lg:text-md px-4 py-2">
                <div class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 lg:h-6 w-4 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </div>
                <div>
                  <?php _e('В избранное', 'tarakan'); ?>
                </div>
              </div>
              <!-- END Добавить в избранное -->

              <!-- Поделиться -->
              <div class="flex items-center">
                <div class="text-gray-700 lg:mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 lg:h-6 w-4 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                  </svg>
                </div>
                <?php do_action('show_social_share_buttons'); ?>
              </div>
              <!-- END Поделиться -->

            </div>
          </div>
          <div class="w-full lg:w-4/12 px-4 lg:px-10 py-10 ">
            <!-- Notices -->
            <div class="flex items-center border-b-2 pb-6 mb-6">
              <div class="text-green-600 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="font-light">
                <?php _e('Проверено модератором', 'tarakan'); ?>
              </div>
            </div>
            <!-- END Notices -->

            <div class="border-b-2 pb-6 mb-6">

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Адрес', 'tarakan'); ?></span>: <span class="italic"><?php echo carbon_get_the_post_meta('crb_place_address'); ?></span>
              </div>

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Телефоны', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_phones'); ?></span>
              </div>

              <?php if (carbon_get_the_post_meta('crb_place_email')): ?>
              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Email', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_email'); ?></span>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_other')): ?>
                <div class="mb-4">
                  <div class="text-lg font-bold mb-2"><?php _e("Еще адреса", "tarakan"); ?></div>
                  <?php 
                    $places_other = carbon_get_the_post_meta('crb_place_other');
                    foreach( $places_other as $place_other ): ?>
                    <div class="border-b-2 border-dotted border-gray-300 pb-4 mb-4">
                      <div class="mb-2">📍 <?php echo $place_other['crb_place_other_address'] ?></div>
                      <div>📞 <?php echo $place_other['crb_place_other_phone'] ?>	</div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_url')): ?>
                <?php if (carbon_get_the_post_meta('crb_template_sad') === 'yes' ||  carbon_get_the_post_meta('crb_template_school') === 'yes' || carbon_get_the_post_meta('crb_template_univer') === 'yes'): ?>
                  <?php if (carbon_get_the_post_meta('crb_place_url') !== '--не указано--'): ?>
                  <div class="text-gray-700 mb-4">
                    <span class="font-semibold"><?php _e('Сайт', 'tarakan'); ?></span>: <a href="//<?php echo carbon_get_the_post_meta('crb_place_url'); ?>" target="_blank" rel="nofollow" class="text-indigo-500"><?php echo carbon_get_the_post_meta('crb_place_url'); ?></a>
                  </div>
                  <?php endif; ?>
                <?php else: ?>
                  <div class="text-gray-700 mb-4">
                    <span class="font-semibold"><?php _e('Меню', 'tarakan'); ?></span>: <a href="<?php echo carbon_get_the_post_meta('crb_place_url'); ?>" target="_blank" rel="nofollow" class="text-indigo-500"><?php _e("Посмотреть", "tarakan"); ?></a>
                  </div>
                <?php endif; ?>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_price')): ?>
                <div class="text-gray-700 mb-4">
                  <span class="font-semibold"><?php _e('Средний чек', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_price'); ?></span>
                </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_finansyvannya')): ?>
                <div class="text-gray-700 mb-4">
                  <span class="font-semibold"><?php _e('Форма собственности', 'tarakan'); ?></span>: <span class=""><?php $forma_sobstv = carbon_get_the_post_meta('crb_finansyvannya');  echo __($forma_sobstv, "tarakan"); ?></span>
                </div>
              <?php endif; ?>

              <div class="text-gray-700 font-semibold mb-4">
                <?php _e('Категория', 'tarakan'); ?>: <a href="<?php echo get_term_link($myterm->term_id, 'place-type') ?>" class="text-red-400"><?php echo $myterm->name; ?></a>
              </div>

              <div class="text-gray-700 font-semibold">
                <?php _e('Город', 'tarakan'); ?>: <a href="<?php echo get_term_link($c_term[0]->term_id, 'city') ?>" class="text-red-400"><?php echo $c_term[0]->name; ?></a>
              </div>
            </div>

            <div class="bg-indigo-50 rounded text-sm font-light p-4 mb-6">
              <div class="flex items-center mb-2">
                <div class="mr-2">
                  <?php get_template_part('template-parts/stars'); ?>    
                </div>
                <div class="opacity-75">
                  <span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5
                </div>
              </div>
              <div class="opacity-75">
                <?php _e('На основе', 'tarakan'); ?> <span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_reviews_count'); ?></span> <?php _e('отзывов', 'tarakan'); ?>
              </div>
            </div>

            <div class="mb-6">
              <a href="#reviews" class="block text-white text-lg text-center bg-red-400 rounded px-4 py-2">
                <?php _e('Оставить отзыв', 'tarakan'); ?>
              </a>
            </div>

            <div class="border-b-2 pb-4 mb-4">
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Обновлено', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo get_the_modified_time('d.m.Y') ?>
                </div>
              </div>
            </div>

            <div class="border-b-2 pb-4 mb-4">
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Добавлено', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo get_the_date('d.m.Y'); ?>
                </div>
              </div>
            </div>

            <div>
              <div class="flex justify-between">
                <div class="font-semibold mr-2">
                  <?php _e('Просмотров', 'tarakan'); ?>
                </div>
                <div class="font-light text-gray-600">
                  <?php echo $countNumber; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div>

        <!-- Похожие места -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b border-gray-300 mb-6 pb-6">
          <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
            <?php _e('Похожие места', 'tarakan'); ?>
          </h2>
          <div>
            <a href="<?php echo get_post_type_archive_link('places'); ?>" class="text-indigo-500 border border-indigo-500 rounded px-5 py-2">
              <?php _e('Больше мест', 'tarakan'); ?>
            </a>
          </div>
        </div>

        <div class="overflow-x-auto shadow-xl mb-20">
          <table class="w-full bg-white table-auto">
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
                $current_id = get_the_ID();
                $custom_query = new WP_Query( array( 
                'post_type' => 'places', 
                'posts_per_page' => 5,
                'post__not_in' => array($current_id),
                'tax_query' => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'city',
                    'terms' => $c_term[0]->term_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  ),
                  array(
                    'taxonomy' => 'place-type',
                    'terms' => $myterm->term_id,
                    'field' => 'term_id',
                    'include_children' => true,
                    'operator' => 'IN'
                  ),
                ),
              ) );
              if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <?php get_template_part('template-parts/place-item-table'); ?>
              <?php endwhile; endif; wp_reset_postdata(); ?>
            </tbody>
				  </table>
        </div>
        <!-- END Похожие места -->

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b mb-6 pb-6">
          <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
            <?php _e('Публикации', 'tarakan'); ?>
          </h2>
        </div>
        <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 mb-10">
          <?php 
            $custom_query = new WP_Query( array( 
            'post_type' => 'post', 
            'posts_per_page' => 3,
            'orderby' => 'rand',
          ) );
          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0 lg:px-4">
							<div class="h-full border border-gray-300 rounded">
								<div class="h-52 mb-4">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-t">
								</div>
								
								<div class="text-lg font-semibold text-gray-700 px-4 mb-3">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</div>
								<div class="text-sm font-light text-gray-700 px-4 mb-3">
									<?php 
										$content_text = wp_strip_all_tags( get_the_content() );
										echo mb_strimwidth($content_text, 0, 105, '...');
									?>
								</div>
								<div class="flex items-center text-gray-700 text-sm px-4 pb-4">
									<div class="border-r pr-4 mr-4">
										<?php echo get_the_date('d.m.Y'); ?>
									</div>
									<div class="flex items-center">
										<div class="mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
											</svg>
										</div>
										<div>
											<?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>

      </div>
    </div>
  </div>
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();
