<?php
    namespace WeDevs\Academy\Admin;

    /**
     * The Menu handler class
     */
    class Menu {

        public $addressBook;

        public function __construct( $addressBook ) {
            $this->addressBook = $addressBook;
            add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        }

        public function admin_menu() {
            $parent_slug = 'wedevs-academy';
            $capability = 'manage_options';

            $hook = add_menu_page( __( 'weDevs Academy', 'wedevs-academy' ), __( 'Academy', 'wedevs-academy' ), $capability, $parent_slug, [ $this->addressBook, 'plugin_page' ], 'dashicons-welcome-learn-more' );
            add_submenu_page($parent_slug, __( 'Address Book', 'wedevs-academy' ), __( 'Address Book', 'wedevs-academy' ), $capability, $parent_slug, [ $this->addressBook, 'plugin_page' ] );
            add_submenu_page($parent_slug, __( 'Settings', 'wedevs-academy' ), __( 'Settings', 'wedevs-academy' ), $capability, 'wedevs-academy-settings', [ $this, 'settings_page' ] );

            add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );
        }

        public function plugin_page() {
            echo 'Hello World';
        }

        public function enqueue_assets() {
            wp_enqueue_style( 'academy-admin-style' );
        }

        /**
         * Handles the settings page
         * @return void
         */
        public function settings_page() {
            echo 'Hello Settings Pages';
        }

    }