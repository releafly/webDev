<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>
<ul class="xs-miniCart-menu woocommerce<?php echo esc_attr( $args['list_class'] ); ?>">
<?php if ( ! WC()->cart->is_empty() ) : ?>

        <?php
        do_action( 'woocommerce_before_mini_cart_contents' );

        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
                <li class="woocommerce-mini-cart-item mini_cart_item media <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">


                    <?php if ( ! $_product->is_visible() ) : ?>
                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url( $product_permalink ); ?>" class="d-flex mini-product-thumb xs-cart-img">
                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="media-body">
                        <h4 class="mini-cart-title"><?php echo wp_kses_post($product_name); ?></h4>
                        <?php
                        //3.3.0
                        if ( WC()->version < '3.3.0' ) {
                            echo WC()->cart->get_item_data( $cart_item );
                        }else{
                            echo wc_get_formatted_cart_item_data( $cart_item );
                        }
                        ?>
                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                    </div>
                    <?php
                    //3.3.0
                    if ( WC()->version < '3.3.0' ) {
                        $cart_remove_url = WC()->cart->get_remove_url( $cart_item_key );
                    }else{
                        $cart_remove_url = wc_get_cart_remove_url( $cart_item_key );
                    }
                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                        '<a href="%s" class="btn-cancel pull-right remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                        esc_url( $cart_remove_url ),
                        esc_html__( 'Remove this item', 'marketo' ),
                        esc_attr( $product_id ),
                        esc_attr( $cart_item_key ),
                        esc_attr( $_product->get_sku() )
                    ), $cart_item_key );
                    ?>

                </li>
                <?php
            }
        }

        do_action( 'woocommerce_mini_cart_contents' );
        ?>
        <li class="mini-cart-btn">
            <p class="woocommerce-mini-cart__total total"><strong><?php echo esc_html__( 'Subtotal', 'marketo' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
        </li>
        <li>
            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
        </li>
        <li>
            <p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>
        </li>
</ul>
<?php else : ?>
        <div class="xs-empty-content">
            <p class="woocommerce-mini-cart__empty-message empty"><?php echo esc_html__( 'No products in the cart.', 'marketo' ); ?></p>
            <p class="empty-cart-icon">
                <i class="icon icon-shopping-cart"></i>
            </p>
            <p class="xs-btn-wraper justify-content-center">
                <a class="btn btn-primary" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                    <?php echo esc_html__( 'Return To Shop', 'marketo' ) ?>
                </a>
            </p>
        </div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>


