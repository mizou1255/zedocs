<?php
namespace ZDElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ZeDocs_alert extends Widget_Base {

    public function get_name()
    {
        return 'zedocs_alert';
    }

    public function get_title()
    {
        return __('ZeDocs Alert', 'zedocs');
    }

    public function get_icon()
    {
        return 'eicon-alert';
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
            'type',
            [
                'label' => __( 'Alert type', 'zedocs' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'success' => __( 'Success', 'zedocs' ),
                    'info' => __( 'Info', 'zedocs' ),
                    'warning' => __( 'Warning', 'zedocs' ),
                    'danger' => __( 'Danger', 'zedocs' ),
                ],
                'default' => 'success'
            ]
        );

        
        $this->add_control(
            'title',
            [
                'label' => __( 'Title text', 'zedocs' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Title'
            ]
        );

        
        $this->add_control(
            'text',
            [
                'label' => __( 'Text', 'zedocs' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'We provide best leading medicle service Nulla perferendis veniam deleniti ipsum officia dolores repellat laudantium obcaecati neque.'
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<div class="callout-block callout-block-'.$settings["type"].'">
                <div class="content">
                <h4 class="callout-title">'.$settings["title"].'</h4>
                '.$settings["text"].'
                </div>
            </div>';
        
    }
}
