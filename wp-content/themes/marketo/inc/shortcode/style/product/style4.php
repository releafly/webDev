<?php

if($image_pos){

    $class_wraper_3 = 'version-5';
    $class_wraper = 'xs-product-wraper';
    $class_wraper_2 = 'xs-product-content';
}else{
    $class_wraper_3 = 'version-6';
    $class_wraper = 'xs-product-widget media';
    $class_wraper_2 = 'media-body align-self-center product-widget-content';
}
if ($xs_query->have_posts()):
    while ($xs_query->have_posts()) :
        $xs_query->the_post();
        $xs_product = wc_get_product(get_the_id());
        $img_link = xs_resize(get_post_thumbnail_id(), 168, 166, true);
        $terms = get_the_terms(get_the_ID(), 'product_cat');
        $cat = '';
        if ( $terms && ! is_wp_error($terms)) {
            foreach ($terms as $term) {
                $cat .= "<a href = '" . get_category_link($term->term_id) . "'>" . $term->name . "</a>  ";
            }
        }
        ?>
        <div class="<?php echo esc_attr($class_wraper_3); ?>">
            <div class="<?php echo esc_attr($class_wraper); ?>">
                <?php if(!empty($img_link)): ?>
                <a class="xs_product_img_link" href="<?php echo esc_url(get_the_permalink()) ?>">
                    <img src="<?php echo esc_url($img_link); ?>"  alt="<?php the_title_attribute(); ?>">
                </a>
                <?php endif; ?>
                <div class="<?php echo esc_attr($class_wraper_2); ?>">
                            <span class="product-categories">
                                <a href="#" rel="tag"><?php echo marketo_return($cat); ?></a>
                            </span>
                    <h4 class="product-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo get_the_title(); ?></a></h4>
                    <span class="price version-2"> <?php echo marketo_return($xs_product-> get_price_html());?></span>
                </div><!-- .xs-product-content END -->
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
