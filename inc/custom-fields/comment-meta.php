<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'comment_meta', 'Comment Information' )
->add_fields( array(
  Field::make( 'radio', 'crb_comment_rating', 'Rating' )->set_options( array(
		'1' => 1,
		'2' => 2,
		'3' => 3,
		'4' => 4,
		'5' => 5,
	) ),
) );

