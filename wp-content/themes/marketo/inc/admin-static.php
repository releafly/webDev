<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');
/**
 * Include static files: javascript and css for backend
 */
wp_enqueue_style('xs-admin', MARKETO_CSS . '/xs_admin.css', null, MARKETO_VERSION);
wp_enqueue_style( 'themify-icons', MARKETO_CSS . '/iconfont.css', null, MARKETO_VERSION );
