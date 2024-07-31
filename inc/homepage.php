<?php

$wp_customize->add_panel( 'homepage', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Homepage',
    'description'    => '',
) );


//Section
$wp_customize->add_section('hero',
    array(
        'title' => __( 'Hero', '_s' ),
        'priority' => 30,
        'panel'     => 'homepage',
        'description' => __( 'Enter the URL to your accounts for each social media for the icon to appear in the header.', '_s' )
    )
);


//Setting
$wp_customize->add_setting( 'instagram', array( 'default' => '' ) );

//Control
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize, 'instagram',
        array(
            'label' => __( 'Instagram', '_s' ),
            'section' => 'hero',
            'settings' => 'instagram'
        )
    )
);