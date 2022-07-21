
<!-- Row -->
<tr class="border-b border-gray-300 last:border-transparent">
  <td class="whitespace-nowrap px-2 py-3">
    <div class="text-gray-500 hover:text-red-400 font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
  </td>
  <td class="whitespace-nowrap flex items-center px-2 py-3">
    <?php 
    $other_current_city = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
    foreach (array_slice($other_current_city, 0,1) as $current_city):
    ?>
      <?php if ($current_city): ?>
        <div class="mr-2">
          <img src="<?php echo carbon_get_term_meta($current_city->term_id, 'crb_city_img' ); ?>" alt="<?php echo $current_city->name ?>" loading="lazy" class="w-[2.5rem] min-w-[2.5rem] h-10 h-min-10 object-cover rounded-full">
        </div>
        <div class="text-gray-500"><?php echo $current_city->name; ?></div>
      <?php endif; ?>
    <?php endforeach; ?>
  </td>
  <td class="max-w-xs whitespace-nowrap overflow-hidden px-2 py-3">
    <div class="text-gray-500 font-light"><?php echo carbon_get_the_post_meta('crb_place_address'); ?></div>
  </td>
  <td class="whitespace-nowrap px-2 py-3">
    <?php 
    $other_current_terms = wp_get_post_terms(  get_the_ID() , 'place-type', array( 'parent' => 0 ) );
    foreach (array_slice($other_current_terms, 0,1) as $other_place_term):
    ?>
      <?php if ($other_place_term): ?>
        <div class="text-gray-500"><?php echo $other_place_term->name; ?></div> 
      <?php endif; ?>
    <?php endforeach; ?>
  </td>
  <td class="whitespace-nowrap flex items-center px-2 py-3">
    <div class="mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="#ffaa46" viewBox="0 0 24 24" stroke="transparent">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
      </svg>
    </div>
    <div class="text-gray-500"><span class="font-medium"><?php echo carbon_get_the_post_meta('crb_place_rating'); ?></span></div>
  </td>
</tr>
