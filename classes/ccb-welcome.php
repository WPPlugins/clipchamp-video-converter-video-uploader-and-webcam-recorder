<?php

if ( ! class_exists('CCB_Welcome') ) {

	/**
	 * Example of an instance class
	 */
	class CCB_Welcome extends CCB_Module {
		const TRANSIENT = 'ccb_welcome_screen_activation_redirect';
		
		/*
		 * General methods
		 */

		/**
		 * Constructor
		 *
		 * @mvc Controller
		 */
		protected function __construct() {
			$this->register_hook_callbacks();
		}

		/**
		 * Register callbacks for actions and filters
		 *
		 * @mvc Controller
		 */
		public function register_hook_callbacks() {
			add_action( 'admin_menu', 	__CLASS__ . '::register_page' );
			add_action( 'admin_head',	__CLASS__ . '::remove_menu' );
			add_action( 'admin_init',	__CLASS__ . '::redirect' );
		}

		/**
		 * Prepares site to use the plugin during activation
		 *
		 * @mvc Controller
		 *
		 * @param bool $network_wide
		 */
		public function activate( $network_wide ) {
			set_transient( self::TRANSIENT, true, 30 );
		}

		/**
		 * Rolls back activation procedures when de-activating the plugin
		 *
		 * @mvc Controller
		 */
		public function deactivate() {
		}

		/**
		 * Initializes variables
		 *
		 * @mvc Controller
		 */
		public function init() {
		}
		
		/**
		 * Executes the logic of upgrading from specific older versions of the plugin to the current version
		 *
		 * @mvc Model
		 *
		 * @param string $db_version
		 */
		public function upgrade( $db_version = 0 ) {
		}

		/**
		 * Checks that the object is in a correct state
		 *
		 * @mvc Model
		 *
		 * @param string $property An individual property to check, or 'all' to check all of them
		 * @return bool
		 */
		protected function is_valid( $property = 'all' ) {
			return true;
		}

		public static function register_page() {
            add_dashboard_page(
                'Welcome to Clipchamp',
                CCB_NAME . ' Welcome',
                'read',
                'ccb_welcome',
                __CLASS__ . '::markup_page'
            );
        }

        public static function markup_page() {
		    $settings = CCB_Settings::get_settings();
            echo self::render_template( 'welcome.php', array( 'settings' => $settings ) );
        }

		public static function redirect() {
			if ( ! get_transient( self::TRANSIENT ) ) {
				return;
			}

			delete_transient( self::TRANSIENT );

			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}

			wp_safe_redirect( add_query_arg( array( 'page' => 'ccb_welcome' ), admin_url( 'index.php' ) ) );
		}

		public static function remove_menu() {
    		remove_submenu_page( 'index.php', 'ccb_welcome' );
		}

	} // end CCB_Welcome
}
