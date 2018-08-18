<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );
/**
 * Enqueue all theme scripts and styles
 *

  /** --------------------------------------
 * ** REGISTERING THEME ASSETS
 * ** ------------------------------------ */
/**
 * Enqueue styles.
 */
if ( !is_admin() ) {
    wp_enqueue_style( 'marketo-fonts', marketo_google_fonts_url(), null, MARKETO_VERSION );
    $rtl = marketo_option('marketo_rtl');
    if($rtl){
        wp_enqueue_style( 'bootstrap-rtl', MARKETO_CSS . '/bootstrap.min.rtl.css', null, MARKETO_VERSION );
    }else{
        wp_enqueue_style( 'bootstrap', MARKETO_CSS . '/bootstrap.min.css', null, MARKETO_VERSION );
    }
	wp_enqueue_style( 'marketo-xs-main', MARKETO_CSS . '/xs_main.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'marketo-custom-blog', MARKETO_CSS . '/blog-style.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'iconfont', MARKETO_CSS . '/iconfont.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'isotope', MARKETO_CSS . '/isotope.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'magnific-popup', MARKETO_CSS . '/magnific-popup.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'animate', MARKETO_CSS . '/animate.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'font-awesome', MARKETO_CSS . '/font-awesome.min.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'owl-carousel', MARKETO_CSS . '/owl.carousel.min.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'owl-theme-default', MARKETO_CSS . '/owl.theme.default.min.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'vertical-menu', MARKETO_CSS . '/vertical-menu.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'navigation', MARKETO_CSS . '/navigation.min.css', null, MARKETO_VERSION );

	wp_enqueue_style( 'marketo-style', MARKETO_CSS . '/style.css', null, MARKETO_VERSION );
    if($rtl){
        wp_enqueue_style( 'marketo-rtl', MARKETO_CSS . '/rtl.css',null, MARKETO_VERSION );
    }
    wp_enqueue_style( 'marketo-custom', MARKETO_CSS . '/custom.css', null, MARKETO_VERSION );
	wp_enqueue_style( 'marketo-responsive', MARKETO_CSS . '/responsive.css', null, MARKETO_VERSION );
    wp_enqueue_style( 'jquery-dropdown', MARKETO_CSS . '/jquery.dropdown.css', null, MARKETO_VERSION );
}



/**
 * Enqueue scripts.
 */
if ( !is_admin() ) {
    $map_api_code	 = marketo_option('map_api', marketo_defaults('map_api'));
    $api_key		 = ($map_api_code != '') ? '?key=' . $map_api_code : '';
    wp_enqueue_script( 'mock', MARKETO_SCRIPTS . '/mock.js', array( 'jquery' ), MARKETO_VERSION, true );

	wp_enqueue_script( 'navigation', MARKETO_SCRIPTS . '/navigation.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'wow', MARKETO_SCRIPTS . '/wow.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'modernizr', MARKETO_SCRIPTS . '/modernizr.js', array( 'jquery' ), MARKETO_VERSION, true );

	//Bootstrap Main JS
	wp_enqueue_script( 'Popper', MARKETO_SCRIPTS . '/Popper.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'bootstrap', MARKETO_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), MARKETO_VERSION, true );
    if(!empty($api_key)){
        wp_enqueue_script( 'map-googleapis', 'https://maps.googleapis.com/maps/api/js' . $api_key, array( 'jquery' ), '', TRUE );
    }

	wp_enqueue_script( 'isotope-pkgd', MARKETO_SCRIPTS . '/isotope.pkgd.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'magnific-popup', MARKETO_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'owl-carousel', MARKETO_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'jquery-menu-aim', MARKETO_SCRIPTS . '/jquery.menu-aim.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'vertical-menu', MARKETO_SCRIPTS . '/vertical-menu.js', array( 'jquery' ), MARKETO_VERSION, true );
    wp_enqueue_script( 'dropdown', MARKETO_SCRIPTS . '/jquery.dropdown.js', array( 'jquery' ), MARKETO_VERSION, true );

	wp_enqueue_script( 'echo', MARKETO_SCRIPTS . '/echo.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'ajaxchimp', MARKETO_SCRIPTS . '/jquery.ajaxchimp.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'countdown', MARKETO_SCRIPTS . '/jquery.countdown.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'waypoints', MARKETO_SCRIPTS . '/jquery.waypoints.min.js', array( 'jquery' ), MARKETO_VERSION, true );
	wp_enqueue_script( 'spectragram', MARKETO_SCRIPTS . '/spectragram.min.js', array( 'jquery' ), MARKETO_VERSION, true );
    wp_enqueue_script( 'marketo-searchable', MARKETO_SCRIPTS . '/searchable.js', array( 'jquery' ), MARKETO_VERSION, true );
    wp_enqueue_script('marketo-tweetie', MARKETO_SCRIPTS . '/tweetie.js',  array( 'jquery' ), '', true );
	wp_enqueue_script( 'marketo-main', MARKETO_SCRIPTS . '/main.js', array( 'jquery' ), MARKETO_VERSION, true );
    wp_enqueue_script( 'marketo-setting', MARKETO_SCRIPTS . '/ajax-script.js', array('jquery'), '',TRUE );

    /*Ajax Call*/
    $params = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'marketpess_nonce' => wp_create_nonce('xs_nonce'),
    );
    wp_localize_script('marketo-setting', 'xs_ajax_obj', $params);

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


