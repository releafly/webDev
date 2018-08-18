<form action="#" method="POST" class="xs-newsletter newsLetter-v3" data-link="<?php echo wp_kses_post($link); ?>">
    <label for="xs-newsletter-email"></label>
    <input type="email" name="email" id="xs-newsletter-email" placeholder="<?php esc_attr_e('Enter Email', 'marketo'); ?>">
    <input type="submit" class = "xs-mailchimp-btn" value="submit">
</form><!-- .xs-newsletter END-->
