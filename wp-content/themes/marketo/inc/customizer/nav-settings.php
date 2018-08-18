<?php
$fields[]= array(
    'type'        => 'radio-image',
    'settings'    => 'header_layout',
    'label'       => esc_html__( 'Header Layout', 'marketo' ),
    'section'     => 'nav_section',
    'default'     => '1',
    'choices'     => array(
        '1'   => get_template_directory_uri() . '/assets/images/header/header_1.png',
        '2' => get_template_directory_uri() . '/assets/images/header/header_2.png',
        '3' => get_template_directory_uri() . '/assets/images/header/header_3.png',
        '4' => get_template_directory_uri() . '/assets/images/header/header_1.png',
    ),
);

$fields[] = array(
    'type'        => 'color',
    'settings'    => 'header_primary_color',
    'label'       => esc_html__( 'Header Primary Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'output'      => array(
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
    ),
);


$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'header_fullwidth',
    'label'       => esc_html__( 'Header full Width', 'marketo' ),
    'section'     => 'nav_section',
    'default'     => false,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'marketo' ),
        'off' => esc_attr__( 'Disable', 'marketo' ),
    ),
);



$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'show_promotional_card',
    'label'       => esc_html__( 'Show Promotional Card', 'marketo' ),
    'section'     => 'nav_section',
    'default'     => false,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'marketo' ),
        'off' => esc_attr__( 'Disable', 'marketo' ),
    ),
);
$fields[] = array(
    'type'        => 'color',
    'settings'    => 'promotional_card_bg_color',
    'label'       => esc_html__( 'Promotional Card Background Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'required'      => array(
        array(
            'setting'   => 'show_promotional_card',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'output'      => array(
        array(
            'element' 	=> '.xs-promotion.alert-success',
            'property'	=> 'background-color',
        ),
        array(
            'element' 	=> '.xs-promotion.alert-info',
            'property'	=> 'background-color',
        ),
    ),
);
$fields[] = array(
    'type'        => 'color',
    'settings'    => 'promotional_card_color',
    'label'       => esc_html__( 'Promotional Card Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'required'      => array(
        array(
            'setting'   => 'show_promotional_card',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'output'      => array(
        array(
            'element' 	=> '.xs-promotion p',
            'property'	=> 'color',
        ),
    ),
);

$fields[]= array(
    'type'        => 'textarea',
    'settings'    => 'promotional_text',
    'label'       => esc_html__( 'Promotional text', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'postMessage',
    'required'      => array(
        array(
            'setting'   => 'show_promotional_card',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'js_vars'     => array(
        array(
            'element'  => '.xs-promotion p',
            'function' => 'html'
        ),
    ),
    'default'     => esc_html__( 'Welcome to Emarket ! Wrap new offers / gift every single day on Weekends  New Coupon code: Happy2017', 'marketo' ),
);

$fields[] = array(
	'type'        => 'select',
	'settings'    => 'promotion_align',
	'label'       => esc_html__( 'Text alignment', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'auto',
	'required'      => array(
		array(
			'setting'   => 'show_promotional_card',
			'operator'  => '==',
			'value'     => true,
		),
	),
	'choices'     => array(
		'left' => esc_attr__( 'Left', 'marketo' ),
		'center' => esc_attr__( 'Center', 'marketo' ),
		'right' => esc_attr__( 'Right', 'marketo' ),
	),
	'output'     => array(
		array(
			'element'  => '.xs-promotion p',
			'property' => 'text-align'
		),
	),
);

$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'show_topbar',
    'label'       => esc_html__( 'Show Top Bar', 'marketo' ),
    'section'     => 'nav_section',
    'default'     => false,
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '!=',
            'value'     => '2',
        ),
    ),
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'marketo' ),
        'off' => esc_attr__( 'Disable', 'marketo' ),
    ),
);

$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'show_topbar_border',
    'label'       => esc_html__( 'Show Top Bar Border', 'marketo' ),
    'section'     => 'nav_section',
    'default'     => false,
    'required'      => array(
        array(
            'setting'   => 'show_topbar',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'marketo' ),
        'off' => esc_attr__( 'Disable', 'marketo' ),
    ),
);

$fields[] = array(
    'type'        => 'color',
    'settings'    => 'topbar_border_color',
    'label'       => esc_html__( 'Topbar Border Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'required'      => array(
        array(
            'setting'   => 'show_topbar_border',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'output'      => array(
        array(
            'element' 	=> '.xs-top-bar.v-border',
            'property'	=> 'border-color',
        ),
    ),
);
$fields[] = array(

    'type'        => 'repeater',
    'label'       => esc_attr__( 'Top bar left information', 'marketo' ),
    'section'     => 'nav_section',
    'priority'    => 10,
    'row_label' => array(
        'type' => 'text',
        'value' => esc_attr__('Top Bar Info', 'marketo' ),
    ),
    'settings'    => 'top_bar_infos',
    'default'     => array(
        array(
            'info_text' => '',
            'info_url'  => '',
            'info_icon'  => '',
        ),
    ),
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '!=',
            'value'     => '2',
        ),
        array(
            'setting'   => 'show_topbar',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'fields' => array(
        'info_text' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Top Bar Info Text', 'marketo' ),
            'default'     => '',
        ),
        'info_url' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Top Bar Info URL', 'marketo' ),
            'default'     => '#',
        ),
        'info_icon' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Top Bar Info Icon', 'marketo' ),
            'default'     => 'fa fa-facebook',
        ),
    )
);
$fields[] = array(
    'type'        => 'color',
    'settings'    => 'nav_top_color',
    'label'       => esc_html__( 'Topbar Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '!=',
            'value'     => '2',
        ),
        array(
            'setting'   => 'show_topbar',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'output'      => array(
        array(
            'element' 	=> '.xs-top-bar',
            'property'	=> 'color',
        ),
        array(
            'element' 	=> '.xs-top-bar-info li a',
            'property'	=> 'color',
        ),
        array(
            'element' 	=> '.xs-social-list li a',
            'property'	=> 'color',
        ),
    ),
);
$fields[] = array(
    'type'        => 'color',
    'settings'    => 'nav_top_bg_color',
    'label'       => esc_html__( 'Topbar Background Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '!=',
            'value'     => '2',
        ),
        array(
            'setting'   => 'show_topbar',
            'operator'  => '==',
            'value'     => true,
        ),
    ),
    'output'      => array(
        array(
            'element' 	=> '.xs-top-bar',
            'property'	=> 'background-color',
        ),
    ),
);


$fields[] = array(
	'type'        => 'color',
	'settings'    => 'menu_bg_color',
	'label'       => esc_html__( 'Menu Background Color', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' 	=> '.xs-header',
			'property'	=> 'background-color',
		),
	),
);

$fields[] = array(
	'type'        => 'color',
	'settings'    => 'menu_color',
	'label'       => esc_html__( 'Menu Color', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' 	=> '.xs-menus .nav-menu > li > a',
			'property'	=> 'color',
			'suffix'   => ' !important',
		),

		array(
			'element' 	=> '.xs-single-wishList',
			'property'	=> 'color',
			'suffix'   => ' !important',
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
			'element' 	=> '.xs-menus .nav-menu > :not(.megamenu) .nav-dropdown li a',
			'property'	=> 'color',
		),
	),
);

$fields[] = array(
	'type'        => 'color',
	'settings'    => 'menu_hover_color',
	'label'       => esc_html__( 'Menu Hover Color', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' 	=> '.xs-menus .nav-menu > li > a:hover',
			'property'	=> 'color',
		),
		array(
			'element' 	=> '.xs-menus .nav-menu > li:hover > a .submenu-indicator-chevron',
			'property'	=> 'border-color',
		),
		array(
			'element' 	=> '.xs-single-wishList:hover',
			'property'	=> 'color',
		),
	),
);
$fields[] = array(
    'type'        => 'color',
    'settings'    => 'sub_menu_color',
    'label'       => esc_html__( 'Sub Menu Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' 	=> '.xs-menus .nav-menu > :not(.megamenu) .nav-dropdown li a',
            'property'	=> 'color',
        ),
    ),
);

$fields[] = array(
    'type'        => 'color',
    'settings'    => 'sub_menu_hover_color',
    'label'       => esc_html__( 'Sub Menu Hover Color', 'marketo' ),
    'section'     => 'nav_section',
    'transport'   => 'auto',
    'output'      => array(
        array(
            'element' 	=> '.xs-menus .nav-menu > :not(.megamenu) .nav-dropdown li a:hover',
            'property'	=> 'color',
        ),
    ),
);


$fields[]= array(
	'type'        => 'switch',
	'settings'    => 'show_header_cta',
	'label'       =>esc_html__( 'Show CTA Button', 'marketo' ),
	'section'     => 'nav_section',
	'default'     => '',
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'marketo' ),
		'off' => esc_attr__( 'Disable', 'marketo' ),
	),
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '!=',
            'value'     => '2',
        ),
    ),
);

$fields[]= array(
	'type'        => 'text',
	'settings'    => 'cta_btn_title',
	'label'       =>esc_html__( 'CTA Button Title', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'postMessage',
    'js_vars'     => array(
      	array(
       		'element'  => '.marketo-icon-menu .xs-btn',
       		'function' => 'html'
      	),
    ),
	'default'     => esc_html__( 'Black Friday', 'marketo' ),
	'required'      => array( 
        array( 
            'setting'   => 'show_header_cta', // or simply without [image]
            'operator'  => '==',
            'value'     => true // and just have 'image' here
        )
    ),
);

$fields[]= array(
	'type'        => 'text',
	'settings'    => 'cta_btn_subtitle',
	'label'       =>esc_html__( 'CTA Button Sub Title', 'marketo' ),
	'section'     => 'nav_section',
	'transport'   => 'postMessage',
    'js_vars'     => array(
      	array(
       		'element'  => '.marketo-icon-menu .xs-btn',
       		'function' => 'html'
      	),
    ),
	'default'     => esc_html__( 'Get 45% Off!', 'marketo' ),
	'required'      => array(
        array(
            'setting'   => 'show_header_cta', // or simply without [image]
            'operator'  => '==',
            'value'     => true // and just have 'image' here
        )
    ),
);

$fields[]= array(
	'type'        => 'text',
	'settings'    => 'cta_btn_link',
	'label'       =>esc_html__( 'CTA Button Link', 'marketo' ),
	'section'     => 'nav_section',
    'js_vars'     => array(
      	array(
       		'element'  => '.marketo-icon-menu .xs-btn',
       		'function' => 'html'
      	),
    ),
	'default'     => esc_html__( '#', 'marketo' ),
	'required'      => array( 
        array( 
            'setting'   => 'show_header_cta',
            'operator'  => '==',
            'value'     => true
        )
    ),
);


$fields[]= array(
    'type'        => 'switch',
    'label'       =>esc_html__( 'Show Header Bottom', 'marketo' ),
    'settings'    => 'show_header_bottom',
    'section'     => 'nav_section',
    'default'     => '0',
    'required'      => array(
	    array(
		    'setting'   => 'header_layout',
		    'operator'  => '==',
		    'value'     => '1',
	    ),
    ),
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'marketo' ),
        'off' => esc_attr__( 'Disable', 'marketo' ),
    ),
);


$fields[] = array(

    'type'        => 'repeater',
    'label'       => esc_attr__( 'Categories', 'marketo' ),
    'section'     => 'nav_section',
    'priority'    => 10,
    'row_label' => array(
        'type' => 'text',
        'value' => esc_attr__('Categories', 'marketo' ),
    ),
    'settings'    => 'category_selectors',
    'default'     => array(
        array(
            'cat' => '',
            'cat_icon'  => '',
        ),
    ),
    'required'      => array(
        array(
            'setting'   => 'header_layout',
            'operator'  => '==',
            'value'     => '4',
        ),
    ),
    'fields' => array(
        'cat' => array(
            'type'        => 'select',
            'label'       => __( 'Select Category', 'marketo' ),
            'default'     => '1',
            'priority'    => 10,
            'choices'     => xs_category_list('product_cat'),
        ),
        'cat_icon' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Category Icon', 'marketo' ),
            'default'     => '',
        ),
    )
);