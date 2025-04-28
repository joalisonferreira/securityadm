<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );
function themesflat_iconpicker_register( $icons = array() ) {

	$icons['finance_ion_icons'] = array(
		'name'          => 'finance_ion_icons',
		'label'         => esc_html__( 'Finance IonIcons', 'themesflat-addons' ),
		'labelIcon'     => 'ion-wand',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/ionicons.min.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR . 'assets/css/ionicons.json',
		'ver'           => '1.0.0',
	);
	return $icons;
}