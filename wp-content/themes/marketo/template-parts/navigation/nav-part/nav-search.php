<?php $cats = xs_category_list_slug('product_cat');
$header_layout = marketo_option('header_layout');

if($header_layout == '4'){?>

    <li>
        <div class="navSearch-group">
            <a href="#" class="navsearch-button"><i class="fa fa-search"></i></a>
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="navsearch-form">
                <input type="search" name="s" placeholder="<?php esc_attr_e('Search','marketo');?>" id="search">
            </form>
        </div>
    </li>

<?php }else{ ?>

    <form class="xs-navbar-search" action="<?php echo esc_url(home_url('/'));?>" method="get" id="header_form">
        <div class="input-group">
            <input type="search" name="s" class="form-control" placeholder="<?php esc_attr_e('Find your product','marketo');?>">
            <div class="xs-category-select-wraper">
                <i class="xs-spin"></i>
                <select class="xs-category-select" name="product_cat">
                    <option value="-1"><?php esc_html_e('All Categories','marketo');?></option>
                    <?php foreach ($cats as $cat ){ ?>
                        <option value="<?php echo esc_html($cat->term_id); ?>"><?php echo esc_html($cat->name); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group-btn">
                <input type="hidden" id="search-param" name="post_type" value="<?php esc_html_e('product','marketo');?>">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

<?php } ?>