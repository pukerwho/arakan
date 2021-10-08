<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G-Info
 */

$current_title = wp_get_document_title();
if ( is_singular( 'places' ) ) {
	//Название заведения
	$place_title = get_the_title();
	//Город
	$current_cities = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
  foreach (array_slice($current_cities, 0,1) as $city) {
	  if ($city) {
	  	$current_city = $city->name;
	  }	
  } 
  //SEO
  if (get_locale() === 'ru_RU') {
  	$after_title = 'Отзывы, контакты, телефоны';
  } else {
  	$after_title = 'Відгуки, контакти, телефони';
  }
	
	$current_title = $place_title . ' (' . $current_city . ') - ' . $after_title;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $current_title; ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="w-full absolute left-0 top-0 bg-white py-4">
		<div class="container px-2 lg:px-5 mx-auto">
			<div class="flex items-center justify-between">

				<!-- Left Side -->
				<div class="flex items-center">
					<!-- Лого -->
					<div class="text-2xl font-semibold mr-4 lg:mr-10">
						<a href="<?php echo home_url(); ?>">
							Tarakan
						</a>
					</div>
					<!-- END Лого -->

					<!-- Категории -->
					<div class="hidden lg:block top-menu relative border-r-2 pr-6 mr-6">

						<div class="flex items-center hover:text-red-400 cursor-pointer">
							<div class="mr-2">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								  <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
								</svg>
							</div>
							<div>
								<?php _e('Категории', 'tarakan'); ?>	
							</div>
						</div>
						
						<div class="sub-menu absolute left-0 top-8 bg-white rounded shadow-2xl border border-gray-100 -mt-2">
							<ul>
								<?php $footer_categories = get_terms( array( 
	                'taxonomy' => 'place-type', 
	                'parent' => 0, 
	                'hide_empty' => false,
	              ));
	              foreach ( $footer_categories as $footer_category ): ?>
	                <li class="font-light text-sm px-4 py-2 border-b border-gray-200">
	                  <a href="<?php echo get_term_link($footer_category); ?>"><?php echo $footer_category->name ?></a>
	                </li>
	              <?php endforeach; ?>
              </ul>
						</div>
					</div>
					<!-- END Категории -->

					<!-- Блог -->
					<div class="hidden lg:block mr-6">
						<?php _e('Блог', 'tarakan'); ?>
					</div>
					<!-- END Блог -->

					<!-- Поиск -->
					<div class="hidden w-full">
						<?php echo get_search_form(); ?>	
					</div>
					<!-- END Поиск -->

				</div>
				<!-- END Left Side -->

				<!-- Right Side -->
				<div class="flex items-center">

					<!-- Кнопка Добавить -->
					<div class="flex items-center bg-indigo-500 rounded text-white text-sm lg:text-md px-4 lg:px-6 py-2 mr-4">
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
					
					<!-- Переключатель языка -->
					<div class="lang flex items-center shadow">
            <?php if (function_exists('pll_the_languages')) { 
              pll_the_languages(); 
            } ?>
          </div>
          <!-- END Переключатель языка -->

				</div>
				<!-- END Right Side -->

				<!-- Гамбургер -->
				<div class="hidden relative -mt-4">
					<span class="w-7 h-0.5 absolute bg-gray-600 top-0 right-0"></span>
					<span class="w-7 h-0.5 absolute bg-gray-600 top-2 right-0"></span>
					<span class="w-7 h-0.5 absolute bg-gray-600 top-4 right-0"></span>
				</div>
				<!-- END Гамбургер -->
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
