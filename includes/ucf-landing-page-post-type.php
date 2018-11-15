<?php
/**
 * Handles the creation of the Landing Pages custom post type
 */
if ( ! class_exists( 'UCF_Landing_Page_PostType' ) ) {
	class UCF_Landing_Page_PostType {
		public static
			$labels = array(
				'singular' => 'Landing Page',
				'plural'   => 'Landing Pages',
				'slug'     => 'landing-page',
				'rewrite'  => 'info'
			),
			$text_domain = 'ucf_landing_page';

		/**
		 * Registers the landing-page custom post type
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function register_post_type() {
			$labels = apply_filters( 'ucf_landing_page_labels', self::$labels );

			register_post_type( $labels['slug'], self::args( $labels ) );
		}

		/**
		 * Returns the labels array used by the custom post type
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param array $labels The labels array
		 * @return array The labels array used by the custom post type args
		 */
		public static function labels( $labels ) {
			$singular = $labels['singular'];
			$plural   = $labels['plural'];

			return array(
				'name'                  => _x( $plural, 'Post Type General Name', self::$text_domain ),
				'singular_name'         => _x( $singular, 'Post Type Singular Name', self::$text_domain ),
				'menu_name'             => __( $plural, self::$text_domain ),
				'name_admin_bar'        => __( $singular, self::$text_domain ),
				'archives'              => __( $plural . ' Archives', self::$text_domain ),
				'parent_item_colon'     => __( 'Parent ' . $singular . ':', self::$text_domain ),
				'all_items'             => __( 'All ' . $plural, self::$text_domain ),
				'add_new_item'          => __( 'Add New ' . $singular, self::$text_domain ),
				'add_new'               => __( 'Add New', self::$text_domain ),
				'new_item'              => __( 'New ' . $singular, self::$text_domain ),
				'edit_item'             => __( 'Edit ' . $singular, self::$text_domain ),
				'update_item'           => __( 'Update ' . $singular, self::$text_domain ),
				'view_item'             => __( 'View ' . $singular, self::$text_domain ),
				'search_items'          => __( 'Search ' . $plural, self::$text_domain ),
				'not_found'             => __( 'Not found', self::$text_domain ),
				'not_found_in_trash'    => __( 'Not found in Trash', self::$text_domain ),
				'insert_into_item'      => __( 'Insert into ' . $singular, self::$text_domain ),
				'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, self::$text_domain ),
				'items_list'            => __( $plural . ' list', self::$text_domain ),
				'items_list_navigation' => __( $plural . ' list navigation', self::$text_domain ),
				'filter_items_list'     => __( 'Filter ' . $plural . ' list', self::$text_domain ),
			);
		}

		/**
		 * Returns the args used to register the custom post type
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param array $labels The labels array
		 * @return array The argument array
		 */
		public static function args( $labels ) {
			$singular = $labels['singular'];
			$plural   = $labels['plural'];

			$args = array(
				'label'                 => __( $plural, self::$text_domain ),
				'description'           => __( $plural, self::$text_domain ),
				'labels'                => self::labels( $labels ),
				'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', ),
				'taxonomies'            => self::taxonomies(),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-welcome-widgets-menus',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'rewrite'               => array( 'slug' => $labels['rewrite'] ),
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			);

			$args = apply_filters( 'ucf_landing_page_post_type_args', $args );
			return $args;
		}

		/**
		 * Returns an array of taxonomies assigned to the custom post type
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @return array
		 */
		public static function taxonomies() {
			$retval = array();

			$retval = apply_filters( 'ucf_landing_page_post_type_taxonomies', $retval );

			return $retval;
		}
	}
}
