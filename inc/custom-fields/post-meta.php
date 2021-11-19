<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'places' )
    ->add_fields( array(
      Field::make( 'text', 'crb_place_url', 'Url сайта' ),
      Field::make( 'text', 'crb_place_address', 'Адрес' ),
      Field::make( 'text', 'crb_place_email', 'Email' ),
      Field::make( 'text', 'crb_place_phones', 'Телефоны' ),
      Field::make( 'text', 'crb_place_rating', 'Рейтинг места' ),
      Field::make( 'text', 'crb_place_reviews_count', 'Кол-во отзывов' ),
      Field::make( 'text', 'crb_place_views_count', 'Кол-во просмотров' ),
      Field::make( 'text', 'crb_place_price', 'Средний чек' ),
      
      Field::make( 'text', 'crb_place_domain_status', 'Статус домена' ),
      Field::make( 'text', 'crb_place_domain_year_start', 'Год регистрации' ),
      Field::make( 'text', 'crb_place_domain_year_end', 'Домен заканчивается' ),
      Field::make( 'text', 'crb_place_domain_age', 'Возраст домена' ),
      Field::make( 'text', 'crb_place_domain_register', 'Регистратор домена' ),
      Field::make( 'text', 'crb_place_domain_linkpad', 'Linkpad' ),
      Field::make( 'text', 'crb_place_domain_title', 'Title' ),
      Field::make( 'text', 'crb_place_domain_description', 'Description' ),
      Field::make( 'text', 'crb_place_domain_h1', 'Заголовок H1' ),
      Field::make( 'text', 'crb_place_domain_lang', 'Язык' ),
  ) );
}

?>