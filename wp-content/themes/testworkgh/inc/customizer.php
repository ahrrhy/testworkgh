<?php
/**
 * testworkgh Theme Customizer
 *
 * @package testworkgh
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function testworkgh_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'testworkgh_customize_register' );

function testworkgh_custom_header_settings ($wp_customize){
    /**
     * Adding custom Logo
     */
    $wp_customize->add_section('testworkgh_custom_header_settings_section', array(
        'title' => 'Header Settings'
    ));
    $wp_customize->add_setting('testworkgh-logo');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'testworkgh-logo-control', array(
        'label' => 'Logo',
        'section' => 'testworkgh_custom_header_settings_section',
        'settings' => 'testworkgh-logo',
        'width' => 129,
        'height' => 63
    )));
    $wp_customize->add_setting('testworkgh-header-background');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'testworkgh-header-background-control', array(
        'label' => 'Background',
        'section' => 'testworkgh_custom_header_settings_section',
        'settings' => 'testworkgh-header-background',
        'width' => '',
        'height' => ''
    )));

    //link color
    $wp_customize->add_setting('testworkgh_link_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_link_color_control', array(
        'label' => __('Link Color', 'testworkgh'),
        'section' => 'testworkgh_custom_header_settings_section',
        'settings' => 'testworkgh_link_color',
    ) ) );

    //header background color color
    $wp_customize->add_setting('testworkgh_header_background_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_header_background_color', array(
        'label' => __('Header Background Color', 'testworkgh'),
        'section' => 'testworkgh_custom_header_settings_section',
        'settings' => 'testworkgh_header_background_color',
    ) ) );

    //border color
    $wp_customize->add_setting('testworkgh_border_color', array(
        'default' => '#d90c00',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_border_color_control', array(
        'label' => __('Border and Hover Color', 'testworkgh'),
        'section' => 'testworkgh_custom_header_settings_section',
        'settings' => 'testworkgh_border_color',
    ) ) );
}
add_action( 'customize_register', 'testworkgh_custom_header_settings' );


/**
 * Control Why Us Content
 */
function testworkgh_why_us_settings ($wp_customize){
    $wp_customize->add_section('testworkgh_why_us_settings_section', array(
        'title' => 'Why Us Content Settings'
    ));
    //why us background color
    $wp_customize->add_setting('testworkgh_why_us_background_color', array(
        'default' => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_why_us_background_color', array(
        'label' => __('Why Us Background Color', 'testworkgh'),
        'section' => 'testworkgh_why_us_settings_section',
        'settings' => 'testworkgh_why_us_background_color',
    ) ) );
    //why us background img
    $wp_customize->add_setting('why-us-bg-img');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'why-us-bg-img-control', array(
        'label' => 'Why Us Background',
        'section' => 'testworkgh_why_us_settings_section',
        'settings' => 'why-us-bg-img',
        'width' => 450,
        'height' => 530
    )));

}
add_action( 'customize_register', 'testworkgh_why_us_settings' );

/**
 * Control Welcome Content
 */
function testworkgh_welcome_settings ($wp_customize){
    $wp_customize->add_section('testworkgh_welcome_settings_section', array(
        'title' => 'Welcome Content Settings'
    ));
    //why us background color
    $wp_customize->add_setting('testworkgh_welcome_background_color', array(
        'default' => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_welcome_background_color', array(
        'label' => __('Welcome Background Color', 'testworkgh'),
        'section' => 'testworkgh_welcome_settings_section',
        'settings' => 'testworkgh_welcome_background_color',
    ) ) );
    //why us background img
    $wp_customize->add_setting('welcome-bg-img');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'welcome-img-control', array(
        'label' => 'Welcome Background',
        'section' => 'testworkgh_welcome_settings_section',
        'settings' => 'welcome-bg-img',
        'width' => 450,
        'height' => 560
    )));

}
add_action( 'customize_register', 'testworkgh_welcome_settings' );


function testworkgh_offers_settings ($wp_customize){
    $wp_customize->add_section('testworkgh_offers_settings_section', array(
        'title' => 'Offers Content Settings'
    ));
    //offers background color
    $wp_customize->add_setting('testworkgh_offers_background_color', array(
        'default' => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'testworkgh_offers_background_color', array(
        'label' => __('Offers Background Color', 'testworkgh'),
        'section' => 'testworkgh_offers_settings_section',
        'settings' => 'testworkgh_offers_background_color',
    ) ) );
}
add_action( 'customize_register', 'testworkgh_offers_settings' );


function footer_sections( $wp_customize ){

    // section
    $wp_customize->add_section('footer_customize', array(
        'title' => __('Footer Info'),
        'description' => __('Add the contact info'),
    ));
    //footer bg
    $wp_customize->add_setting('footer-bg-img');

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'footer-bg-img-control', array(
        'label' => 'Footer Background',
        'section' => 'footer_customize',
        'settings' => 'footer-bg-img',
        'width' => 1600,
        'height' => 910
    )));

    // setting
    $wp_customize->add_setting( 'address', array(
        'default' => 'Example Address'));
    // control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'address', array(
        'label'    => 'Address',
        'section'  => 'footer_customize',
        'settings' => 'address',
        'type' => 'text'
    )));
    // setting
    $wp_customize->add_setting( 'phone_number', array(
        'default' => 'Example Phone'));
    // control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'phone_number', array(
        'label'    => 'Phone',
        'section'  => 'footer_customize',
        'settings' => 'phone_number',
        'type' => 'text'
    )));
    // setting
    $wp_customize->add_setting( 'google_maps', array(
        'default' => 'Google Maps '));
    // control
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'google_maps', array(
        'label'    => 'Google Maps',
        'section'  => 'footer_customize',
        'settings' => 'google_maps',
        'type' => 'text'
    )));
}
add_action( 'customize_register', 'footer_sections' );


/**
 *  Adding controls to html
 */
function testworkgh_customize_css() { ?>

    <style type="text/css">
        .site-header, .just-logo{
            background: <?php echo get_theme_mod('testworkgh_header_background_color'); ?>
        }

        .why-us-section, .clients, .copy-right-section{
            background: <?php echo get_theme_mod('testworkgh_why_us_background_color'); ?>;
        }
        .why-us-bg{
            background:  url("<?php echo wp_get_attachment_url(get_theme_mod('why-us-bg-img')); ?>") 0 0/cover no-repeat;
        }

        .welcome-section{
            background: <?php echo get_theme_mod('testworkgh_welcome_background_color'); ?>;
        }
        .welcome-here-bg{
            background:  url("<?php echo wp_get_attachment_url(get_theme_mod('welcome-bg-img')); ?>") 0 0/cover no-repeat;
        }

        .offers-section{
            background: <?php echo get_theme_mod('testworkgh_offers_background_color'); ?>;
        }

        .site-footer{
            background:  url("<?php echo wp_get_attachment_url(get_theme_mod('footer-bg-img')); ?>") center/cover no-repeat;
        }
    </style>

<?php }

add_action('wp_head', 'testworkgh_customize_css');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function testworkgh_customize_preview_js() {
	wp_enqueue_script( 'testworkgh_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'testworkgh_customize_preview_js' );
