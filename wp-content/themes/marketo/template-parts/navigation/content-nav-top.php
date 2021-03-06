<?php
$top_class		 = $menu_bg_color	 = '';

$top_bar_infos = marketo_option('top_bar_infos');
$header_social_links = marketo_option('footer_social_links');
$header_fullwidth = marketo_option('header_fullwidth');
if($header_fullwidth){
    $container = 'container container-fullwidth';
}else{
    $container = 'container';
}
$show_topbar_border = marketo_option('show_topbar_border');
if($show_topbar_border){
    $border_class = "v-border";
}else{
    $border_class = "";
}
?>

<div class="xs-top-bar <?php echo esc_attr($border_class);?> d-none d-md-none d-lg-block">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <?php if($top_bar_infos[0]['info_text'] != ''){ ?>
                        <div class="col-lg-6">
                            <ul class="xs-top-bar-info">
                                <?php foreach ($top_bar_infos as $top_bar_info){ ?>
                                <li>
                                    <a href="<?php echo esc_url($top_bar_info['info_url']);?>">
                                        <?php if($top_bar_info['info_icon'] != ""){ ?>
                                            <i class="<?php echo esc_attr($top_bar_info['info_icon']);?>"></i>
                                        <?php } ?>
                                        <?php echo esc_html($top_bar_info['info_text']);?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php
                    if($header_social_links) { ?>
                        <div class="col-lg-6">
                            <ul class="xs-social-list">
                                <li class="xs-list-text"><?php echo esc_html__('Follow Us','marketo');?></li>
                                <?php
                                foreach($header_social_links as $social){
                                    $icon = (isset($social['social_icon']) ? $social['social_icon'] : '');
                                    ?><li><a href="<?php echo esc_url($social['social_url']); ?>"><i class="<?php echo esc_attr($icon); ?>"></i></a></li><?php
                                }
                                ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="xs-top-bar-info right-content">
                    <?php if ( is_user_logged_in() ) : ?>
                        <li><a href="<?php echo  marketo_get_account_link(); ?>"><?php echo esc_html__('My account', 'marketo'); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html__('Login', 'marketo'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>