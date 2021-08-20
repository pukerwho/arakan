<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package G-Info
 */

?>

<div id="post-<?php the_ID(); ?>" class="bg-white shadow rounded-lg relative p-5 mb-4">
	<a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-10"></a>
	<!-- Автор -->
	<div class="post-author flex items-center mb-2">
		<div class="post-author__info">
			<div class="flex items-center text-gray-500 text-sm">
				
				<div class="mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
				</svg>
				</div>

				<span><?php echo get_the_date('j/n/Y') ?></span>
				
			</div>
		</div>
	</div>
	<!-- END Автор -->

	<!-- Title -->
	<div class="text-lg font-bold mb-2">
		<?php the_title(); ?>
	</div>
	<!-- END Title -->

	<!-- Content -->
	<div class="mb-4">
		<?php 
			$content_text = wp_strip_all_tags( get_the_content() );
			echo mb_strimwidth($content_text, 0, 200, '...');
		?>
	</div>
	<!-- END Content -->

	<!-- Info -->
	<div class="flex items-center text-gray-500">

		<!-- Комментарии -->
		<div class="flex items-center mr-4">
			<div class="mr-2">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="font-semibold">
				<?php echo get_comments_number(); ?>
			</div>
		</div>
		<!-- END Комментарии -->

		<!-- Просмотры -->
		<div class="flex items-center">
			<div class="mr-2">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
				  <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="font-semibold">
				<?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?>
			</div>
		</div>
		<!-- END Просмотры -->
	</div>
	<!-- END Info -->
	
</div><!-- #post-<?php the_ID(); ?> -->
