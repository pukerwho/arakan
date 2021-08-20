<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package G-Info
 */

get_header();
?>

	<main id="primary" class="bg-gray-100 pt-10">
		<?php $countNumber = tutCount(get_the_ID()); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="container px-2 lg:px-0 mx-auto">

				<!-- Top -->
				<div class="w-full lg:w-8/12">
					<div class="mb-10">

						<h1 class="text-2xl font-semibold mb-1">
							<?php the_title(); ?>
						</h1>	

						<div class="flex items-center text-gray-500">

							<div class="flex items-center mr-4">
								<div class="mr-2">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
									</svg>
								</div>
								<div>
									<?php echo get_the_modified_time('d M'); ?>
								</div>
							</div>

							<div class="flex items-center mr-5">
								<div class="mr-2">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
									</svg>
								</div>
								<div>
									<?php echo $countNumber; ?>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- END Top -->

				<div class="flex flex-wrap lg:-mx-4">

					<!-- Left -->
					<div class="w-full lg:w-8/12 lg:px-4">

						<!-- Контент -->
						<div class="content bg-white shadow rounded-lg p-5 mb-8">
							<?php the_content(); ?>
						</div>
						<!-- END Контент -->

					</div>
					<!-- END Left -->

					<!-- Right -->
					<div class="w-full lg:w-4/12 lg:px-4">
						<div class="mb-6">
							<?php get_template_part( 'template-parts/block-ads' ); ?>	
						</div>
						<div class="mb-6">
							<?php get_template_part( 'template-parts/block-humor' ); ?>
						</div>
						<div class="mb-6">
							<?php get_template_part( 'template-parts/block-telegram' ); ?>
						</div>
					</div>
					<!-- END Right -->
				</div>
			</div>

		<?php endwhile; endif; ?>

	</main><!-- #main -->

<?php
get_footer();
