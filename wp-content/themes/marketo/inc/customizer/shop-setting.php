<?php
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'shop_sidebar',
    'label'       => esc_html__( 'Shop Sidebar Position', 'marketo' ),
    'section'     => 'shop_section',
    'default'     => '1',
    'choices'     => array(
        '1'      => esc_html__('Full Width','marketo'),
        '2'      => esc_html__('Left Sidebar','marketo'),
        '3'      => esc_html__('Right Sidebar','marketo'),
    ),
);
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'shop_grid_column',
    'label'       => esc_html__( 'Grid Per Row', 'marketo' ),
    'section'     => 'shop_section',
    'default'     => '4',
    'choices'     => array(
        '6'     => esc_html__( '2 Column', 'marketo' ),
        '4'     => esc_html__( '3 Column', 'marketo' ),
    ),
    'required'      => array(
        array(
            'setting'   => 'shop_sidebar',
            'operator'  => '==',
            'value'     => 1
        )
    ),
);
