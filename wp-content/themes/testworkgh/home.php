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

    <div id="primary" class="content-area container">
        <div class="row">


            <main id="main" class="site-main col-sm-8" role="main">

                <ul class="row posts-list">

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 10,
                    );
                    $commonPosts = new WP_Query($args);
                    if ( $commonPosts->have_posts() ) :
                        while ($commonPosts->have_posts()) : $commonPosts->the_post();
                            ?>

                            <li class="col-sm-6 posts-item">
                                <?php
                                if (has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail('', array(
                                        'class' => "img-responsive offers-thumbnail",
                                    )); ?>
                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                    <p class="post-excerpt"><?php the_excerpt();?></p>
                                    <p class="date text-center"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_date(); ?></p>
                                <?php } ?>
                            </li>
                        <?php endwhile;?>
                    <?php endif;
                         wp_reset_postdata();
                    ?>
                </ul>
                <div class="row text-center pagination-wrap"><?php  my_pagenavi(); ?></div>

                </ul>

            </main><!-- #main -->

            <?php get_sidebar(); ?>

        </div>
    </div><!-- #primary -->

<?php

get_footer();
