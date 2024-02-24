<?php
/**
 * Version 0.0.2
 */

require_once(  dirname( __FILE__ ) .'/Radium-import/radium-importer.php' ); //load admin theme data importer

class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 0.0.1
     *
     * @var object
     */
    private static $instance;
    
    /**
     * Set the key to be used to store theme options
     *
     * @since 0.0.2
     *
     * @var object
     */
	public $theme_option_name       =  'TakeThemes_options'; //set theme options name here
	
	public $theme_options_file_name =  'demo-files/jewelia/jewelia-options.json';
	
	public $widgets_file_name       =  'demo-files/jewelia/jewelia_widgets.json';
	
	public $content_demo_file_name  =  'demo-files/jewelia/jewelia.xml';

	
	/**
	 * Holds a copy of the widget settings 
	 *
	 * @since 0.0.2
	 *
	 * @var object
	 */
	public $widget_import_results;
	
    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 0.0.1
     */
    public function __construct() {
    
		$this->demo_files_path = dirname(__FILE__) . '/demo-files/';

        self::$instance = $this;
		parent::__construct();

    }
	
	/**
	 * Add menus
	 *
	 * @since 0.0.1
	 */
	public function set_demo_menus(){

		// Menus to Import and assign - you can remove or add as many as you want
		$primary_menu = get_term_by('name', 'Main', 'nav_menu');
		$footer_menu = get_term_by('name', 'Footer', 'nav_menu');

		set_theme_mod( 'nav_menu_locations', array(
                'main' => $primary_menu->term_id,
                'footer' => $footer_menu->term_id,
            )
        );

	}

	/**
	 * Update homepage & blog page
	 *
	 * @since 0.0.1
	 */
	public function set_home_and_blog(){
		
		wp_delete_post(1);
		wp_delete_post(2);
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', '1523' );
		//update_option( 'page_for_posts', '23' );

	}

	/**
	 * Clean all default widgets that come with WP fresh installation
	 *
	 * @since 0.0.1
	 */
	public function clean_default_widgets() {
		update_option( 'sidebars_widgets', $null );
	}


}

new Radium_Theme_Demo_Data_Importer;