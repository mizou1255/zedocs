<?php
namespace ZDElementor\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ZeDocs_Progress extends Widget_Base {

    public function get_name()
    {
        return 'zedocs_progress';
    }

    public function get_title()
    {
        return __('ZeDocs ProgressBar', 'zedocs');
    }

    public function get_icon()
    {
        return 'eicon-progress-tracker';
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
            'color',
            [
                'label' => __( 'Color', 'zedocs' ),
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
			'width',
			[
				'label' => esc_html__( 'Width', 'zedocs' ),
				'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
                    'unit' => '%',
					'size' => 25,
				],
			]
		);
        
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="progress my-4">
            <div class="progress-bar bg-'.$settings["color"].'" role="progressbar" aria-valuenow="'.$settings["width"]["size"].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$settings["width"]["size"] .''.$settings["width"]["unit"].'"></div>
        </div>';
        
    }
}
