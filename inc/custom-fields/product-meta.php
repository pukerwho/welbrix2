<?php

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
	function crb_post_theme_options() {
		Container::make( 'post_meta', 'Данные о продукте' )
	    ->where( 'post_type', '=', 'product' )
	    ->add_tab( __('Информация'), array(
	      Field::make( 'text', 'product_info_style', 'Стиль' ),
	      Field::make( 'text', 'product_info_typelamp', 'Тип лампы' ),
	      Field::make( 'text', 'product_info_typecokol', 'Тип цоколя' ),
	      Field::make( 'text', 'product_info_material', 'Материал' ),
	  	) )
	  	->add_tab( __('Характеристики'), array(
	      Field::make( 'text', 'product_info_mosh', 'Номинальная мощность, Вт' ),
	      Field::make( 'text', 'product_info_analoglep', 'Аналог ЛЭП, Вт' ),
	      Field::make( 'text', 'product_info_tempcolor', 'Температура цвет, К' ),
	      Field::make( 'text', 'product_info_diapazon', 'Диапазон рабочего напряжения, V' ),
	      Field::make( 'text', 'product_info_qr', 'Штрихкод' ),

	      Field::make( 'text', 'product_info_dlina', 'Длина' ),
	      Field::make( 'text', 'product_info_shirina', 'Ширина' ),
	      Field::make( 'text', 'product_info_visota', 'Высота' ),
	      Field::make( 'text', 'product_info_moshnist', 'Мощность' ),
	      Field::make( 'text', 'product_info_qty_istochnikov', 'Кол-во источников света' ),
	      Field::make( 'text', 'product_info_cct', 'CCT' ),
	      Field::make( 'text', 'product_info_pitanie', 'Питание' ),
	      Field::make( 'text', 'product_info_montag', 'Монтаж' ),
	      Field::make( 'text', 'product_info_shirina_vnutri', 'Ширина внутренняя' ),
	      Field::make( 'text', 'product_info_glubina_vrezki', 'Глубина врезки' ),
	      Field::make( 'text', 'product_info_color', 'Цвет' ),
	      Field::make( 'text', 'product_info_napriazhenie', 'Напряжение' ),
	      Field::make( 'text', 'product_info_max_nagruzka', 'Максимальная нагрузка' ),
	      Field::make( 'text', 'product_info_diametr', 'Диаметр' ),
	      Field::make( 'text', 'product_info_material_korpusa', 'Материал корпуса' ),
	      Field::make( 'text', 'product_info_svetodiod', 'Светодиоды' ),
	  ) );
	}

?>