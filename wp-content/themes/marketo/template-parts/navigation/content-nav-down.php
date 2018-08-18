<?php
$show_header_cta = marketo_option('show_header_cta', marketo_defaults('show_header_cta'));
$cta_btn_title = marketo_option('cta_btn_title', marketo_defaults('cta_btn_title'));
$cta_btn_subtitle = marketo_option('cta_btn_subtitle', marketo_defaults('cta_btn_subtitle'));
$cta_btn_link = marketo_option('cta_btn_link', marketo_defaults('cta_btn_link'));
$header_layout = marketo_option('header_layout');
$header_fullwidth = marketo_option('header_fullwidth');
if($header_fullwidth){
    $container = 'container container-fullwidth';
}else{
    $container = 'container';
}
?>
<div class="xs-navDown">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
            <div class="col-lg-3 d-none d-md-none d-lg-block">
                <div class="cd-dropdown-wrapper xs-vartical-menu">
                    <a class="cd-dropdown-trigger" href="#0">
                        <i class="fa fa-list-ul"></i> <?php esc_html_e('All Categories','marketo')?>
                    </a>
                    <nav class="cd-dropdown">
                        <h2><?php esc_html_e('Marketo','marketo')?></h2>
                        <a href="#0" class="cd-close"><?php esc_html_e('Close','marketo')?></a>
                        <?php get_template_part( 'template-parts/navigation/nav-part/vertical', 'nav' ); ?>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6">
                <?php get_template_part( 'template-parts/navigation/nav-part/nav', 'search' ); ?>
            </div>
            <?php if($show_header_cta): ?>
                <div class="col-lg-3 col-lg-3 d-none d-md-none d-lg-block">
                    <a href="<?php echo esc_url($cta_btn_link) ?>" class="btn btn-outline-primary btn-lg">
                        <strong><?php echo esc_html($cta_btn_title) ?></strong>
                        <?php echo esc_html($cta_btn_subtitle) ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>