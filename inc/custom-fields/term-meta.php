<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
    ->add_fields( array(
      Field::make( 'image', 'crb_city_img', 'Заглавная картинка' )->set_value_type( 'url'),
    ));
}

?>
