<?php if ( post_password_required() ) {
	return;
} ?>

<?php 

// Get only the approved comments
// $args = array(
// 	'status' => 'approve',
//   'post_id' => get_the_ID(),

// );

// // The comment Query
// $comments_query = new WP_Comment_Query();
// $comments       = $comments_query->query( $args );

$post__in_array = array();
$translation_id = pll_get_post_translations(get_the_ID());
foreach ($translation_id as $tr_id) {
  array_push($post__in_array, $tr_id);
}
$args = array(
  'post__in' => $post__in_array,
  'status' => 'approve',
  'type' => 'comment',
);

$comments = get_comments( $args );

// Comment Loop
if ( $comments ): ?>
  <?php wp_list_comments(
    array(
      'callback'   => 'my_comment',
      'type'       => 'comment',
      'style'      => 'div',
    ), 
    $comments); ?>
<?php else: ?>
  <div class="bg-indigo-50 rounded-lg text-lg px-4 py-2 mb-6"><?php _e("Станьте первым, кто напишет отзыв", "tarakan"); ?> ⬇️</div>
<?php endif; ?>


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

	<div class="bg-indigo-50 rounded-lg p-4 mb-4">
    <div class="font-bold border-b border-gray-200 mb-2 pb-2"><?php echo $comment->comment_author; ?></div>
    <div class="content border-b border-gray-200 pb-2 mb-2">
      <?php if ($comment->comment_parent === '0'): ?>
      <?php 
        $comment_rating = carbon_get_comment_meta( $comment->comment_ID, 'crb_comment_rating' ); 
        echo $comment_rating;
        $comment_id_css = '#comment-'.$comment->comment_ID;
      ?>

      <style>
        <?php echo $comment_id_css; ?> .comment-rating .comment-rating-star:nth-child(-n+<?php echo $comment_rating; ?>) {
          fill: #ffaa46;
          stroke: transparent;
        }
      </style>
      <div class="comment-rating flex text-gray-500 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="comment-rating-star w-5 h-5">
          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
        </svg>
      </div>
      <?php endif; ?>
      <?php echo $comment->comment_content; ?>
    </div>
    <div class="flex justify-between items-center text-sm -mx-2">
      <div class="opacity-60 px-2"><?php echo get_comment_date('F jS, Y', $comment->comment_ID); ?></div>
      <div class="px-2 text-indigo-500">
        <?php
        comment_reply_link( array_merge( $args, array(
          'add_below' => $add_below,
          'depth'     => $depth,
          'max_depth' => $args['max_depth'],
          'before'    => '<div class="reply">',
          'after'     => '</div>'
        ) ) );
        ?>
      </div>
    </div>
  </div>

	<?php if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation">
			<?php _e( 'Ваш комментарий ожидает проверки' ); ?>.
		</em><br/>
	<?php } ?>
  

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
} ?>

<!-- Форма -->
<div>
  <?php
    comment_form(array(
      'title_reply' => '📝 '.__("Ваш отзыв", "tarakan"),
      'class_submit' => 'bg-red-400 text-center text-white font-light rounded px-6 py-2'
    ));
  ?>	
</div>
<!-- END Форма -->