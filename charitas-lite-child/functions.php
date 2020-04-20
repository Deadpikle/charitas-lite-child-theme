<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'charitaslite-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'charitaslite-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script('my-base', get_stylesheet_directory_uri() . '/js/base.js', array ( 'jquery' ), 1.0, false);
}
// .. for some reason this needs to be separate with a higher # to run after the base theme thing so we can properly remove the base theme js
// https://stackoverflow.com/a/29193637/3938401
function wpdocs_dequeue_script() {
    wp_dequeue_script( 'base' );
    wp_deregister_script('base');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_script', 100 );

//
function charitas_child_customize_register($wp_customize) 
{
    // slider button 1 title
    $wp_customize->add_setting(
        'wplook_slide1_button_title', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'    		=> 'Learn More'
        )
    );
    $wp_customize->add_control( 'wplook_slide1_button_title', array(
            'label' 		=> __( 'Button 1 Title', 'charitas-lite'),
            'description'	=> __( 'Enter a button title.', 'charitas-lite'),
            'section' 		=> 'wplook_homepage_slider',
        )
    );
    // slider button 2 title
    $wp_customize->add_setting(
        'wplook_slide2_button_title', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'    		=> 'Learn More'
        )
    );
    $wp_customize->add_control( 'wplook_slide2_button_title', array(
            'label' 		=> __( 'Button 2 Title', 'charitas-lite'),
            'description'	=> __( 'Enter a button title.', 'charitas-lite'),
            'section' 		=> 'wplook_homepage_slider',
        )
    );
    // slider button 3 title
    $wp_customize->add_setting(
        'wplook_slide3_button_title', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'    		=> 'Learn More'
        )
    );
    $wp_customize->add_control( 'wplook_slide3_button_title', array(
            'label' 		=> __( 'Button 3 Title', 'charitas-lite'),
            'description'	=> __( 'Enter a button title.', 'charitas-lite'),
            'section' 		=> 'wplook_homepage_slider',
        )
    );
    // slider button 4 title
    $wp_customize->add_setting(
        'wplook_slide4_button_title', 
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'    		=> 'Learn More'
        )
    );
    $wp_customize->add_control( 'wplook_slide4_button_title', array(
            'label' 		=> __( 'Button 4 Title', 'charitas-lite'),
            'description'	=> __( 'Enter a button title.', 'charitas-lite'),
            'section' 		=> 'wplook_homepage_slider',
        )
    );
}

add_action('customize_register', 'charitas_child_customize_register', 12);
