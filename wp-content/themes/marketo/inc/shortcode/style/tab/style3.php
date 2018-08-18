<?php if($show_tab): ?>
<div class="xs-content-header">
    <h2 class="xs-content-title"><?php echo esc_html($head_title); ?></h2>
    <?php  if(is_array($product_tab) && count($product_tab) > 0): ?>
        <ul class="nav nav-tabs xs-nav-tab" role="tablist">
            <?php foreach($product_tab as $key => $product_tabs): ?>
                <?php
                $active = ($key == 0) ? 'active' : '';
                $tabs_id = 'xs-tabs-'.$key;
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo esc_attr($active) ?>"  data-toggle="tab" href="#<?php echo esc_attr($tabs_id); ?>" role="tab" ><?php echo esc_html($product_tabs['product_title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="clearfix"></div>
</div>
<?php endif; ?>
<div class="tab-content">
    <?php if(is_array($product_tab) && count($product_tab) > 0): ?>
        <?php foreach($product_tab as $key => $tabs_content): ?>
            <?php
            $active = ($key == 0) ? 'show active' : '';
            $tabs_id = 'xs-tabs-'.$key;
            $args = array(
                'post_type'         => array('product'),
                'post_status'       => array('publish'),
                'posts_per_page'    => $product_count,
            );
            if($tabs_content['product_content'] == 'featured'){
                $args['tax_query'][] = array(
                    'taxonomy'         => 'product_visibility',
                    'terms'            => 'featured',
                    'field'            => 'name',
                    'operator'         => 'IN',
                    'include_children' => false,
                );
            }
            elseif($tabs_content['product_content'] == 'related'){
                $args['post__in'] 	= 	$product->get_related(100);
            }
            elseif($tabs_content['product_content'] == 'best_sell'){
                $args['meta_key']  = 'total_sales';
                $args['orderby'] = 'meta_value_num';
            }
            elseif($tabs_content['product_content'] == 'on_sell'){
                $args['meta_query'] = array(
                    array(
                        'key' => '_sale_price',
                        'value' => '',
                        'compare' => '!='
                    ),
                );
            }elseif($tabs_content['product_content'] == 'xs_product'){
                if(!empty($tabs_content['product_content']) == 'xs_product'){
                    $product_ids = implode(',',$tabs_content['product_ids']);
                    $args['post__in'] = explode(',', $product_ids);
                }
            }

            $xs_query = new WP_Query( $args );
            ?>
            <div class="tab-pane fade <?php echo esc_attr($active) ?>" id="<?php echo esc_attr( $tabs_id ); ?>" role="tabpanel">
                <div class="xs-tab-slider-6-col owl-carousel tab-slider-center">
                    <?php
                    if($xs_query->have_posts()):
                        while ($xs_query->have_posts()) :
                            $xs_query->the_post();
                            $xs_product = wc_get_product(get_the_id());
                            $img_link = xs_resize( get_post_thumbnail_id(), 158, 168 );
                            ?>
                            <div class="xs-product-category">
                                <?php if(!empty($img_link)): ?>
                                <a class="xs_product_img_link" href="<?php echo esc_url(get_the_permalink()) ?>">
                                    <img  src="<?php echo esc_url($img_link); ?>"  alt="<?php the_title_attribute(); ?>">
                                </a>
                                <?php endif; ?>
                                <h4 class="product-title"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo get_the_title(); ?></a></h4>
                                <span class="price">
                                    <?php echo marketo_return($xs_product-> get_price_html());?>
                                </span>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>