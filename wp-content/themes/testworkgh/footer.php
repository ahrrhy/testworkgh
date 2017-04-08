<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package testworkgh
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
            <div class="row">
                <section class="clients container-fluid">
                    <div class="container">
                        <div class="row">
                            <h2 class="clients-title text-center">Featured clients</h2>
                            <?php echo do_shortcode('[wpaft_logo_slider]') ?>
                        </div>
                    </div>
                </section>

            </div>
        <div class="container">
            <div class="row">

                <section class="footer-contact-us col-sm-6">
                    <h2 class="footer-contact-us-title">
                        Contact us:
                    </h2>
                    <p class="footer-contact-us-description">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                    </p>
                    <dl>
                        <dt><i class="fa fa-phone" aria-hidden="true"></i></dt><dd><?php echo get_theme_mod('phone_number'); ?></dd>
                        <dt><i class="fa fa-map-marker" aria-hidden="true"></i></dt><dd><?php echo get_theme_mod('address'); ?></dd>
                    </dl>
                    <div class="google-maps">
                        <?php echo get_theme_mod('google_maps'); ?>
                    </div>
                </section>
                <?php dynamic_sidebar('footer-contact-us') ?>

            </div>

        </div>
        <div class="row">
            <section class="just-logo">
                <p class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_url(get_theme_mod('testworkgh-logo')); ?>" /></a></p>
            </section>
            <section class="copy-right-section">
                <p class="copy-block text-center">&copy; <?php echo date('Y'); ?> All Rights Reserved.</p>
            </section>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
