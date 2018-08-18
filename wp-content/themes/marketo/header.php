<?php
/**
 * header.php
 *
 * The header for the theme.
 */
?>
<!DOCTYPE html>
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>
    </head>
    <?php
    $header_layout = marketo_option('header_layout');
    $rtl = marketo_option('marketo_rtl');
    $class = '';
    if($rtl){
        $class = 'rtl';
    }
    get_header( $header_layout );
    ?>
    <body <?php body_class(array($class)); ?> data-spy="scroll" data-target="#header">


