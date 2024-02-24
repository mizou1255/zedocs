<?php
/**
 * Helpers functions.
 *
 * @package ZEDOCS
 * @since   1.0.0
 */


 if (!function_exists('ZD_theme_option')) {
	function ZD_theme_option($optionID){
		global $zd__options;
		if (isset($zd__options["$optionID"])) {
			$optionValue = $zd__options["$optionID"];
			return $optionValue;
		} else {
			return false;
		}
	}
}
if (!function_exists('ZD_theme_option_two_params')) {
	function ZD_theme_option_two_params($optionID, $index){
		global $zd__options;
		if (isset($zd__options["$optionID"])) {
			if (isset($zd__options["$optionID"]["$index"])) {
				$optionValue = $zd__options["$optionID"]["$index"];
				return $optionValue;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

if (!function_exists('ZD_get_logo')) {
	function ZD_get_logo(){
		global $zd__options;
		$zd_logo = $zd__options['logo_site']['url'];
		if (!empty($zd_logo)) {
			echo '<img src="' . $zd_logo . '" alt="Logo" class="img-fluid" />';
		} else {
			echo get_option('blogname');
		}
	}
}
if ( ! function_exists( 'ZD_get_favicon' ) ) {
    function ZD_get_favicon() {
        global $zd__options;
        if($zd__options['icon_favicon'] != ''){
            echo '<link rel="shortcut icon" href="' . wp_kses_post($zd__options['icon_favicon']['url']) . '"/>';
        } else {
            echo '<link rel="shortcut icon" href="' . ZD__PATH . '/assets/images/favicon.ico"/>';
        }
    }
    
}

add_action('redux/options/zd__options/saved', 'zd__css');
function zd__css() {
	ob_start();
	zd__dynamic_options();
	do_action('zd__css_addons_dynamic_css');
	$grid_view_html = ob_get_contents();
	ob_end_clean();
	file_put_contents(get_template_directory() . '/assets/css/dynamic-css.css', $grid_view_html);
}
