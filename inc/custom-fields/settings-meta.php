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
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ));
}

?>