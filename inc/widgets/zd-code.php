<?php
namespace ZDElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ZeDocs_Code extends Widget_Base {

    public function get_name()
    {
        return 'zedocs_code';
    }

    public function get_title()
    {
        return __('ZeDocs Code', 'zedocs');
    }

    public function get_icon()
    {
        return 'eicon-code';
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
            'lang',
            [
                'label' => __( 'Language', 'zedocs' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'HTML'
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => __( 'Color language', 'zedocs' ),
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
            'code',
            [
                'label' => __( 'Code', 'zedocs' ),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        echo '<pre><code data-lang="'.$settings["lang"].'" class="language-html '.$settings["color"].'">'.htmlspecialchars($settings["code"]).'</code></pre>';
        
    }
}
