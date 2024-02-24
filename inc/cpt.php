<?php

class CustomPostType {
    
    protected static $instance = null;
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

    private $postType;
    private $singularName;
    private $pluralName;
    private $args;

    public function __construct($postType, $singularName, $pluralName, $args = []) {
        $this->postType = $postType;
        $this->singularName = $singularName;
        $this->pluralName = $pluralName;
        $this->args = $args;

        add_action('init', [$this, 'register']);
    }

    public function register() {
        $labels = [
            'name' => __($this->pluralName, 'zedocs'),
            'singular_name' => __($this->singularName, 'zedocs'),
            'add_new' => __('Add New', 'zedocs'),
            'add_new_item' => __('Add New ' . $this->singularName, 'zedocs'),
            'edit_item' => __('Edit ' . $this->singularName, 'zedocs'),
            'view_item' => __('View ' . $this->singularName, 'zedocs'),
            'all_items' => __($this->pluralName, 'zedocs'),
            'search_items' => __('Search ' . $this->pluralName, 'zedocs'),
            'not_found' => __('No ' . $this->pluralName . ' found', 'zedocs'),
            'not_found_in_trash' => __('No ' . $this->pluralName . ' found in Trash', 'zedocs'),
        ];

        $defaultArgs = [
            'labels' => $labels,
            'description' => '',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_rest' => false,
            'rest_base' => '',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'has_archive' => false,
            'show_in_menu' => true,
            'show_in_nav_menus' => false,
            'delete_with_user' => false,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => sanitize_title($this->pluralName), 'with_front' => false],
            'query_var' => true,
            'supports' => ['title', 'editor'],
            'show_in_graphql' => false,
        ];
        $args = wp_parse_args($this->args, $defaultArgs);
        register_post_type($this->postType, $args);
    }
}

$cpt_docs = new CustomPostType(
    'docs',
    __( "Doc", "zedocs" ),
    __( "Docs", "zedocs" ),
    [
        'hierarchical' => true,
        'supports' => ['title', 'editor', 'page-attributes'],
        'menu_icon' => 'dashicons-media-document',
        'menu_position' => 22,
    ]
);

