<?php
if (!class_exists('Redux')) {
    return;
}

$zd__options = "zd__options";

$args = array(
    'opt_name' => $zd__options,
    'display_name' => 'Zedocs Options',
    'page_slug' => $zd__options,
    'dev_mode' => false,
    'menu_type' => 'menu',
    'menu_title' => 'ZeDocs Options',
    'allow_sub_menu' => true,
    'menu_icon' => 'dashicons-admin-generic',
    'page_title' => 'ZeDocs OPTIONS',
    'admin_bar' => true,
    'admin_bar_icon' => 'dashicons-admin-generic',
    'page_parent' => 'themes.php',
    'customizer' => false,
    'admin_bar_priority' => 50,
    'page_priority' => 62,
    'default_mark' => '*',
    'output' => true, 
    'output_tag' => true,
    'show_import_export' => true,
    'system_info' => false,
    'global_variable' => '',
    'dev_mode' => false,
    'footer_text' => '',
);

Redux::set_args($zd__options, $args);


Redux::set_section($zd__options, array(
    'title' => 'General',
    'id' => 'general',
    'icon' => 'el-icon-cog',
    'fields' => array(
        array(
            'id'       => 'type_posts',
            'type'     => 'button_set',
            'title'    => esc_html__('Posts or CPT Docs', 'zedocs'),
            'options' => array(
                'post' => 'Posts', 
                'docs' => 'Docs', 
            ), 
            'default' => 'docs'
        ),
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'title'    => esc_html__('Primary color', 'zedocs'), 
            'default'  => '#0d6efd',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'title'    => esc_html__('Secondary color', 'zedocs'), 
            'default'  => '#ffca2c',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'admin_bar',
            'type'     => 'button_set',
            'title'    => esc_html__('Show admin bar in frontend', 'zedocs'),
            'options' => array(
                'yes' => 'Yes', 
                'no' => 'No', 
            ), 
            'default' => 'yes'
        ),
    ),
));

Redux::set_section($zd__options, array(
    'title' => __('Header', $zd__options),
    'id' => 'Header',
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-up',
    'fields' => array(
        array(      
            'id'       => 'logo_switch',
            'type'     => 'button_set',
            'title'    => esc_html__('Logo style', 'zedocs'),
            'options' => array(
                'image' => 'Image', 
                'text' => 'Text', 
            ), 
            'default' => 'image'
        ),
        array(
            'id' => 'logo_text',
            'type' => 'text',
            'title' => 'Logo',
            'compiler' => 'true',
            'default' => 'NovaClinic',
            'required' => array(
                array(
                    'logo_switch',
                    '=',
                    'text'
                )
            )
        ),
        array(
            'id' => 'logo_site',
            'type' => 'media',
            'title' => __('Logo', 'zedocs'),
            'compiler' => 'true',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/logo.png'),
            'required' => array(
                array(
                    'logo_switch',
                    '=',
                    'image'
                )
            )
        ),
        array(
            'id' => 'icon_favicon',
            'type' => 'media',
            'url' => true,
            'title' => __('Favicon ', 'zedocs'),
            'compiler' => 'true',
            'default' => array('url' => get_template_directory_uri() . '/assets/images/favicon.png'),
        ),
        array(
            'id' => 'change_log_btn',
            'type'     => 'switch', 
            'title'    => esc_html__('ChangeLog button', 'zedocs'),
            'default'  => true,
        ),
        array(
            'id' => 'road_btn',
            'type'     => 'switch', 
            'title'    => esc_html__('RoadMap button', 'zedocs'),
            'default'  => true,
        ),
        array(
            'id'             => 'repeater_change_log',
            'type'           => 'repeater',
            'title'          => esc_html__( 'Changelog repeater', 'zedocs' ),
            'fields'         => array(
                array(
                    'id'          => 'version_log',
                    'type'        => 'text',
                    'title' => esc_html__( 'Version number', 'zedocs' ),
                    'default'          => '1.0.0',
                ),
                array(
                    'id'          => 'date_log',
                    'type'        => 'date',
                    'title' => esc_html__( 'Date', 'zedocs' ),
                    'default'     => '2023-06-12',
                ),
                array(
                    'id'               => 'text_log',
                    'type'             => 'editor',
                    'title'            => esc_html__('Log detail', 'zedocs'), 
                    'default'          => '<ul><li>Initial Release</li></ul>',
                    'args'   => array(
                        'teeny'            => true,
                        'textarea_rows'    => 10
                    ),
                ),
            ),
        ),
        array(
            'id'               => 'text_roadmap',
            'type'             => 'editor',
            'title'            => esc_html__('RoadMap detail', 'zedocs'), 
            'default'          => '<ul><li>Add new features</li></ul>',
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            ),
        ),                
        
    ),
));

Redux::set_section($zd__options, array(
    'title' => 'Typography',
    'id' => 'topography',
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id'          => 'typo-h1',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H1', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Exo', 
                'google'      => true,
            ),
        ),
        array(
            'id'          => 'typo-h2',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H2', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Exo', 
                'google'      => true,
            ),
        ),
        array(
            'id'          => 'typo-h3',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H3', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Exo', 
                'google'      => true,
            ),
        ),
        array(
            'id'          => 'typo-h4',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H4', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Poppins', 
                'google'      => true,
            ),
        ),
        array(
            'id'          => 'typo-h5',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H5', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Poppins', 
                'google'      => true,
            ),
        ),
        array(
            'id'          => 'typo-h6',
            'type'        => 'typography', 
            'title'       => esc_html__('Font H6', 'zedocs'),
            'google'      => true, 
            'font-backup' => false,
            'font-style' => false,
            'line-height' => false,
            'text-align' => false,
            'font-size'   => false, 
            'font-weight'   => true, 
            'subsets'   => false, 
            'default'     => array(
                'color'       => '#223a66', 
                'font-family' => 'Poppins', 
                'google'      => true,
            ),
        ),
    ),
));


Redux::set_section($zd__options, array(
    'title' => __('Footer', $zd__options),
    'id' => 'footer',
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-down',
    'fields' => array(
        array(
            'id'       => 'credit_active',
            'type'     => 'button_set',
            'title'    => esc_html__('Show credit', 'zedocs'),
            'options' => array(
                '1' => 'On', 
                '0' => 'Off', 
            ), 
            'default' => '1'
        ), 
        array(
            'id'       => 'info_credit',
            'type'     => 'info',
            'style' => 'critical',
            'icon' => 'el-icon-info-sign',
            'title'    => esc_html__('To support the development please leave credits in the footer. 
            this theme is free, you are not allowed to sell it ', 'zedocs')
        ), 
    ),
));

Redux::set_section($zd__options, array(
    'title' => __('Dark Mode', 'zedocs'),
    'id' => 'dark_mode_section',
    'customizer_width' => '400px',
    'disabled' => true,
    'icon' => 'el el-bulb',
    'fields' => array(
            array(
                'id'       => 'dark_mode',
                'type'     => 'button_set',
                'title'    => esc_html__('Activate dark mode', 'zedocs'),
                'options' => array(
                    'yes' => 'Yes', 
                    'no' => 'No', 
                ), 
                'default' => 'yes'
            ),
            array(
                'id'       => 'filter_image_light',
                'type'     => 'button_set',
                'title'    => esc_html__('Filter light images', 'zedocs'),
                'desc'    => esc_html__('Add filter light to Logo and default image', 'zedocs'),
                'options' => array(
                    'yes' => 'Yes', 
                    'no' => 'No', 
                ), 
                'default' => 'yes',
                'required' => array(
                    array(
                        'dark_mode',
                        '=',
                        'yes'
                    )
                ),
            ),
            array(
                'id'       => 'primary_color_dark',
                'type'     => 'color',
                'title'    => esc_html__('Primary color for dark mode only', 'zedocs'), 
                'default'  => '#3068f4',
                'validate' => 'color',
                'transparent' => false,
                'required' => array(
                    array(
                        'dark_mode',
                        '=',
                        'yes'
                    )
                ),
            ),
            array(
                'id'       => 'secondary_color_dark',
                'type'     => 'color',
                'title'    => esc_html__('Secondary color for dark mode only', 'zedocs'), 
                'default'  => '#e023b1',
                'validate' => 'color',
                'transparent' => false,
                'required' => array(
                    array(
                        'dark_mode',
                        '=',
                        'yes'
                    )
                ),
            ),
        ),        
    ),
);