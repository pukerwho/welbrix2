<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_product_cat_options' );
function crb_product_cat_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', '=', 'product_cat' ) // only show our new field for categories
    ->add_tab('Основное', array(
      Field::make( 'rich_text', 'crb_product_cat_content', 'Текст' ),
    ))
    ->add_tab('FAQ', array(
      Field::make( 'complex', 'crb_product_cat_faq', 'FAQ' )->add_fields( array(
          Field::make( 'text', 'crb_product_cat_faq_question', 'Вопрос' ),
          Field::make( 'textarea', 'crb_product_cat_faq_answer', 'Ответ' ),
      )),
    ));
}

?>