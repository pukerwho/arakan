<?php get_header(); ?>

<?php $countNumber = tutCount(get_the_ID()); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div>
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
      <div class="container mx-auto px-2 lg:px-5">
        <!-- Хлебные крошки -->
        <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
          <ul class="flex items-center flex-wrap">
            <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
              <a itemprop="item" href="<?php echo home_url(); ?>" class="text-white opacity-90">
                <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
              </a>                        
              <meta itemprop="position" content="1">
            </li>
            <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
              <a itemprop="item" href="<?php echo get_post_type_archive_link('places'); ?>" class="text-white opacity-90">
                <span itemprop="name"><?php _e( 'Каталог', 'restx' ); ?></span>
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
        <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php the_title(); ?> 
          <?php 
          $current_city = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
          foreach (array_slice($current_city, 0,1) as $city); {
          } ?>
          <?php if ($city): ?>
          <span class="text-xl lg:text-2xl text-gray-200">
          , <?php echo $city->name; ?>
          </span>
          <?php endif; ?>
        </h1>
      </div>  
    </div>
    
    <div class="container mx-auto px-2 lg:px-5 -mt-20">
      <div class="bg-white shadow-lg rounded-lg mb-12">
        <div class="flex flex-col lg:flex-row lg:-mx-2">
          <div class="w-full lg:w-8/12 lg:px-16 lg:py-10 lg:border-r-2 mb-4 lg:mb-0">
            <div class="place_cover border-b-2 pb-8 mb-8">
              <?php 
                $site_snap = carbon_get_the_post_meta('crb_place_url'); 
                $site_title = get_the_title();
              ?>
              <?php echo do_shortcode('[snapshot url="'. $site_snap .'" alt="'. $site_title . '" width="400" height="300"]'); ?>  
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

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Email', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_email'); ?></span>
              </div>

              <div class="text-gray-700 mb-4">
                <span class="font-semibold"><?php _e('Сайт', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_url'); ?></span>
              </div>

              <?php if (carbon_get_the_post_meta('crb_place_price')): ?>
                <div class="text-gray-700 mb-4">
                  <span class="font-semibold"><?php _e('Средний чек', 'tarakan'); ?></span>: <span class=""><?php echo carbon_get_the_post_meta('crb_place_price'); ?></span>
                </div>
              <?php endif; ?>

              <div class="text-gray-700 font-semibold">
                <?php _e('Категория', 'tarakan'); ?>: <a href="<?php echo get_term_link($myterm->term_id, 'place-type') ?>" class="text-red-400"><?php echo $myterm->name; ?></a>
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
        <!-- Табы -->
        <div class="place_tabs mb-10">
          <ul class="flex flex-col lg:flex-row lg:items-center font-light px-5 lg:px-10">
            <li class="place_tab active text-lg cursor-pointer p-5" data-place_tab="Reviews">
              <?php _e('Отзывы', 'tarakan'); ?>
            </li>
            <li class="place_tab text-lg cursor-pointer border-b-2 border-transparent  p-5" data-place_tab="SEO">
              <?php _e('SEO инофрмация', 'tarakan'); ?>
            </li>
          </ul>
        </div>
        <!-- END Табы -->

        <!-- ТАБЫ Контент -->
        <div id="reviews" class="mb-20">
          <div class="place_tab_content active" data-place_tab="Reviews">
            <div class="w-full lg:w-8/12">
              <?php comments_template(); ?>
            </div>
          </div>
          <div class="place_tab_content" data-place_tab="SEO">
            <div class="w-full lg:w-8/12">
              <?php if (carbon_get_the_post_meta('crb_place_domain_status')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Статус домена', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_status'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_year_start')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Год регистрации домена', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_year_start'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_year_end')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Когда заканчивается домен', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_year_end'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_age')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Возраст домена', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_age'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_register')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Регистратор', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_register'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_title')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Title', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_title'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_description')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Description', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_description'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_h1')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Заголовок H1', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_h1'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_linkpad')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Ссылок по Linkpad', 'tarakan'); ?>:
                </div>
                <div>
                  <?php echo carbon_get_the_post_meta('crb_place_domain_linkpad'); ?>
                </div>
              </div>
              <?php endif; ?>

              <?php if (carbon_get_the_post_meta('crb_place_domain_lang')): ?>
              <div class="flex items-start border-b pb-4 mb-4">
                <div class="font-semibold mr-2">
                  <?php _e('Основной язык сайта', 'tarakan'); ?>:
                </div>
                <div>
                  <?php 
                    if (get_locale() == 'ru_RU') {
                      $ru_lang = "Русский язык";
                      $uk_lang = "Украинский язык";
                      $en_lang = "Английский язык";
                    } else {
                      $ru_lang = "Російська мова";
                      $uk_lang = "Українська мова";
                      $en_lang = "Англійська мова";
                    }
                    $main_language = carbon_get_the_post_meta('crb_place_domain_lang'); 
                    switch ($main_language) {
                      case "ru":
                      case "ru-RU":
                      case "ru-ru":
                        echo $ru_lang;
                        break;
                      case "en":
                        echo $en_lang;
                        break;
                      case "uk":
                      case "uk-UA":
                      case "UK":
                        echo $uk_lang;
                        break;
                    }
                  ?>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- ТАБЫ Контент -->

        <!-- Похожие места -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b mb-6 pb-6">
          <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
            <?php _e('Похожие места', 'tarakan'); ?>
          </h2>
          <div>
            <a href="<?php echo get_post_type_archive_link('places'); ?>" class="text-indigo-500 border border-indigo-500 rounded px-5 py-2">
              <?php _e('Больше мест', 'tarakan'); ?>
            </a>
          </div>
        </div>

        <div class="flex flex-wrap lg:-mx-2 mb-16">
          <?php 
            $c_term = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
            $current_id = get_the_ID();
            $custom_query = new WP_Query( array( 
            'post_type' => 'places', 
            'posts_per_page' => 5,
            'post__not_in' => array($current_id),
            'tax_query' => array(
              array(
                'taxonomy' => 'city',
                'terms' => $c_term[0]->term_id,
                'field' => 'term_id',
                'include_children' => true,
                'operator' => 'IN'
              )
            ),
          ) );
          if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="w-full lg:w-1/4 relative lg:px-2">
              <?php get_template_part('template-parts/place-item'); ?>
            </div>
            
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <!-- END Похожие места -->
      </div>
    </div>
  </div>
<?php endwhile; endif; ?>

<?php get_footer();
