<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package G-Info
 */

get_header();
?>

	<main id="primary">
		<div class="welcome min-h-screen bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 lg:pt-52 pb-36 lg:pb-0">
			<div class="container px-2 lg:px-5 mx-auto">
				<div class="flex flex-col lg:flex-row ">
					<div class="w-full lg:w-7/12 mb-8">
						<h1 class="text-3xl lg:text-5xl font-thin lg:leading-relaxed text-white mb-4">
							<?php _e('Более', 'tarakan'); ?> <span class="uppercase font-semibold">1000</span> <?php _e('отзывов', 'tarakan'); ?> <?php _e('о заведениях', 'tarakan'); ?> <span class="uppercase font-semibold"><?php _e('вашего', 'tarakan'); ?></span> <?php _e('города', 'tarakan'); ?>
						</h1>
						<div class="text-xl font-extralight text-white mb-12">
							<?php _e('Контроль качества общественных заведений Украины', 'tarakan'); ?>
						</div>
						<div class="relative inline-flex items-center bg-red-400 rounded text-white px-6 py-3">
              <a href="<?php echo get_post_type_archive_link('places'); ?>" class="absolute-link"></a>
							<div class="text-xl mr-2">
								<?php _e('Перейти к каталогу', 'tarakan'); ?>
							</div>
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</div>
						</div>
					</div>
					<div class="w-full lg:w-5/12 relative">
						<!-- first review -->
						<div class="w-full lg:w-3/4 lg:absolute lg:-right-10 lg:-top-20 bg-white rounded shadow-lg p-4 mb-6 lg:mb-0">
							<div class="flex justify-between mb-2">
								<div class="text-gray-700 font-semibold">
									Валерій Ломакін
								</div>
								<div>
									<?php get_template_part('template-parts/stars'); ?>
								</div>
							</div>
							<div class="italic font-light text-sm">
								Як на мене - це кращі бургери в Києві. Дуже люблю трюфельний бургер! І Картоплю фрі з соусом трюфеля теж. Дуже смачно.
							</div>
						</div>
						<!-- END first review -->

						<!-- second review -->
						<div class="w-full lg:w-3/4 lg:absolute lg:left-4 lg:top-1/2 lg:transform lg:-translate-y-3/4 bg-white rounded shadow-lg p-4 mb-6 lg:mb-0">
							<div class="flex justify-between mb-2">
								<div class="text-gray-700 font-semibold">
									Євгенія Клименко
								</div>
								<div>
									<div class="stars flex">
									  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffaa46" viewBox="0 0 24 24" stroke="transparent">
									    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
									  </svg>
									  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffaa46" viewBox="0 0 24 24" stroke="transparent">
									    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
									  </svg>
									  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffaa46" viewBox="0 0 24 24" stroke="transparent">
									    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
									  </svg>
									  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffffff" viewBox="0 0 24 24" stroke="#cccccc">
									    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
									  </svg>
									  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffffff" viewBox="0 0 24 24" stroke="#cccccc">
									    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
									  </svg>
									</div>
								</div>
							</div>
							<div class="italic font-light text-sm">
								Раніше дуже любила це місце - їжа завжди була на рівні. Але, мабуть, економія грошей та якості колись наздоганяє всі укр.заклади.
							</div>
						</div>
						<!-- END second review -->

						<!-- third review -->
						<div class="w-full lg:absolute lg:left-20 lg:-bottom-6 bg-white rounded shadow-lg p-4 mb-6 lg:mb-0">
							<div class="flex justify-between mb-2">
								<div class="text-gray-700 font-semibold">
									Владимир Алексеевич
								</div>
								<div>
									<?php get_template_part('template-parts/stars'); ?>
								</div>
							</div>
							<div class="italic font-light text-sm">
								Прекрасный звук и отличное обслуживание. Атмосфера праздника всегда, как только посещаешь это место. Приятно, что это место всегда рядом с моим домом!
							</div>
						</div>
						<!-- END third review -->
					</div>
				</div>
			</div>
		</div>

		<div class="container px-2 lg:px-5 mx-auto mb-20">

			<div class="bg-white rounded-lg shadow-lg -mt-32 px-4 lg:px-8 py-8 mb-20">
				<div class="w-full mb-8">
					<h2 class="text-2xl lg:text-3xl text-gray-700 font-semibold mb-6 lg:px-4"><?php _e('Популярные статьи', 'tarakan'); ?></h2>
					<div class="flex flex-wrap lg:px-4 lg:-mx-4">
						<?php 
						$home_blogs = new WP_Query( array(
							'post_type' => 'post',
							'meta_key' => 'place_count',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'posts_per_page' => 3,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
						));
						if ($home_blogs->have_posts()) : while ($home_blogs->have_posts()) : $home_blogs->the_post(); ?>
							<div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
								<div class="relative">
									<a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
									<div class="h-52 mb-4">
                    <?php 
                      $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                      $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                      $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    ?>
                    <img 
                    src="<?php echo $large_thumb; ?>"
                    srcset="<?php echo $thumb; ?> 150w,
                    <?php echo $medium_thumb; ?> 300w,
                    <?php echo $medium_thumb; ?> 600w,
                    <?php echo $large_thumb; ?> 1000w"
                    sizes="(min-width: 75rem) 60rem,
                    (min-width: 50rem) 40rem,
                    (min-width: 40rem) calc(100vw - 10rem),
                    100vw"
                    class="w-full h-full object-cover rounded-lg" 
                    alt="<?php the_title(); ?>" 
                    loading="lazy" 
                    >
									</div>
									<div class="text-xl text-gray-600"><?php the_title(); ?></div>
								</div>
							</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
				<div class="w-full mb-6">
					<h2 class="text-2xl lg:text-3xl text-gray-700 font-semibold lg:px-4 mb-6"><?php _e('Новые записи', 'tarakan'); ?></h2>
					<div class="flex flex-wrap lg:px-4">
						<?php 
            $home_blogs_args = array(
              'post_type' => 'post',
							'orderby' => 'date',
							'posts_per_page' => 5,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
            );
            // $home_blogs_args['meta_query'][] = array('key' => '_crb_post_mainhide',  'compare' => 'NOT EXISTS');
						$home_blogs = new WP_Query($home_blogs_args);
						if ($home_blogs->have_posts()) : while ($home_blogs->have_posts()) : $home_blogs->the_post(); ?>
							<div class="w-full mb-6">
								<div class="w-full relative border rounded-lg">
									<a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
									<div class="flex items-center -mx-2">
										<div class="px-2">
											<div class="h-32 w-32">
                        <?php 
                          $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                          $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                          $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        ?>
                        <img 
                        src="<?php echo $large_thumb; ?>"
                        srcset="<?php echo $thumb; ?> 150w,
                        <?php echo $medium_thumb; ?> 300w,
                        <?php echo $medium_thumb; ?> 600w,
                        <?php echo $large_thumb; ?> 1000w"
                        sizes="(min-width: 75rem) 60rem,
                        (min-width: 50rem) 40rem,
                        (min-width: 40rem) calc(100vw - 10rem),
                        100vw"
                        class="w-full h-full object-cover rounded-l-lg"
                        alt="<?php the_title(); ?>" 
                        loading="lazy" 
                        >
											</div>
										</div>
										<div class="px-2">
											<div class="text-xl text-gray-600 mb-3">
												<?php the_title(); ?>
											</div>
											<div class="hidden lg:block content text-sm pr-4 lg:pr-10 mb-3">
												<?php 
													$content_text = wp_strip_all_tags( get_the_content() );
													echo mb_strimwidth($content_text, 0, 200, '...');
												?>
											</div>
											<div class="text-sm opacity-50">
												<?php echo get_the_date('d.m.Y'); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
				<div class="relative flex justify-center">
					<a href="<?php echo get_page_url('page-blog'); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
					<div class="flex items-center text-indigo-500 border border-indigo-500 rounded px-6 py-3">
						<div class="mr-2">
							<?php _e('Больше публикаций', 'tarakan'); ?>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
					</div>
				</div>
			</div>

			<!-- Лучшие места -->
			<div class="bg-white rounded-lg shadow-lg border px-8 pb-8 mb-20">
				<div class="text-center py-10">
					<h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-6"><?php _e('Лучшие заведения Украины', 'tarakan'); ?></h2>
					<div class="text-gray-600">
						<?php _e('На основе отзывов полученных от пользователей', 'tarakan'); ?>
					</div>
				</div>
				<div class="overflow-x-auto mb-10">
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
						<tbody class="text-sm shadow-2xl">
							<?php 
								$popular_places_query = new WP_Query( array(
									'post_type' => 'places',
									'orderby' => 'rand',
									'posts_per_page' => 5,
									'meta_query' => array(
										array(
											'key'       => '_crb_place_rating',
											'value'     => 4,
											'compare'   => '>'
										)
                  ),
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'place-type',
                      'field'    => 'term_id',
                      'terms'    => array( 30255, 30257 ),
                      'operator' => 'NOT IN',
                    )
                  ),
								));
								if ($popular_places_query->have_posts()) : while ($popular_places_query->have_posts()) : $popular_places_query->the_post(); ?>
									<?php get_template_part('template-parts/place-item-table'); ?>
							<?php endwhile; endif; wp_reset_postdata(); ?>
						</tbody>
					</table>
				</div>
				<div class="relative flex justify-center">
					<a href="<?php echo get_post_type_archive_link('places'); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
					<div class="flex items-center bg-red-400 text-gray-50 rounded px-6 py-3">
						<div class="mr-2">
							<?php _e('Больше популярных мест', 'tarakan'); ?>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
					</div>
				</div>
			</div>
			<!-- END Лучшие места -->

			<!-- Новые места -->
			<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center border-b border-gray-300 pb-8 mb-8">
				<h2 class="text-2xl text-gray-700 font-semibold mb-6 lg:mb-0">
					<?php _e('Новые места', 'tarakan'); ?>
				</h2>
				<div>
					<a href="<?php echo get_post_type_archive_link('places'); ?>" class="bg-white text-gray-700 border rounded px-6 py-3"><?php _e('Все места', 'tarakan'); ?></a>
				</div>
			</div>
			<div class="overflow-x-auto shadow-xl mb-10">
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
							$popular_places_query = new WP_Query( array(
								'post_type' => 'places',
								'orderby' => 'date',
								'posts_per_page' => 10,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'place-type',
                    'field'    => 'term_id',
                    'terms'    => array( 30255, 30257 ),
                    'operator' => 'NOT IN',
                  )
                ),
							));
							if ($popular_places_query->have_posts()) : while ($popular_places_query->have_posts()) : $popular_places_query->the_post(); ?>
								<?php get_template_part('template-parts/place-item-table'); ?>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</tbody>
				</table>
			</div>
			<div class="relative flex justify-center mb-20">
				<a href="<?php echo get_post_type_archive_link('places'); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
				<div class="flex items-center text-indigo-500 border border-indigo-500 rounded px-6 py-3">
					<div class="mr-2">
						<?php _e('Перейти в каталог', 'tarakan'); ?>
					</div>
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</div>
				</div>
			</div>
			<!-- END Новые места -->

			<!-- Популярні Кафе в Україні -->
			<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center border-b border-gray-300 pb-8 mb-8">
				<h2 class="text-2xl text-gray-700 font-semibold mb-6 lg:mb-0">
					<?php _e('Популярные кафе в Украине', 'tarakan'); ?>
				</h2>
				<div>
					<?php if (get_locale() == 'ru_RU') {
						$term_kafe = 6;
					} else {
						$term_kafe = 27;
					} ?>
					<a href="<?php echo get_term_link($term_kafe, 'place-type') ?>" class="bg-white text-gray-700 border rounded px-6 py-3"><?php _e('Все кафе', 'tarakan'); ?></a>
				</div>
			</div>
			<div class="overflow-x-auto shadow-xl mb-10">
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
							$popular_places_query = new WP_Query( array(
								'post_type' => 'places',
								'posts_per_page' => 10,
								'orderby' => 'rand',
								'tax_query' => array(
									array(
										'taxonomy' => 'place-type',
										'terms' => array(27,6),
										'field' => 'term_id',
										'include_children' => true,
										'operator' => 'IN'
									)
								),
							));
							if ($popular_places_query->have_posts()) : while ($popular_places_query->have_posts()) : $popular_places_query->the_post(); ?>
								<?php get_template_part('template-parts/place-item-table'); ?>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</tbody>
				</table>
			</div>
			<div class="relative flex justify-center mb-20">
				<a href="<?php echo get_term_link($term_kafe, 'place-type') ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
				<div class="flex items-center text-indigo-500 border border-indigo-500 rounded px-6 py-3">
					<div class="mr-2">
						<?php _e('Все кафе', 'tarakan'); ?>
					</div>
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</div>
				</div>
			</div>
			<!-- END Популярні Кафе в Україні -->

			<!-- Города -->
			<h2 class="text-2xl text-gray-700 font-semibold mb-6"><?php _e('Города', 'tarakan'); ?></h2>
			<div class="flex flex-wrap -mx-2 mb-10">
				<?php $home_cities = get_terms( array( 
					'taxonomy' => 'city', 
					'parent' => 0, 
					'show_count' => true,
					'hide_empty' => false,
				));
				shuffle( $home_cities );
				foreach ( array_slice($home_cities, 0, 4) as $home_city ): ?>
					<div class="w-1/2 lg:w-1/4 relative px-2">
						<a href="<?php echo get_term_link($home_city); ?>" class="w-full h-full absolute left-0 top-0 z-10"></a>
						<div class="h-52 mb-4">
							<img src="<?php echo carbon_get_term_meta($home_city->term_id, 'crb_city_img' ); ?>" alt="<?php echo $home_city->name ?>" loading="lazy" class="w-full h-full object-cover rounded-lg">
						</div>
						<div class="font-semibold text-gray-700 text-lg">
							<?php echo $home_city->name ?>
						</div>
						<div class="text-sm text-gray-600">
							<?php _e('Кол-во заведений в городе', 'tarakan'); ?>:
							<span class="font-semibold">
								<?php 
									$count_places_in_city = $home_city->count; 
									echo $count_places_in_city;
								?>
							</span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="relative flex justify-center mb-20">
				<a href="<?php echo get_page_url('page-allcity'); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
				<div class="flex items-center text-indigo-500 border border-indigo-500 rounded px-6 py-3">
					<div class="mr-2">
						<?php _e('Все города', 'tarakan'); ?>
					</div>
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</div>
				</div>
			</div>
			<!-- END Города -->
		</div>

		<!-- Что на Таракане (преимущества) -->
		<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 text-white py-16 mb-20">
			<div class="container px-2 lg:px-5 mx-auto">
				<h2 class="text-2xl lg:text-4xl text-center mb-10"><?php _e('Преимущества Таракана', 'tarakan'); ?></h2>
				<div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
					<!-- Добавить в избранное -->
					<div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
						<div class="flex items-center">
							<div class="mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
								</svg>
							</div>
							<div>
								<div class="font-bold mb-1"><?php _e('Добавляйте в избранное', 'tarakan'); ?></div>
								<div class="text-sm text-thin"><?php _e('Понравилось заведение? Есть возможность добавить его в избранное', 'tarakan'); ?>.</div>
							</div>
						</div>
					</div>
					<!-- Добавить в избранное -->

					<!-- Честные отзывы -->
					<div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
						<div class="flex items-center">
							<div class="mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
								</svg>
							</div>
							<div>
								<div class="font-bold mb-1"><?php _e('Правдивые отзывы', 'tarakan'); ?></div>
								<div class="text-sm text-thin"><?php _e('Мы не удаляем отзывы. Не грубите и не оскробляйте других', 'tarakan'); ?>.</div>
							</div>
						</div>
					</div>
					<!-- Честные отзывы -->

					<!-- Акции -->
					<div class="w-full lg:w-1/3 lg:px-4 mb-6 lg:mb-0">
						<div class="flex items-center">
							<div class="mr-4">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
								</svg>
							</div>
							<div>
								<div class="font-bold mb-1"><?php _e('Акции и распродажи', 'tarakan'); ?></div>
								<div class="text-sm text-thin"><?php _e('Узнавайте первыми про акции или распродажи, которые проходят в вашем городе', 'tarakan'); ?>.</div>
							</div>
						</div>
					</div>
					<!-- Акции -->
				</div>
			</div>
		</div>
		<!-- END Что на Таракане (преимущества) -->

		<!-- Блог -->
		<div class="mb-20">
			<h2 class="text-2xl lg:text-4xl font-semibold text-gray-700 text-center mb-6"><?php _e('Наш блог', 'tarakan'); ?></h2>
			<div class="text-center text-gray-700 mb-6">
				<?php _e('Все что касается работы сайта - здесь', 'tarakan'); ?>
			</div>
			<div class="container px-2 lg:px-5 mx-auto">
				<div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 mb-8">
					<?php 
						$home_blogs = new WP_Query( array(
							'post_type' => 'post',
							'orderby' => 'date',
							'posts_per_page' => 3,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
						));
						if ($home_blogs->have_posts()) : while ($home_blogs->have_posts()) : $home_blogs->the_post(); ?>
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
				<div class="relative flex justify-center mb-20">
					<a href="<?php echo get_page_url('page-blog'); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
					<div class="flex items-center text-indigo-500 border border-indigo-500 rounded px-6 py-3">
						<div class="mr-2">
							<?php _e('Больше публикаций', 'tarakan'); ?>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Блог -->

	</main><!-- #main -->

<?php
get_footer();
