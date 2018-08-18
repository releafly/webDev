<?php
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'theme_primary_color',
	'label'       => esc_html__( 'Theme Color', 'marketo' ),
	'section'     => 'general_section',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' 	=> '.xs-content-header.background-version, .xs-nav-tab .nav-link::before, .owl-dots .owl-dot.active span,
			.xs-map-popup.btn-warning',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-nav-tab .nav-link::after',
			'property'	=> 'border-top',
			'value_pattern'   => '8px solid top_border',
			'pattern_replace' => array(
				'top_border'    => 'theme_primary_color',
			),
		),
		array(
			'element' 	=> '.xs-deal-of-the-week',
			'property'	=> 'border',
			'value_pattern'   => '2px solid top_border',
			'pattern_replace' => array(
				'top_border'    => 'theme_primary_color',
			),
		),
		array(
			'element' 	=> '.product-feature-ribbon',
			'property'	=> 'border-right-color',
		),
		array(
			'element' 	=> '.product-feature-ribbon',
			'property'	=> 'border-top-color',
		),
		array(
			'element' 	=> '.xs-vartical-menu .cd-dropdown-trigger',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-navDown .xs-navbar-search .btn[type="submit"]',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-navbar-search .btn-primary',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-single-wishList .xs-item-count.highlight',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-navDown.navDown-v5 .xs-vartical-menu .cd-dropdown-trigger',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-navBar.navBar-v5 .xs-navbar-search .btn[type="submit"]',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-navDown.secondary-color-v .xs-vartical-menu .cd-dropdown-content',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-menus .nav-menu > li > a',
			'property'	=> 'color',
		),
		array(
			'element' 	=> '.xs-single-wishList',
			'property'	=> 'color',
		),
		array(
			'element' 	=> '.xs-menus .nav-menu > li > a .submenu-indicator-chevron',
			'property'	=> 'border-color',
		),
		array(
			'element' 	=> '.xs-navBar .navbar-border .xs-menus .nav-menu > li > a::before',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> 'a.xs-map-popup.btn.btn-primary',
			'property'	=> 'background-color',
		),
		array(
			'element' 	=> '.xs-copyright',
			'property'	=> 'background-color',
		),
	),
);
$fields[] = array(
	'type'        => 'image',
	'settings'    => 'site_logo',
	'label'       => esc_html__( 'Logo', 'marketo' ),
	'section'     => 'general_section',
);

$fields[] = array(
    'type'        => 'image',
    'settings'    => 'retina_site_logo',
    'label'       => esc_html__( 'Retina Logo', 'marketo' ),
    'section'     => 'general_section',
);

$fields[]= array(
    'type'        => 'text',
    'settings'    => 'map_api',
    'label'       => esc_html__( 'Google Map API Key', 'marketo' ),
    'section'     => 'general_section',

    'default'     =>  '',
);

$fields[] = array(

    'type'        => 'repeater',
    'label'       => esc_attr__( 'Social Control', 'marketo' ),
    'section'     => 'general_section',
    'priority'    => 10,
    'row_label' => array(
        'type' => 'text',
        'value' => esc_attr__('Social Profile', 'marketo' ),
    ),
    'settings'    => 'footer_social_links',
    'default'     => array(
        array(
            'social_text' => esc_attr__( 'Facebook', 'marketo' ),
            'social_url'  => 'https://www.facebook.com/xpeedstudio/',
            'social_icon' => 'fa fa-facebook',
        ),
    ),

    'fields' => array(
        'social_text' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Social Text', 'marketo' ),
            'description' => esc_attr__( 'This will be the label for your social link', 'marketo' ),
            'default'     => '',
        ),
        'social_url' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Social URL', 'marketo' ),
            'description' => esc_attr__( 'This will be the social URL', 'marketo' ),
            'default'     => '#',
        ),
        'social_icon' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Social Icon', 'marketo' ),
            'description' => esc_attr__( 'This will be the social Icon CSS Class', 'marketo' ),
            'default'     => 'fa fa-facebook',
        ),
    )
);