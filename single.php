<?php get_header(); ?>

<?php $countNumber = tutCount(get_the_ID()); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:pt-32">
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
          <a itemprop="item" href="#" class="text-white opacity-90">
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
    <h1 class="text-2xl lg:text-4xl text-white font-semibold">
    	<?php the_title(); ?> 
    </h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
	<!-- Основной контент -->
	<div class="bg-white shadow-lg rounded-lg mb-12 p-8">
		<div class="font-light text-gray-700 mb-2">
			<?php _e('Автор', 'tarakan'); ?>: <span class="font-semibold text-gray-700"><?php echo get_the_author(); ?></span>
		</div>
		<div class="font-light text-gray-700 mb-6">
			<?php _e('Дата', 'tarakan'); ?>: <span class="font-semibold text-gray-700"><?php echo get_the_modified_time('j/n/Y') ?></span>
		</div>
		<?php the_content(); ?>
	</div>
	<!-- END Основной контент -->

	<div>
		
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer();
