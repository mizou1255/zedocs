<?php
namespace ZDElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ZeDocs_Image extends Widget_Base {

    public function get_name()
    {
        return 'zedocs_image';
    }

    public function get_title()
    {
        return __('ZeDocs Image', 'zedocs');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['zd_category'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'zedocs' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'zedocs' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<img class="mb-3 img-fluid img-thumbnail" src="'.$settings["image"]["url"].'" data-action="zoom">';
        
    }
}
