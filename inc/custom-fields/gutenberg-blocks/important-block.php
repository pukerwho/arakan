<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'TREBA Important Block' )
	->add_fields( array(
		Field::make( 'textarea', 'crb_post_important_block', 'Текст' ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>
    
    <div class="border-l-4 border-indigo-500 pl-10 mb-4">
      <div class="custom-style-text">
        <?php echo esc_html( $fields['crb_post_important_block'] ); ?>
      </div>
    </div>

		<?php
	} );