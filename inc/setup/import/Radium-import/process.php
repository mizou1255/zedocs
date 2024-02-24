<?php
$layout = null;
$res = null;

if(isset($_POST['data'])){
$layout = $_POST['data'];

if($layout && $layout!=''){

    if(!function_exists('set_demo_menus')){
	    function set_demo_menus(){

		$primary_menu = get_term_by('name', 'Main', 'nav_menu');
		$footer_menu = get_term_by('name', 'Footer', 'nav_menu');
		$res = set_theme_mod( 'nav_menu_locations', array(
                'main' => $primary_menu->term_id,
                'footer' => $footer_menu->term_id,
            )
        );
	 echo wp_kses_post( $res );	
    
	}
    }
	
	if($layout=="solitaire"){
					
					$solitaire_options = get_template_directory().'/framework/importer/demo-files/solitaire/solitaire-options.json';
				
					$solitaire_widgets = get_template_directory().'/framework/importer/demo-files/solitaire/solitaire_widgets.json';
					
					$solitaire_content = get_template_directory().'/framework/importer/demo-files/solitaire/solitaire.xml';
		
					//set_demo_data( $solitaire_content );

					set_demo_menus();

					//clean_default_widgets();

					//process_widget_import_file( $solitaire_widgets );

					//set_demo_theme_options( $solitaire_options ); 
				}
				
				else if($layout=="jewelia"){
					
					$jewelia_options = get_template_directory().'/framework/importer/demo-files/jewelia/jewelia-options.json';
				
					$jewelia_widgets = get_template_directory().'/framework/importer/demo-files/jewelia/jewelia_widgets.json';
					
					$jewelia_content = get_template_directory().'/framework/importer/demo-files/jewelia/jewelia.xml';
		
					//set_demo_data( $solitaire_content );

					set_demo_menus();

					//clean_default_widgets();

					//process_widget_import_file( $solitaire_widgets );

					//set_demo_theme_options( $solitaire_options );
					
					wp_delete_post(1);
					wp_delete_post(2);
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', '144' );
					update_option( 'page_for_posts', '223' );
					
					 wp_insert_post( $createPage );
					  $createPage = array(
					  'post_title'    => 'Wishlist',
					  'post_content'  => '[vc_row][vc_column][solitaire_wishlist title="My Wishlist"][/vc_column][/vc_row]',
					  'post_status'   => 'publish',
					  'post_author'   => 1,
					  'post_type'     => 'page',
					  'post_name'     => 'wishlist'
					);
					
					if (  class_exists( 'Redux' ) ) {
					$opt_name = 'redux_demo';
						if( get_page_by_title('Wishlist') != NULL ) {
							$page = get_page_by_title('Wishlist');
							$permalink = get_permalink($page->ID);
							Redux::setOption( $opt_name, 'wishlist_page_url', $permalink);
						}
					
				
					}
					
				}
				
				else if($layout=="quark1"){
					
					$quark1_options = get_template_directory().'/framework/importer/demo-files/quark1/quark1-options.json';
				
					$quark1_widgets = get_template_directory().'/framework/importer/demo-files/quark1/quark1_widgets.json';
					
					$quark1_content = get_template_directory().'/framework/importer/demo-files/quark1/quark1.xml';
		
					//set_demo_data( $solitaire_content );

					set_demo_menus();

					//clean_default_widgets();

					//process_widget_import_file( $solitaire_widgets );

					//set_demo_theme_options( $solitaire_options );
					
					wp_delete_post(1);
					wp_delete_post(2);
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', '1756' );
					update_option( 'page_for_posts', '1862' );
					
				}
				else if($layout=="quark2"){
					
					$quark2_options = get_template_directory().'/framework/importer/demo-files/quark2/quark2-options.json';
				
					$quark2_widgets = get_template_directory().'/framework/importer/demo-files/quark2/quark2_widgets.json';
					
					$quark2_content = get_template_directory().'/framework/importer/demo-files/quark2/quark2.xml';
		
					//set_demo_data( $solitaire_content );

					set_demo_menus();

					//clean_default_widgets();

					//process_widget_import_file( $solitaire_widgets );

					//set_demo_theme_options( $solitaire_options );
					
					wp_delete_post(1);
					wp_delete_post(2);
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', '1756' );
					update_option( 'page_for_posts', '1862' );
					
				}
		
}
	
}
?>