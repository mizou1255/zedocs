<?php

/**
 * Class Radium_Theme_Importer
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 2.2.0
 *
 * @category RadiumFramework
 * @package  NewsCore WP
 * @author   Franklin M Gitonga
 * @link     http://radiumthemes.com/
 *
 */
class Radium_Theme_Importer {

  /**
   * Holds a copy of the object for easy reference.
   *
   * @since 2.2.0
   *
   * @var object
   */
  public $theme_options_file;

  /**
   * Holds a copy of the object for easy reference.
   *
   * @since 2.2.0
   *
   * @var object
   */
  public $widgets;

  /**
   * Holds a copy of the object for easy reference.
   *
   * @since 2.2.0
   *
   * @var object
   */
  public $content_demo;

  /**
   * Flag imported to prevent duplicates
   *
   * @since 2.2.0
   *
   * @var object
   */
  public $flag_as_imported = array();

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    private static $instance;

    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 2.2.0
     */
    public function __construct() {

        self::$instance = $this;
        
        $this->theme_options_file = $this->demo_files_path . $this->theme_options_file_name;
        $this->widgets = $this->demo_files_path . $this->widgets_file_name;
        $this->content_demo = $this->demo_files_path . $this->content_demo_file_name;
     
        add_action( 'admin_menu', array($this, 'add_admin') );

    }

  /**
   * Add Panel Page
   *
   * @since 2.2.0
   */
    public function add_admin() {

        //add_submenu_page('themes.php', "One Click Demo Data Importer", "One Click Importer", 'switch_themes', 'xshop_demo_importer', array($this, 'demo_installer'));

    }

    /**
     * [demo_installer description]
     *
     * @since 2.2.0
     *
     * @return [type] [description]
     */
    public function demo_installer() {

        ?>
		<div class="importer-head">
		  
			<img class="logo" src="<?php echo get_template_directory_uri().'/assets/img/demo-xshop.png'; ?>" />
			<h6>We believe in creating...</h6>
			<h4>simple. beautiful. useful</h4>
			<h2>Xshop Multipurpose Woocommerce Theme</h2>
			<img class="bann full-img" src="<?php echo get_template_directory_uri().'/assets/img/import-demo-ban.png'; ?>" />
			
			
		</div>
		<?php
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( class_exists( 'ReduxFramework' ) && class_exists('WPBakeryVisualComposerAbstract') && class_exists('WooCommerce')) {
				?>
				<div class="wrap about-wrap">
		
		
				<h1 style="text-transform: uppercase;font-size: 2.0em;">One Click XSHOP Demo Data Importer</h1>
                <div class="">
                    <p>Importing demo data (post, pages, images, theme settings, widgets, ...) is the easiest way to setup your theme.</p>
					<p>It will allow you to quickly edit everything instead of creating content from scratch. When you import the data following things will happen:</p>
                </div>

                <ul style="padding-left: 20px;list-style-position: inside;list-style-type: square;}">
                    <li>No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified .</li>
                    <li>Some WordPress settings will be modified such as front page and blog page .</li>
                    <li>Posts, pages, some images, some widgets and menus will get imported .</li>
                    <li>Images will be downloaded from our server, these images are copyrighted and are for demo use only .</li>
                    <li>Please click import only once and wait, it can take a couple of minutes</li>
                </ul>
                <br />
                

                <form method="post" class="solitaire-importer row">
                    <input type="hidden"  name="demononce" value="<?php echo wp_create_nonce('radium-demo-code'); ?>" />
					<div class="row">
					<div class="col-30">
						<label>
						<input id="solitaire" type="radio" class="" name="layout" value="solitaire" />
						<img data-layout="solitaire" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/solitaire-demo.jpg" />
						<button name="submit" class="panel-save button-primary" type="submit">
						<i class="fa fa-check" aria-hidden="true"></i> Click to import
						</button>
						</label>
					</div>
					<div class="col-30">
						<label>
						<input id="jewelia" type="radio" class="" name="layout" value="jewelia" />
						<img data-layout="jewelia" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jewelia-demo.jpg" />
						<button name="submit" class="panel-save button-primary" type="submit">
						<i class="fa fa-check" aria-hidden="true"></i> Click to import
						</button>
						</label>
					</div>
					<div class="col-30">
						<label>
						<input id="quark1" type="radio" class="" name="layout" value="quark1" />
						<img data-layout="quark1" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quark-demo.jpg" />
						<button name="submit" class="panel-save button-primary" type="submit">
						<i class="fa fa-check" aria-hidden="true"></i> Click to import
						</button>
						</label>
					</div>
					<div class="col-30">
						<label>
						<input id="quark2" type="radio" class="" name="layout" value="quark2" />
						<img data-layout="quark2" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/quark-2-demo.jpg" />
						<button name="submit" class="panel-save button-primary" type="submit">
						<i class="fa fa-check" aria-hidden="true"></i> Click to import
						</button>
						</label>
                    </div>
					</div>
					
					
                    <input type="hidden" name="action" value="demo-data" />
                </form>
				<p style="display:none" class="loading"><i class="fa fa-refresh fa-spin margin-bottom"></i> It may can take few minuts. Don't refresh page.</p>
				<p style="display:none" class="success"></p>
                <br />
				<p class="cp-right">Powered by Cridio Studio</p>
        </div>
				<?php
			}
            else{ ?>
			<?php
				echo 
				'<div>
                    <p><span style="color:#d54e21;font-weight: bold;">NOTE:</span> Before you begin to import demo, make sure all the <strong>required</strong> plugins are installed activated.recommended</i> plugins before running demo data importer tool</p>
                </div>';
			?>
				
				
		<?php	}			
		?>
        
		
        <div class="clear">
		
		</div>
		
		<script type="text/javascript">
			jQuery(document).ready(function($){
				jQuery('.solitaire-importer').on('submit', function(e){
					jQuery('p.loading').show(100);
					jQuery('p.success').hide(100);
					e.preventDefault();
					var formData = $("input[name='layout']:checked"). val();
					
					jQuery.ajax({
					 type : "post",
					 url : ajaxurl,
					 data : {
						   action:'importDemo',
						   data:formData,
                         'lpNonce' : jQuery('#lpNonce').val()
						 },
						 
					
					 success: function(response) {
						jQuery('p.loading').hide(100);
						jQuery('p.success').show(100);
						
						jQuery('p.success').html('<span class="alert alert-success">'+response+'</span>');
						
						
					 }
				  }); 
				 return false;
				});
				/* visibility:visible; bottom:0px; left:0px;  */
				jQuery('.solitaire-importer .col-30').click(function(e){
					jQuery('.solitaire-importer .col-30').find('.panel-save').css({'visibility' : 'hidden', 'bottom': '15px','left' : '15px'});
					jQuery(this).find('.panel-save').css({'visibility' : 'visible', 'bottom': '0','left' : '0'});
				});
				/*  */
			});
		</script>
        <?php
    
        //$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
        
    }

    /**
     * add_widget_to_sidebar Import sidebars
     * @param  string $sidebar_slug    Sidebar slug to add widget
     * @param  string $widget_slug     Widget slug
     * @param  string $count_mod       position in sidebar
     * @param  array  $widget_settings widget settings
     *
     * @since 2.2.0
     *
     * @return null
     */
    public function add_widget_to_sidebar($sidebar_slug, $widget_slug, $count_mod, $widget_settings = array()){

        $sidebars_widgets = get_option('sidebars_widgets');

        if(!isset($sidebars_widgets[$sidebar_slug]))
           $sidebars_widgets[$sidebar_slug] = array('_multiwidget' => 1);

        $newWidget = get_option('widget_'.$widget_slug);

        if(!is_array($newWidget))
            $newWidget = array();

        $count = count($newWidget)+1+$count_mod;
        $sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;

        $newWidget[$count] = $widget_settings;

        update_option('sidebars_widgets', $sidebars_widgets);
        update_option('widget_'.$widget_slug, $newWidget);

    }


}

?>