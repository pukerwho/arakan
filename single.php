<?php get_header(); ?>

<?php $countNumber = tutCount(get_the_ID()); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
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
          <a itemprop="item" href="<?php echo get_post_type_archive_link('post'); ?>" class="text-white opacity-90">
            <span itemprop="name"><?php _e( 'Блог', 'restx' ); ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
        <?php 
        $post_categories = wp_get_post_categories( get_the_ID(), array('fields' => 'all') );
        foreach ($post_categories as $post_category): ?>
	        <?php if ($post_category): ?>
	        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item" >
	          <a itemprop="item" href="<?php echo get_category_link($post_category->term_id) ?>" class="text-white opacity-90">
	            <span itemprop="name"><?php echo $post_category->name; ?></span>
	          </a>
	          <meta itemprop="position" content="3" />
	        </li>
	        <?php endif; ?>
	      <?php endforeach; ?>
      </ul>
    </div>
    <!-- END Хлебные крошки -->
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php the_title(); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12">
    <div class="flex flex-col lg:flex-row lg:-mx-2">

      <div class="w-full lg:w-8/12 lg:px-8 lg:py-6 lg:border-r-2 mb-4 lg:mb-0">
      	<div class="content">
      		<?php the_content(); ?>	
      	</div>
      </div>

      <div class="w-full lg:w-4/12 px-4 lg:px-10 py-10 ">

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
    <div class="w-full lg:w-8/12 mb-12">
    	<h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4">
        <?php _e('Комментарии', 'tarakan'); ?>
      </h2>
      <div>
      	<?php comments_template(); ?>	
      </div>
    </div>

    <!-- Похожие записи -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between border-b mb-6 pb-6">
      <h2 class="text-2xl lg:text-4xl text-gray-700 font-semibold mb-4 lg:mb-0">
        <?php _e('Другие записи', 'tarakan'); ?>
      </h2>
      <div>
        <a href="<?php echo get_post_type_archive_link('post'); ?>" class="text-indigo-500 border border-indigo-500 rounded px-5 py-2">
          <?php _e('Перейти в блог', 'tarakan'); ?>
        </a>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 mb-8">
      <?php 
        $current_id = get_the_ID();
        $custom_query = new WP_Query( array( 
        'post_type' => 'post', 
        'posts_per_page' => 5,
        'post__not_in' => array($current_id),
      ) );
      if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        <div class="w-full lg:w-1/3 mb-6 lg:mb-0 lg:px-4">
					<div class="border border-gray-300 rounded">
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
    <!-- END Похожие места -->
  </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer();
