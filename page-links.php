<?php
/*
Template Name: All Links
*/
?>

<?php get_header(); ?>

<div class="bg-gradient-to-r from-indigo-600 to-indigo-400 pt-20 pb-32 lg:py-32">
  <div class="container mx-auto px-2 lg:px-5">
    <h1 class="text-2xl lg:text-4xl text-white font-semibold"><?php _e("Всі посилання", "tarakan"); ?></h1>
  </div>  
</div>

<div class="container mx-auto px-2 lg:px-5 -mt-20">
  <div class="bg-white shadow-lg rounded-lg mb-12 pt-10 pb-5 px-8">
    <table class="place-rating w-full bg-gray-100  shadow-lg border-b-transparent text-sm lg:text-md mb-20">
      <tbody>
        <?php 
        global $wp_query, $wp_rewrite;  
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        $query = new WP_Query( array( 
          'post_type' => 'places', 
          'posts_per_page' => 100,
          'order'    => 'DESC',
          'paged' => $current,
          'meta_query' => array(
            array(
              'key' => '_crb_place_url',
              'value' => array(''),
              'compare' => 'NOT IN'
            ),
          ),
        ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <tr class="border-b border-gray-300">
            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
            <td><?php echo carbon_get_the_post_meta('crb_place_url'); ?></td>
          </tr>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </tbody>
    </table>
    <div class="b_pagination text-center">
      <?php 
        $big = 9999999991; // уникальное число
        echo paginate_links( array(
          'format' => 'page/%#%',
          'total' => $query->max_num_pages,
          'current' => $current,
          'prev_next' => true,
          'next_text' => (''),
          'prev_text' => (''),
        )); 
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>