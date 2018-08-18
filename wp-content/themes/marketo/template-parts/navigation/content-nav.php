<?php
/*
 * This is for nav style
 *  */


$logo = marketo_option('site_logo');
$retina_logo = marketo_option('retina_site_logo');

$retina_logo = marketo_option('retina_site_logo');
if($retina_logo == null){
    $retina_logo = marketo_get_image( 'retina_site_logo', MARKETO_IMAGES . '/logo@2x.png' );
}

if($logo == null){
    $logo = marketo_get_image( 'menu_logo', MARKETO_IMAGES . '/logo.png' );
}
$header_fullwidth = marketo_option('header_fullwidth');
if($header_fullwidth){
    $container = 'container container-fullwidth';
}else{
    $container = 'container';
}
$grid = 'col-lg-8 col-sm-6 col-md-1 col-6';
if ( !class_exists( 'WooCommerce' ) ) {
    $grid = 'col-lg-8 col-sm-1 col-md-1 col-6 xs-nav-full-width';
}

?>
<div class="xs-navBar">
    <div class="<?php echo esc_attr($container);?>">
        <div class="row">
            <div class="<?php if ( class_exists( 'WooCommerce' ) ){ echo 'col-lg-2 col-sm-12 col-md-10 col-12'; }else{echo 'col-lg-2 col-sm-11 col-md-11 col-6';}?> xs-order-1 xs-md-float">
                <div class="xs-logo-wraper">
                    <a class="xs_default_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                    <?php if(!empty($retina_logo)): ?>
                        <a class="xs_retina_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( $retina_logo ) ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="<?php echo esc_attr($grid); ?> xs-order-3 xs-menus-group xs-position-static xs-md-float">
                <nav class="xs-menus">
                    <div class="nav-header">
                        <div class="nav-toggle <?php echo (class_exists( 'WooCommerce' ) ? 'xs_woo_nav' : '') ?>"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>
                    </div>
                </nav>
            </div>
            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <div class="col-lg-2 col-sm-6 col-md-1 xs-order-2 xs-wishlist-group col-6">
                    <div class="xs-wish-list-item">
                        <?php if(class_exists( 'YITH_WCWL' )): ?>
                            <span class="xs-wish-list">
                                <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="xs-single-wishList">
                                    <span class="xs-item-count xswhishlist"><?php echo YITH_WCWL()->count_products(); ?></span>
                                    <i class="icon icon-heart"></i>
                                </a>
                            </span>
                        <?php endif; ?>
                        <div class="xs-miniCart-dropdown">
                            <?php  $xs_product_count = WC()->cart->cart_contents_count; ?>
                            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"  class ="xs-single-wishList offset-cart-menu">
                                <span class="xs-item-count highlight xscart"><?php echo esc_html($xs_product_count); ?></span>
                                <i class="icon icon-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>