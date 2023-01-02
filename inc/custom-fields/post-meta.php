<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_author', 'Автор' ),
      Field::make( 'text', 'crb_post_author_instagram', 'Інстаграм автора' ),
      Field::make( 'text', 'crb_post_author_facebook', 'Фейсбук автора' ),
      Field::make( 'text', 'crb_post_title', 'Title' ),
      Field::make( 'textarea', 'crb_post_description', 'Description' ),
      Field::make( 'text', 'crb_post_keywords', 'Keywords' ),
  ) );
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

      Field::make( 'text', 'crb_cafe_parking', 'Паркинг' ),
      Field::make( 'text', 'crb_cafe_wifi', 'Wi-fi' ),
      Field::make( 'text', 'crb_cafe_banket', 'Банкет' ),
      Field::make( 'text', 'crb_cafe_onlinemenu', 'Онлайн меню' ),
      Field::make( 'text', 'crb_cafe_letnyayaploshadka', 'Летняя площадка' ),
      Field::make( 'text', 'crb_cafe_zhivayamuzika', 'Живая музыка' ),
      Field::make( 'text', 'crb_cafe_kalyan', 'Кальян' ),
      Field::make( 'text', 'crb_cafe_vipkomnati', 'VIP-комната' ),
      Field::make( 'text', 'crb_cafe_bizneslanch', 'Бизнес ланч' ),
      Field::make( 'text', 'crb_cafe_dostavka', 'Доставка' ),
      Field::make( 'text', 'crb_cafe_covidsafe', 'Антиковидные ограничения' ),
      Field::make( 'text', 'crb_cafe_detskayakomnata', 'Детская комната' ),
      Field::make( 'text', 'crb_cafe_korporativ', 'Корпоративы' ),
      Field::make( 'text', 'crb_cafe_svadba', 'Свадьбы' ),
      Field::make( 'text', 'crb_cafe_beznal', 'Безналичный расчет' ),

      // Для садочка
      Field::make( 'html', 'crb_heading_author', __( 'Template SAD' ) )->set_html( sprintf( '<b>Для садочка</b>' ) ),
      Field::make( 'text', 'crb_template_sad', 'Шаблон садочки' ),
      Field::make( 'text', 'crb_finansyvannya', 'Форма собственности' ),
      Field::make( 'text', 'crb_sad_free', 'Чи є вільні місця?' ),
      Field::make( 'text', 'crb_sad_kylinariya', 'Кулінарія' ),
      Field::make( 'text', 'crb_sad_maluvannya', 'Малювання' ),
      Field::make( 'text', 'crb_sad_music', 'Музика' ),
      Field::make( 'text', 'crb_sad_khoreogrphiya', 'Хореографія' ),
      Field::make( 'text', 'crb_sad_aktorska_maystrenist', 'Акторська майстерність' ),
      Field::make( 'text', 'crb_sad_aplication', 'Аплікація' ),
      Field::make( 'text', 'crb_sad_vokal', 'Вокал' ),
      Field::make( 'text', 'crb_sad_kazkoterapiya', 'Казкотерапія' ),
      Field::make( 'text', 'crb_sad_lego_construyuvannya', 'Лего-конструювання' ),
      Field::make( 'text', 'crb_sad_lipka', 'Ліпка' ),
      Field::make( 'text', 'crb_sad_logic', 'Логіка' ),
      Field::make( 'text', 'crb_sad_sensorica', 'Сенсорика' ),
      Field::make( 'text', 'crb_sad_gymnastick', 'Гімнастика' ),
      Field::make( 'text', 'crb_sad_dytyachiy_fitness', 'Дитячий фітнес' ),
      Field::make( 'text', 'crb_sad_tanci', 'Танці' ),
      Field::make( 'text', 'crb_sad_football', 'Футбол' ),
      Field::make( 'text', 'crb_sad_logoped', 'Логопед' ),
      Field::make( 'text', 'crb_sad_licar', 'Медичний супровід' ),
      Field::make( 'text', 'crb_sad_ohorona', 'Охорона' ),
      Field::make( 'text', 'crb_sad_doshkilna_pidgotovka', 'Підготовка до школи' ),
      Field::make( 'text', 'crb_sad_psycholog', 'Психолог' ),
      Field::make( 'text', 'crb_sad_videonaglyad', 'Відеонагляд для батьків' ),
      Field::make( 'text', 'crb_sad_okrema_territoriya', 'Окрема територія' ),
      
  ) );
}

?>