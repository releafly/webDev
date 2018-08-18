<?php
if ( !defined( 'ABSPATH' ) )
    die( 'Direct access forbidden.' );
/**
 * ------------------------------------------------------------------------------------------------
 * Add theme support for WooCommerce
 * ------------------------------------------------------------------------------------------------
 */



if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || function_exists('is_plugin_active_for_network') && is_plugin_active_for_network( 'woocommerce/woocommerce.php' ))  {

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );

    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    if(function_exists('is_product')){
        if (is_product()) {
            add_action('woocommerce_before_main_content', 'marketo_main_content_wrap_start', 25);
        }
    }
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5);

    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    add_action('marketo_wc_related_products', 'woocommerce_output_related_products', 10);

    add_action('marketo_wc_related_products', 'marketo_wc_output_related_products_wrap_start', 5);
    function marketo_wc_output_related_products_wrap_start()
    {
        echo '<section class="xs-section-padding bg-gray"><div class="container">';
    }

    add_action('marketo_wc_related_products', 'marketo_wc_output_related_products_wrap_end', 15);
    function marketo_wc_output_related_products_wrap_end()
    {
        echo '</div></section>';
    }


    add_filter('woocommerce_breadcrumb_defaults', 'marketo_wcc_change_breadcrumb_html');
    function marketo_wcc_change_breadcrumb_html($defaults)
    {
        // Change the breadcrumb delimeter from '/' to '>'
        $defaults['delimiter'] = '';
        $defaults['wrap_before'] = '<div class="xs-breadcumb"><div class="container"><nav aria-label="breadcrumb-shop"><ol class="breadcrumb-shop"> ';
        $defaults['wrap_after'] = '</ol></nav></div></div>';
        $defaults['before'] = '<li class="breadcrumb-item">';
        $defaults['after'] = '</li>';
        return $defaults;
    }


    add_action('marketo_wc_breadcrumb', 'marketo_wc_breadcrumb', 10);
    function marketo_wc_breadcrumb()
    {
        return woocommerce_breadcrumb();
    }


    add_action('marketo_wc_catalog_ordaring', 'marketo_wc_catalog_ordaring', 30);
    function marketo_wc_catalog_ordaring()
    {
        return woocommerce_catalog_ordering();
    }

    add_action('woocommerce_shop_loop_item_title', 'marketo_wc_before_shop_loop_item_title', 5);
    function marketo_wc_before_shop_loop_item_title()
    {
        echo '<div class="xs-product-content">';
    }

    add_action('woocommerce_before_shop_loop_item', 'marketo_wc_before_shop_loop_item', 5);
    function marketo_wc_before_shop_loop_item()
    {
        echo '<div class="xs-product-wraper">';
    }

    add_action('woocommerce_after_shop_loop_item', 'marketo_wc_after_shop_loop_item', 15);
    function marketo_wc_after_shop_loop_item()
    {
        echo '</div></div>';
    }

    add_filter('woocommerce_product_description_heading', function () {
        return '';
    });
    add_filter('woocommerce_product_additional_information_heading', function () {
        return '';
    });

    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
    if (!function_exists('marketo_wc_get_product_id')) {
        function marketo_wc_get_product_id($product)
        {
            if (defined('WC_VERSION') && version_compare(WC_VERSION, '2.7', '<')) {
                return isset($product->id) ? $product->id : 0;
            }

            return $product->get_id();
        }
    }

    function get_ratings_counts($product)
    {
        global $wpdb;

        $product_id = marketo_wc_get_product_id($product);
        $counts = array();
        $raw_counts = $wpdb->get_results($wpdb->prepare("
                SELECT meta_value, COUNT( * ) as meta_value_count FROM $wpdb->commentmeta
                LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
                WHERE meta_key = 'rating'
                AND comment_post_ID = %d
                AND comment_approved = '1'
                AND meta_value > 0
                GROUP BY meta_value
            ", $product_id));

        foreach ($raw_counts as $count) {
            $counts[$count->meta_value] = $count->meta_value_count;
        }

        return $counts;
    }
}