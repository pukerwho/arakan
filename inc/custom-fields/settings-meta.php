<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Штаб') )
  ->add_tab( __('SEO'), array(
    Field::make( 'html', 'crb_seo_mainpage', __( 'SEO Mainpage' ) )->set_html( sprintf( '<b>ℹ️ Main page</b>' ) ),
    Field::make( 'text', 'crb_seo_mainpage_title' . crb_get_i18n_suffix(), 'Головна сторінка - Title' ),
    Field::make( 'text', 'crb_seo_mainpage_description' . crb_get_i18n_suffix(), 'Головна сторінка - Description' ),
    
    Field::make( 'html', 'crb_seo_places', __( 'SEO Places' ) )->set_html( sprintf( '<b>ℹ️ Заклад</b>' ) ),
    Field::make( 'text', 'crb_seo_place_aftertitle' . crb_get_i18n_suffix(), 'Заклад - AfterTitle' ),
    Field::make( 'text', 'crb_seo_place_afterdescription' . crb_get_i18n_suffix(), 'Заклад - AfterDescription' ),

    Field::make( 'html', 'crb_seo_sad', __( 'SEO Sad' ) )->set_html( sprintf( '<b>ℹ️ Садочок</b>' ) ),
    Field::make( 'text', 'crb_seo_sad_aftertitle' . crb_get_i18n_suffix(), 'Садочок - AfterTitle' ),
    Field::make( 'text', 'crb_seo_sad_afterdescription' . crb_get_i18n_suffix(), 'Садочок - AfterDescription' ),
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ));
}

?>