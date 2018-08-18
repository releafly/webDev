<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Woo_Slider_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'xs-woo-slider';
    }

    public function get_title() {
        return esc_html__( 'Marketo Product Slider', 'marketo' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'marketo-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Product element', 'marketo'),
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
            'water_title',
            [
                'label' =>esc_html__('Water Text', 'marketo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   =>esc_html__('Deal Of The Day', 'marketo'),
                'condition' => [
                        'style' => 'style1',
                ]
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' =>esc_html__('Button Label', 'marketo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   =>esc_html__('VIEW COLLECTIONS', 'marketo'),
                'condition' => [
                    'style' => 'style1',
                ]
            ]
        );

        $this->add_control(
            'product_ids',
            [
                'label' => __( 'Select Product', 'marketo' ),
                'type' => Controls_Manager::SELECT2,
                'options' => marketo_wc_get_product_list(),
                'multiple' => true,
                'condition' => [
                    'style' => 'style1',
                ],
                'default' => 0,
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' =>esc_html__( 'Link', 'marketo' ),
                'type' => Controls_Manager::URL,
                'placeholder' =>esc_html__('http://your-link.com','marketo' ),
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'style' => 'style1',
                ]
            ]
        );

        $this->add_control(
            'xs_allproduct',
            [
                'label' =>esc_html__('Product Element', 'marketo'),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'xs_product' =>0,
                        'show_product_image' => esc_html__('yes','marketo'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'xs_product' => 0,
                        'show_product_image' => esc_html__('yes','marketo'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'xs_product' =>0,
                        'show_product_image' => esc_html__('yes','marketo'),
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'xs_product',
                        'label' =>esc_html__('Product Name', 'marketo'),
                        'type' => Controls_Manager::SELECT,
                        'options' => marketo_wc_get_product_list(),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'show_product_image',
                        'label'	=>	esc_html__('Show Product Image','marketo'),
                        'type'	=> Controls_Manager::SWITCHER,
                        'default' => 'yes',
                        'label_on' =>esc_html__( 'Yes', 'marketo' ),
                        'label_off' =>esc_html__( 'No', 'marketo' ),

                    ],

                    [
                        'name' => 'image',
                        'label' =>esc_html__('Image', 'marketo'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'show_product_image' => '',
                        ]
                    ],

                ],
                'condition' => [
                    'style' => 'style2',
                ],
                'title_field' => '{{{ xs_product }}}',
            ]
        );

        $this->add_control(
            'product_count',
            [
                'label'         => esc_html__( 'Product count', 'marketo' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '3', 'marketo' ),
                'condition' => [
                    'style' => 'style1',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $style = $settings['style'];
        $product_ids = $settings['product_ids'];
        $water_title = $settings['water_title'];
        $btn_label = $settings['btn_label'];
        $product_count = $settings['product_count'];
        $btn_link = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';
        $btn_target = ( $settings['btn_link']['is_external']) ? '_blank' : '_self';
        $args = array(
            'post_type'         => array('product'),
            'post_status'       => array('publish'),
        );
        switch ($style) {
            case 'style1':
                require MARKETO_SHORTCODE_DIR_STYLE.'/product-slider/style1.php';
                break;

            case 'style2':
                require MARKETO_SHORTCODE_DIR_STYLE.'/product-slider/style2.php';
                break;
        }
    }

    protected function _content_template() { }
}