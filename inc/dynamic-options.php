<?php

if( !function_exists('zd__dynamic_options')){
    function zd__dynamic_options() {
        
        $primary_color = ZD_theme_option('primary_color');
        $secondary_color = ZD_theme_option('secondary_color');

        $font_f_body = ZD_theme_option_two_params('typo-body','font-family');
        $font_f_body_color = ZD_theme_option_two_params('typo-body','color');
        $font_f_body_size = ZD_theme_option_two_params('typo-body','font-size');
        $font_f_navbar = ZD_theme_option_two_params('typo-navbar','font-family');
        $font_f_h1 = ZD_theme_option_two_params('typo-h1','font-family');
        $font_f_h1_color = ZD_theme_option_two_params('typo-h1','color');
        $font_f_h1_weight = ZD_theme_option_two_params('typo-h1','font-weight');
        $font_f_h2 = ZD_theme_option_two_params('typo-h2','font-family');
        $font_f_h2_color = ZD_theme_option_two_params('typo-h2','color');
        $font_f_h2_weight = ZD_theme_option_two_params('typo-h2','font-weight');
        $font_f_h3 = ZD_theme_option_two_params('typo-h3','font-family');
        $font_f_h3_color = ZD_theme_option_two_params('typo-h3','color');
        $font_f_h3_weight = ZD_theme_option_two_params('typo-h3','font-weight');
        $font_f_h4 = ZD_theme_option_two_params('typo-h4','font-family');
        $font_f_h4_color = ZD_theme_option_two_params('typo-h4','color');
        $font_f_h4_weight = ZD_theme_option_two_params('typo-h4','font-weight');
        $font_f_h5 = ZD_theme_option_two_params('typo-h5','font-family');
        $font_f_h5_color = ZD_theme_option_two_params('typo-h5','color');
        $font_f_h5_weight = ZD_theme_option_two_params('typo-h5','font-weight');
        $font_f_h6 = ZD_theme_option_two_params('typo-h6','font-family');
        $font_f_h6_color = ZD_theme_option_two_params('typo-h6','color');
        $font_f_h6_weight = ZD_theme_option_two_params('typo-h6','font-weight');

            ?>
            .zd_logo_style {
                margin: 0 !important;
            }
            @media (max-width: 450px) {
                
                .zd_logo_style img {
                    max-height: 40px;
                    max-width: 200px !important;
                }
            }
        <?php 

        if(!empty($font_f_body)) { ?>
            body {
                font-family: <?php echo esc_html($font_f_body); ?> !important
            }
        <?php 
        }
        if(!empty($font_f_body_size)) { ?>
            body {
                font-size: <?php echo esc_html($font_f_body_size); ?>px;
            }
        <?php 
        }
        if(!empty($font_f_body_color)) { ?>
            :root {
                --bs-body-color: <?php echo esc_html($font_f_body_color); ?>
            }
        <?php  
        } 

        if(!empty($font_f_h1)) { ?>
            h1, h1 a {
                font-family: <?php echo esc_html($font_f_h1); ?> !important;
                font-weight: <?php echo esc_html($font_f_h1_weight); ?> !important;
                color: <?php echo esc_html($font_f_h1_color); ?> !important;
            }
            
        <?php  
        } 

        if(!empty($font_f_h2)) { ?>
            h2, h2 a {
                font-family: <?php echo esc_html($font_f_h2); ?> !important;
                font-weight: <?php echo esc_html($font_f_h2_weight); ?> !important;
                color: <?php echo esc_html($font_f_h2_color); ?> !important;
            }
        <?php  
        } 

        if(!empty($font_f_h3)) { ?>
            h3, h3 a {
                font-family: <?php echo esc_html($font_f_h3); ?> !important;
                font-weight: <?php echo esc_html($font_f_h3_weight); ?> !important;
                color: <?php echo esc_html($font_f_h3_color); ?> !important
            }
        <?php  
        } 

        if(!empty($font_f_h4)) { ?>
            h4, h4 a {
                font-family: <?php echo esc_html($font_f_h4); ?> !important;
                font-weight: <?php echo esc_html($font_f_h4_weight); ?> !important;
                color: <?php echo esc_html($font_f_h4_color); ?> !important
            }
        <?php  
        } 

        if(!empty($font_f_h5)) { ?>
            h5, h5 a {
                font-family: <?php echo esc_html($font_f_h5); ?> !important;
                font-weight: <?php echo esc_html($font_f_h5_weight); ?> !important;
                color: <?php echo esc_html($font_f_h5_color); ?> !important
            }
        <?php  
        } 

        if(!empty($font_f_h6)) { ?>
            h6, h6 a {
                font-family: <?php echo esc_html($font_f_h6); ?> !important;
                font-weight: <?php echo esc_html($font_f_h6_weight); ?> !important;
                color: <?php echo esc_html($font_f_h6_color); ?> !important
            }
        <?php  
        } 

        if(!empty($primary_color)) { ?>
            :root {
                --bs-primary: <?php echo esc_html($primary_color) ?>!important;
            }
            .btn-primary {
                --bs-btn-bg: <?php echo esc_html($primary_color) ?>!important;
                --bs-btn-border-color: <?php echo esc_html($primary_color) ?>!important;
                --bs-btn-disabled-bg: <?php echo esc_html($primary_color) ?>!important;
                --bs-btn-disabled-border-color: <?php echo esc_html($primary_color) ?>!important;
            }
            .bg-primary {
                background-color: <?php echo esc_html($primary_color) ?>!important;
            }

            a {
                color: <?php echo esc_html($primary_color) ?>;
            }
        <?php }

        if ($secondary_color) { ?>
            :root {
                --bs-secondary: <?php echo esc_html($secondary_color) ?>!important;
            }
            .btn-secondary {
                --bs-btn-bg: <?php echo esc_html($secondary_color) ?> !important;
                --bs-btn-border-color: <?php echo esc_html($secondary_color) ?> !important;
                --bs-btn-disabled-bg: <?php echo esc_html($secondary_color) ?> !important;
                --bs-btn-disabled-border-color: <?php echo esc_html($secondary_color) ?> !important;
            }
            
            .btn-secondary:hover {
                border-color: <?php echo esc_html($secondary_color) ?> !important;
                color: <?php echo esc_html($secondary_color) ?> !important;
            }
            a:hover {
                color: <?php echo esc_html($secondary_color) ?>;
            }
            
        <?php } 

    }
}