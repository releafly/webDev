<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Cats_Products_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'xs-cats-product';
    }

    public function get_title() {
        return esc_html__( 'Marketo Product Category', 'marketo' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'marketo-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Select Categories', 'marketo'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label'     => esc_html__( 'Style', 'marketo' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'style1',
                'options'   => [
                    'style1'     => esc_html__( 'style 1', 'marketo' ),
                    'style2'     => esc_html__( 'style 2', 'marketo' ),
                ],
            ]
        );

        $this->add_control(
            'head_title',
            [
                'label' =>esc_html__('Title', 'marketo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   =>esc_html__('Title Here', 'marketo'),
            ]
        );

        $this->add_control(
            'xs_woo_cats_selector',
            [
                'label'    =>esc_html__( 'Select category', 'marketo' ),
                'type'     => Controls_Manager::SELECT2,
                'options'  => xs_category_list( 'product_cat' ),
                'default'  => '0',
                'multiple'  => 'true'
            ]
        );

        $this->add_control(
            'product_count',
            [
                'label'         => esc_html__( 'Product count', 'marketo' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '3', 'marketo' ),
                'condition'     => [
                    'style' => ['style1','style2','style3','style5','style6','style7']
                ]

            ]
        );


        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $style = $settings['style'];
        $product_tab = $settings['xs_woo_cats_selector'];
        $head_title = $settings['head_title'];
        $product_count = $settings['product_count'];

        switch ($style) {
            case 'style1':
                require MARKETO_SHORTCODE_DIR_STYLE.'/product-cat/style1.php';
                break;

            case 'style2':
                require MARKETO_SHORTCODE_DIR_STYLE.'/product-cat/style2.php';
                break;

        }
        ?>

    <?php }
    protected function _content_template() { }
}