<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$google_client_id = xs_get_option('google_client_id', 'google');
$google_secret = xs_get_option('google_secret', 'google');

$app_id = xs_get_option('app_id', 'facebook');
$app_secret = xs_get_option('app_secret', 'facebook');
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="row customer-info-forms" id="customer_login">

    <div class="col-md-6">

        <?php endif; ?>
        <div class="xs-customer-form-wraper">
            <h3><?php esc_html_e( 'Log in your account', 'marketo' ); ?></h3>

            <form class="xs-customer-form" method="post">

                <?php do_action( 'woocommerce_login_form_start' ); ?>
                <div class="input-group">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username"  placeholder="<?php esc_attr_e('Username or Email Address','marketo') ?>" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>
                <div class="input-group">
                    <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password"  placeholder="<?php esc_attr_e('password','marketo')?>";/>
                </div>
                <?php do_action( 'woocommerce_login_form' ); ?>

                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'marketo' ); ?></span>
                </label>

                <button type="submit" class="btn btn-primary btn-block" name="login" value="<?php esc_attr_e( 'Login', 'marketo' ); ?>"><?php esc_html_e( 'Login', 'marketo' ); ?></button>
                <p class="woocommerce-LostPassword lost_password">
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'marketo' ); ?></a>
                </p>

                <?php if ( class_exists('Wp_Social')): ?>
                    <div class="social-login-btn">
                        <?php if(!empty($google_secret) && !empty($google_client_id)): ?>
                            <a href="<?php echo add_query_arg('social_auth', 'google', wc_get_page_permalink('myaccount')); ?>" class="btn btn-danger btn-block" ><?php esc_html_e( 'Login with your google+', 'marketo' ); ?></a>
                        <?php endif; ?>
                        <?php if(!empty($app_secret) && !empty($app_id)): ?>
                            <a href="<?php echo add_query_arg('social_auth', 'facebook', wc_get_page_permalink('myaccount')); ?>" class="btn btn-info btn-block" ><?php esc_html_e( 'Login with your facebook', 'marketo' ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif ?>

                <?php do_action( 'woocommerce_login_form_end' ); ?>

            </form>

            <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
        </div>
    </div>
    <p class="form-separetor">or</p>
    <div class="col-md-6">
        <div class="xs-customer-form-wraper">

            <h3><?php esc_html_e( 'Become an author', 'marketo' ); ?></h3>

            <form method="post" class="xs-customer-form register">

                <?php do_action( 'woocommerce_register_form_start' ); ?>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                <div class="input-group">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" placeholder="<?php esc_attr_e('Username','marketo')?>" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>
                <?php endif; ?>
                <div class="input-group">
                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" placeholder="<?php esc_attr_e('Email Address','marketo')?>"id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </div>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <div class="input-group">
                        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" placeholder="<?php esc_attr_e('Password','marketo')?>" id="reg_password" />
                    </div>
                <?php endif; ?>

                <?php do_action( 'woocommerce_register_form' ); ?>
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="btn btn-primary btn-block" name="register" value="<?php esc_attr_e( 'Register', 'marketo' ); ?>"><?php esc_html_e( 'Register', 'marketo' ); ?></button>

                <?php do_action( 'woocommerce_register_form_end' ); ?>

            </form>
        </div>
    </div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
