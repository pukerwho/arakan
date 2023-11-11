<tr class="border-b border-gray-200 text-gray-600 even:bg-white">
  <td class="whitespace-nowrap px-3 py-3">
    <div class="hover:text-red-400 font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
  </td>
  <td class="whitespace-nowrap px-3 py-3"><?php echo carbon_get_the_post_meta('crb_place_address'); ?></td>
  <td class="whitespace-nowrap px-3 py-3"><?php echo carbon_get_the_post_meta('crb_place_price'); ?></td>
  <td class="whitespace-nowrap px-3 py-3"><?php echo get_post_meta( get_the_ID(), 'place_count', true ); ?></td>
  <td class="whitespace-nowrap px-3 py-3"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span>/5</td>
</tr>