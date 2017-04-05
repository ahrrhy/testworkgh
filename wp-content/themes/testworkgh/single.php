<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package testworkgh
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

                // Get the video URL and put it in the $video variable
                $videoID = get_post_meta($post->ID, 'video_url', true);
                // Check if there is in fact a video URL
                if ($videoID) {
                    echo '<div class="videoContainer">';
                    // Echo the embed code via oEmbed
                    echo wp_oembed_get( $videoID );
                    echo '</div>';
                }

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
