<?php

// Initializing online demo contents
function _filter_marketo_fw_ext_backups_demos( $demos ) {
	$demo_content_installer	 = esc_url( 'https://wp.xpeedstudio.com/demo-content/marketo' );
	$demos_array			 = array(
		'demo1'			 => array(
			'title'			 => esc_html__( 'Demo1', 'marketo' ),
			'screenshot'	 => esc_url( $demo_content_installer ) . '/demo1/demo1.jpg',
			'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
		),
        'demo2'			 => array(
            'title'			 => esc_html__( 'Demo2', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo2/demo2.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo3'			 => array(
            'title'			 => esc_html__( 'Demo3', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo3/demo3.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo4'			 => array(
            'title'			 => esc_html__( 'Demo4', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo4/demo4.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo5'			 => array(
            'title'			 => esc_html__( 'Demo5', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo5/demo5.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo6'			 => array(
            'title'			 => esc_html__( 'Demo6', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo6/demo6.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo7'			 => array(
            'title'			 => esc_html__( 'Demo7', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo7/demo7.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo8'			 => array(
            'title'			 => esc_html__( 'Demo8', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo8/demo8.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'demo9'			 => array(
            'title'			 => esc_html__( 'Demo9', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo9/demo9.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'rtl'			 => array(
            'title'			 => esc_html__( 'Rtl', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/rtl/rtl.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),
        'vendor'			 => array(
            'title'			 => esc_html__( 'Multi Vendor', 'marketo' ),
            'screenshot'	 => esc_url( $demo_content_installer ) . '/demo1/demo1.jpg',
            'preview_link'	 => esc_url( 'http://themeforest.net/user/xpeedstudio/portfolio' ),
        ),

		
	);
	$download_url			 = esc_url( $demo_content_installer ) . '/manifest.php';
	foreach ( $demos_array as $id => $data ) {
		$demo						 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ]	 = $demo;
		unset( $demo );
	}
	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', '_filter_marketo_fw_ext_backups_demos' );

