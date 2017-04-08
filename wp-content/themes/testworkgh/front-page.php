<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package testworkgh
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="why-us-section container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="why-us-bg col-sm-5"></div>
                        <?php dynamic_sidebar('why_us') ?>

                    </div>
                </div>
            </section>

            <section class="welcome-section container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="welcome-here-bg col-sm-5"></div>
                        <?php dynamic_sidebar('welcome') ?>

                    </div>
                </div>
            </section>
            <section class="offers-section container-fluid">
                <div class="container">
                    <div class="row">

                        <h2 class="offers-title text-center">
                            We are Offering....
                        </h2>

                        <p class="offers-description text-center">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <ul class="offers-list row">
                            <?php
                            $args = array(
                                'post_type' => 'offers',
                                'orderby'=>'post_date',
                                'posts_per_page' => 6,
                            );
                            $offersPosts = new WP_Query($args);
                            if ( $offersPosts->have_posts() ) :
                                while ($offersPosts->have_posts()) : $offersPosts->the_post();
                                    ?>

                                    <li class="col-sm-4 offers-item">
                                        <?php
                                        if (has_post_thumbnail()) { ?>
                                                <?php the_post_thumbnail('', array(
                                                    'class' => "img-responsive offers-thumbnail",
                                                    )); ?>

                                            <p class="text-left thumnbnail-caption"><?php the_content();?></p>
                                        <?php } ?>
                                    </li>
                                <?php endwhile;?>
                            <?php endif;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="portfolio-section container-fluid">
                <div class="container">
                    <div class="row">

                        <h2 class="offers-title text-center">
                            Some of latest Work...
                        </h2>

                        <p class="offers-description text-center">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>

                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
