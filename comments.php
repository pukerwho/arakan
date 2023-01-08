<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package G-Info
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>
		<?php the_comments_navigation(); ?>
		<div class="">
			<?php
			wp_list_comments(
				array(
					'callback'   => 'my_comment',
					'type'       => 'comment',
					'style'      => 'div',
					'short_ping' => true,
				)
			);
			?>
		</div>

		<?php the_comments_navigation();

		if ( ! comments_open() ) : ?>
      <p><?php esc_html_e( 'Comments are closed.', 'g-info' ); ?></p>
    <?php endif;
    endif;
	?>

  <!-- Форма -->
	<div class="shadow-xl rounded-lg border p-5">
		<?php
      comment_form(array(
        'title_reply' => '',
        'class_submit' => 'bg-red-400 text-center text-white font-light rounded px-6 py-2'
      ));
		?>	
	</div>
  <!-- END Форма -->

</div>

<!-- Функция вывода комментария -->

<?php function my_comment( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? 'mb-6' : 'parent mb-6', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>

	<div class="comment-author vcard border-b mb-2 pb-2">
		<?php
      printf(
        __( '<span class="font-semibold">%s</span>' ),
        get_comment_author_link()
      );
		?>
    
	</div>

  <div class="mb-2">
    <?php 
      $comment_rating = carbon_get_comment_meta( $comment->comment_ID, 'crb_comment_rating' ); 
      $comment_rating_css = $comment_rating + 1;
      $comment_rating_css = (int)$comment_rating_css;
    ?>

    <style>
      .comment-rating svg:not(:nth-of-type(n + <?php echo $comment_rating_css; ?>)) {
        fill: #ffaa46;
        stroke: transparent;
      }
    </style>
    <div class="comment-rating flex text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
      </svg>
    </div>
    
    <div class="hidden place-rating">
      <input type="radio" id="star5" name="rating" value="5" />
      <label class="star" for="star5" title="<?php _e("Отлично", "tarakan"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star4" name="rating" value="4" />
      <label class="star" for="star4" title="<?php _e("Хорошо", "tarakan"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star3" name="rating" value="3" />
      <label class="star" for="star3" title="<?php _e("Нормально", "tarakan"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star2" name="rating" value="2" />
      <label class="star" for="star2" title="<?php _e("Плохо", "tarakan"); ?>" aria-hidden="true"></label>
      <input type="radio" id="star1" name="rating" value="1" />
      <label class="star" for="star1" title="<?php _e("Ужасно", "tarakan"); ?>" aria-hidden="true"></label>
    </div>
  </div>

	<div class="text-gray-700 mb-1">
		<?php comment_text(); ?>	
	</div>
	

	<?php if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation">
			<?php _e( 'Your comment is awaiting moderation.' ); ?>
		</em><br/>
	<?php } ?>

	<div class="comment-meta flex text-gray-500">
		<div class="mr-4">
			<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php 
					$d = "F jS, Y";
					$comment_ID = $comment->comment_ID;
					$comment_date = get_comment_date( $d, $comment_ID );
					echo $comment_date;
				?>
			</a>
		</div>

		<div class="mr-4">
			<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>	
		</div>

		<div class="font-semibold text-gray-700 reply">
			<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => $add_below,
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					)
				)
			); ?>
		</div>
	</div>

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
} ?>