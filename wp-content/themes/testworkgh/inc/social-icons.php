<?php

    function testworkgh_social_array() {

        $social_sites = array(
            'twitter'       => 'testworkgh_twitter_profile',
            'facebook'      => 'testworkgh_facebook_profile',
            'google-plus'   => 'testworkgh_googleplus_profile',
            'pinterest'     => 'testworkgh_pinterest_profile',
            'linkedin'      => 'testworkgh_linkedin_profile',
            'youtube'       => 'testworkgh_youtube_profile',
            'vimeo'         => 'testworkgh_vimeo_profile',
            'tumblr'        => 'testworkgh_tumblr_profile',
            'instagram'     => 'testworkgh_instagram_profile',
            'flickr'        => 'testworkgh_flickr_profile',
            'dribbble'      => 'testworkgh_dribbble_profile',
            'rss'           => 'testworkgh_rss_profile',
            'reddit'        => 'testworkgh_reddit_profile',
            'soundcloud'    => 'testworkgh_soundcloud_profile',
            'spotify'       => 'testworkgh_spotify_profile',
            'vine'          => 'testworkgh_vine_profile',
            'yahoo'         => 'testworkgh_yahoo_profile',
            'behance'       => 'testworkgh_behance_profile',
            'codepen'       => 'testworkgh_codepen_profile',
            'delicious'     => 'testworkgh_delicious_profile',
            'stumbleupon'   => 'testworkgh_stumbleupon_profile',
            'deviantart'    => 'testworkgh_deviantart_profile',
            'digg'          => 'testworkgh_digg_profile',
            'github'        => 'testworkgh_github_profile',
            'hacker-news'   => 'testworkgh_hacker-news_profile',
            'steam'         => 'testworkgh_steam_profile',
            'vk'            => 'testworkgh_vk_profile',
            'weibo'         => 'testworkgh_weibo_profile',
            'tencent-weibo' => 'testworkgh_tencent_weibo_profile',
            '500px'         => 'testworkgh_500px_profile',
            'foursquare'    => 'testworkgh_foursquare_profile',
            'slack'         => 'testworkgh_slack_profile',
            'slideshare'    => 'testworkgh_slideshare_profile',
            'qq'            => 'testworkgh_qq_profile',
            'whatsapp'      => 'testworkgh_whatsapp_profile',
            'skype'         => 'testworkgh_skype_profile',
            'wechat'        => 'testworkgh_wechat_profile',
            'xing'          => 'testworkgh_xing_profile',
            'paypal'        => 'testworkgh_paypal_profile',
            'email-form'    => 'testworkgh_email_form_profile'
        );

        return apply_filters( 'testworkgh_social_array_filter', $social_sites );
    }


function my_social_icons_customizer_sections( $wp_customize ) {

    $social_sites = testworkgh_social_array();

    // set a priority used to order the social sites
    $priority = 5;

    // section
    $wp_customize->add_section( 'testworkgh_social_media_icons', array(
        'title'       => __( 'Social Media Icons', 'tribes' ),
        'priority'    => 25,
        'description' => __( 'Add the URL for each of your social profiles.', 'tribes' )
    ) );

    // create a setting and control for each social site
    foreach ( $social_sites as $social_site => $value ) {

        $label = ucfirst( $social_site );

        if ( $social_site == 'google-plus' ) {
            $label = 'Google Plus';
        } elseif ( $social_site == 'rss' ) {
            $label = 'RSS';
        } elseif ( $social_site == 'soundcloud' ) {
            $label = 'SoundCloud';
        } elseif ( $social_site == 'slideshare' ) {
            $label = 'SlideShare';
        } elseif ( $social_site == 'codepen' ) {
            $label = 'CodePen';
        } elseif ( $social_site == 'stumbleupon' ) {
            $label = 'StumbleUpon';
        } elseif ( $social_site == 'deviantart' ) {
            $label = 'DeviantArt';
        } elseif ( $social_site == 'hacker-news' ) {
            $label = 'Hacker News';
        } elseif ( $social_site == 'whatsapp' ) {
            $label = 'WhatsApp';
        } elseif ( $social_site == 'qq' ) {
            $label = 'QQ';
        } elseif ( $social_site == 'vk' ) {
            $label = 'VK';
        } elseif ( $social_site == 'wechat' ) {
            $label = 'WeChat';
        } elseif ( $social_site == 'tencent-weibo' ) {
            $label = 'Tencent Weibo';
        } elseif ( $social_site == 'paypal' ) {
            $label = 'PayPal';
        } elseif ( $social_site == 'email-form' ) {
            $label = 'Contact Form';
        }
        // setting
        $wp_customize->add_setting( $social_site, array(
            'sanitize_callback' => 'esc_url_raw'
        ) );
        // control
        $wp_customize->add_control( $social_site, array(
            'type'     => 'url',
            'label'    => $label,
            'section'  => 'testworkgh_social_media_icons',
            'priority' => $priority
        ) );
        // increment the priority for next site
        $priority = $priority + 5;
    }
}
add_action( 'customize_register', 'my_social_icons_customizer_sections' );

function my_social_icons_output() {

    $social_sites = testworkgh_social_array();

    foreach ( $social_sites as $social_site => $profile ) {

        if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[ $social_site ] = $social_site;
        }
    }

    if ( ! empty( $active_sites ) ) {

        echo '<ul class="social-media-icons">';
        foreach ( $active_sites as $key => $active_site ) {
            $class = 'fa fa-' . $active_site; ?>
            <li>
                <a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
                    <i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
                </a>
            </li>
        <?php }
        echo "</ul>";
    }
}