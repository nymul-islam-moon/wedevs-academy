<?php
    /**
     * Plugin Name: WeDevs Academy
     * Description: A tutorial plugin for weDevs Academy
     * Plugin URL: https://nymul-islam-moon.github.io/
     * Author: Nymul Islam Moon
     * Author URL: https://nymul-islam-moon.github.io/
     * Version: 1.0.0
     * License: GPL2
     * Text Domain: Text Domain
     * Domain Path: Domain Path
     */

    if (!defined('ABSPATH')){
        exit;
    }
    require_once __DIR__ . '/vendor/autoload.php';


    /**
     * The main plugin class
     */
    final class WeDevs_Academy{

        /**
         * Plugin version
         * @var string
         */
        const version = '1.0.0';

        /**
         * class constructor
         */
        private function __construct(){

            $this->define_constants();

            register_activation_hook(__FILE__, [ $this, 'activate' ]);

            add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

        }


        /**
         * Initializes a singleton instance
         * @return false|WeDevs_Academy
         */
        public static function init(){
            static $instance = false;

            if(!$instance){
                $instance = new self();
            }

            return $instance;
        }

        /**
         * Define the required plugin constants
         * @return void
         */
        public function define_constants(){
            define( 'WD_ACADEMY_VERSION', self::version );
            define( 'WD_ACADEMY_FILE', __FILE__ );
            define( 'WD_ACADEMY_PATH', __DIR__ );
            define( 'WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE ) );
            define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
        }

        /**
         * Initialize the plugin
         * @return void
         */
        public function init_plugin() {

            new WeDevs\Academy\Assets();

            if ( is_admin() ) {
                new WeDevs\Academy\Admin();
            } else {
                new WeDevs\Academy\Frontend();
            }
        }

        /**
         * Do staff upon plugin activation
         * @return void
         */
        public function activate(){
            $installer = new WeDevs\Academy\Installer();
            $installer->run();
        }
    }

    /**
     * Initializes the main plugin
     * @return \weDevs_Academy
     */
    function wedevs_academy(){
        return WeDevs_Academy::init();
    }

    # kick-off the plugin
    wedevs_academy();