<?php

$current_title = wp_get_document_title();

// FOR Main Page
if ( is_home() ) {
  $home_title = crb_get_i18n_theme_option('crb_seo_mainpage_title'); 
  $home_description = crb_get_i18n_theme_option('crb_seo_mainpage_description'); 
  if ($home_title) {
    $current_title = $home_title;
  }
  if ($home_description) {
    $current_description = $home_description;
  }
}

// FOR POSTs
if ( is_singular( 'post' ) ) {
  $post_title = carbon_get_the_post_meta('crb_post_title');
  $post_description = carbon_get_the_post_meta('crb_post_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

if ( is_singular( 'places' ) ) {
	//Название заведения
	$place_title = get_the_title();
	//Город
	$current_cities = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
  $current_city = $current_cities[0]->name;
  
  //SEO
  $place_after_title = crb_get_i18n_theme_option('crb_seo_place_aftertitle'); 
  $place_after_description = crb_get_i18n_theme_option('crb_seo_place_afterdescription');
  
  $school_after_title = crb_get_i18n_theme_option('crb_seo_school_aftertitle'); 
  $school_after_description = crb_get_i18n_theme_option('crb_seo_school_afterdescription');

  $univer_after_title = crb_get_i18n_theme_option('crb_seo_univer_aftertitle'); 
  $univer_after_description = crb_get_i18n_theme_option('crb_seo_univer_afterdescription');

  $sad_after_title = crb_get_i18n_theme_option('crb_seo_sad_aftertitle'); 
  $sad_after_description = crb_get_i18n_theme_option('crb_seo_sad_afterdescription');

  // $school_after_title = crb_get_i18n_theme_option('crb_seo_mainpage_title'); 
  if (carbon_get_the_post_meta('crb_template_sad') === 'yes') {
    $after_title = $sad_after_title;
    $after_description = $sad_after_description;
  } elseif (carbon_get_the_post_meta('crb_template_school') === 'yes') {
    $after_title = $school_after_title;
    $after_description = $school_after_description;
  } elseif (carbon_get_the_post_meta('crb_template_univer') === 'yes') {
    $after_title = $univer_after_title;
    $after_description = $univer_after_description;
  } else {
    $after_title = $place_after_title;
    $after_description = $place_after_description;
    // 'Отзывы, контакты, телефоны, доставка';
  }
	
	$current_title = $place_title . ' (' . $current_city . ') - ' . $after_title;
  $current_description = $place_title . ' (' . $current_city . ') - ' . $after_description;
}

if (is_tax( 'city' )) {
  $tax_title = single_term_title( "", false );
  $tax_id = get_queried_object_id();
  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
  
  $term_header = get_term_by('slug', get_query_var('term'), 'city');
  if (carbon_get_term_meta($tax_id, 'crb_category_title')) {
    $current_title = carbon_get_term_meta($tax_id, 'crb_category_title');
    $current_description = carbon_get_term_meta($tax_id, 'crb_category_description');
  } else {
    if((int)$term_header->parent) {
      // child
      $parent_term = get_term_by( 'id', $term_header->parent, 'city' );  
      $parent_name = $parent_term->name; 
      if (get_locale() === 'ru_RU') {
        $help_title_text = ': где лучшие в городе - реальные отзывы';
        $help_description_text = '. Отзывы, комментарии, фото. Большой каталог городов. Найди лучшие города на сайте Tarakan.org.ua!';
        $current_page = '. Страница №' . $paged;
      } else {
        $help_title_text = ': де найкращі в місті - реальні відгуки';
        $help_description_text = '. Відгуки, комментарі, фото. Великий каталог міст. Знайди найкращі міста на сайті Tarakan.org.ua!';
        $current_page = '. Cторінка №' . $paged;
      }
      $current_title = $parent_name . ' (' . $tax_title  . ')' . $help_title_text;
      if ($paged > 1) {
        $current_title = $parent_name . ' (' . $tax_title . ')' . $help_title_text . '' . $current_page;
      }
      $current_description = $parent_name . ' (' . $tax_title  . ')' . $help_description_text;
    } else {
      // parent
      if (get_locale() === 'ru_RU') {
        $help_title_text = 'Все заведения, лучшие места в городе ';
        $help_description_text = 'Каталог заведений на сайте Tarakan.org.ua - отзывы, оценки, комментарии. Лучшие места в г.';
        $current_page = '. Страница №' . $paged;
      } else {
        $help_title_text = 'Усі заклади, найкращі заклади в місті ';
        $help_description_text = 'Каталог закладів на сайті Tarakan.org.ua – відгуки, оцінки, коментарі. Найкращі місця у м.';
        $current_page = '. Cторінка №' . $paged;
      }
      $current_title = $tax_title . ': ' . $help_title_text . '' . $tax_title;
      if ($paged > 1) {
        $current_title = $tax_title . ': ' . $help_title_text . '' . $tax_title . '' . $current_page;
      }
      $current_description = $tax_title . ': ' . $help_description_text . '' . $tax_title;
    }   
  } 
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>"/>
  <?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <?php if (is_singular()): ?>
    <meta property="og:title" content="<?php echo $current_title; ?>" />
    <?php if ($current_description): ?>
      <meta property="og:description" content="<?php echo $current_description; ?>" />
    <?php else: ?>
      <?php 
        $content_text_for_description = wp_strip_all_tags( get_the_content() );
      ?>
      <meta property="og:description" content="<?php echo mb_strimwidth($content_text_for_description, 0, 150, '...'); ?>" />
    <?php endif; ?>
    <?php if (get_the_post_thumbnail_url()): ?>
      <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <?php else: ?>
      <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/check-tarakan.png">  
    <?php endif; ?>
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <meta property="og:article:author" content="<?php echo carbon_get_the_post_meta('crb_post_author'); ?>" />
    <?php else: ?>
      <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <?php endif; ?>
  
  <?php endif; ?>
	
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="w-full absolute left-0 top-0 z-11">
    <div class="bg-gray-100 py-2">
      <div class="container px-2 lg:px-5 mx-auto">
        <div class="flex items-center justify-between">

          <!-- Left Side -->
          <div class="flex items-center">
            <!-- Лого -->
            <div class="text-2xl font-semibold mr-4 lg:mr-6">
              <a href="<?php echo home_url(); ?>">
                <span class="w-[35px] h-[35px] inline-flex justify-center items-center bg-gradient-to-r from-indigo-600 to-indigo-400 rounded-lg text-white">T</span>
              </a>
            </div>
            <!-- END Лого -->

            <!-- Menu -->
            <div class="header-menu hidden lg:block mr-2">
              <?php wp_nav_menu([
                'theme_location' => 'menu-1',
                'container' => 'div',
                'menu_class' => 'flex',
              ]); ?> 
            </div>
            <!-- END Menu -->

            <div class="hidden md:block border-l-2 pl-4 ml-4 mr-6">
              <div class="flex items-center -mx-2">
                <div class="px-2">
                  <div class="relative">
                    <a href="https://www.facebook.com/tarakanua/" class="absolute-link" target="_blank"></a>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-logo.svg" width="20">
                  </div>
                </div>
                <div class="px-2">
                  <div class="relative">
                    <a href="https://t.me/joinchat/ULWsxKhqmr85YzQ6" class="absolute-link" target="_blank"></a>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/telegram-logo.svg" width="20">
                  </div>
                </div>
              </div>
            </div>

            <!-- Поиск -->
            <div class="hidden w-full">
              <?php echo get_search_form(); ?>	
            </div>
            <!-- END Поиск -->

          </div>
          <!-- END Left Side -->

          <!-- Right Side -->
          <div class="flex items-center">

            <!-- Пошук -->
            <div class="mr-6 lg:mr-4">
              <form role="search" method="get" class="search-form flex items-center relative" action="<?php echo home_url( '/' ); ?>">
                <div class="absolute left-3 top-3 text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                  </svg>  
                </div>
                <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="w-64 border border-gray-300 text-gray-700 shadow-sm rounded px-4 pl-10 py-2" placeholder="<?php _e('Поиск', 'tarakan'); ?>" />
                <input type="hidden" name="post_type" value="places" />
                <input type="submit" class="search-submit hidden" value="<?php echo esc_attr_x( 'Найти', 'submit button' ) ?>" />
              </form>
            </div>
            <!-- End Пошук -->

            <!-- Кнопка Добавить -->
            <div class="flex items-center relative bg-indigo-500 rounded text-white text-sm lg:text-md px-4 lg:px-6 py-2 mr-6 lg:mr-4">
              <a href="<?php echo get_page_url('page-add'); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
              <div class="mr-2">
                <?php _e('Добавить', 'tarakan'); ?>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 lg:h-6 w-5 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
              </div>
            </div>
            <!-- END Кнопка Добавить -->

            <!-- Гамбургер -->
            <div class="hamburger-toggle block lg:hidden relative">
              <div class="hamburger-toggle__open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
              </div>
              <div class="hamburger-toggle__close hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              
            </div>
            <!-- END Гамбургер -->

          </div>
          <!-- END Right Side -->
        </div>
      </div>
    </div>
    <div class="hidden lg:block bg-white border-b border-gray-300 py-2">
      <div class="container px-2 lg:px-5 mx-auto">
        <div class="flex items-center justify-between relative">
          <!-- left side -->
          <div class="flex items-center">
            <div class="menu-categories mr-4">
              <?php wp_nav_menu([
                'theme_location' => 'main_cat',
                'container' => 'div',
                'menu_class' => 'flex',
              ]); ?> 
            </div>
            <!-- Категории -->
            <div class="top-menu border-l-2 ml-4 pl-4">

              <div class="flex items-center hover:text-red-400 cursor-pointer">
                <div class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div>
                  <?php _e('Все категории', 'tarakan'); ?>	
                </div>
              </div>
              
              <div class="sub-menu w-full absolute left-0 top-8 -mt-2">
                <ul class="flex items-center flex-wrap bg-white rounded shadow-2xl border border-gray-100 lg:-mx-4">
                  <?php $footer_categories = get_terms( array( 
                    'taxonomy' => 'place-type', 
                    'parent' => 0, 
                    'hide_empty' => false,
                  ));
                  foreach ( $footer_categories as $footer_category ): ?>
                    <li class="w-full lg:w-1/4 font-light px-4 py-2 border-b border-gray-200 lg:px-4">
                      <a href="<?php echo get_term_link($footer_category); ?>"><?php echo $footer_category->name ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <!-- END Категории -->
          </div>

          <!-- right side -->
          <div class="text-sm text-gray-700">
            <?php _e("Обновлено", "tarakan"); ?>: <?php echo get_the_date("d.m.Y"); ?>
          </div>
        </div>
      </div>
    </div>
	</header><!-- #masthead -->

	<!-- На мобильном поиск -->
	<div class="container hidden px-2 mx-auto">
		<div class="pb-4">
			<?php echo get_search_form(); ?>
		</div>
	</div>
	<!-- END На мобильном поиск -->

	<div class="mobile-menu hidden h-full w-full fixed top-auto bottom-0 left-0 overflow-y-scroll pt-[68px]">
		<div class="bg-white dark:bg-dark-xl p-4">
			<div class="text-xl mb-4"><?php _e("Меню", "tarakan"); ?>:</div>
			<?php wp_nav_menu([
	      'theme_location' => 'menu-1',
	      'container' => 'div',
	      'menu_class' => 'flex flex-col mobile-menu__list mb-6'
	    ]); ?> 
			<div class="mb-6">
				<div class="text-xl mb-4"><?php _e("Категории", "tarakan"); ?></div>
				<ul>
					<?php foreach ( $footer_categories as $footer_category ): ?>
					<li class="font-light text-sm py-2 border-b border-gray-200">
						<a href="<?php echo get_term_link($footer_category); ?>"><?php echo $footer_category->name ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<div class="text-xl mb-4"><?php _e("Язык", "tarakan"); ?>:</div>
				<!-- Переключатель языка -->
				<div class="lang inline-flex items-center shadow">
					<?php if (function_exists('pll_the_languages')) { 
						pll_the_languages(); 
					} ?>
				</div>
				<!-- END Переключатель языка -->
			</div>
		</div>
	</div>
