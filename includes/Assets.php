<?php
    namespace WeDevs\Academy;

    /**
     *  Assets handlers class
     */
    class Assets {
        public function __construct()
        {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        }

        public function enqueue_assets() {
            wp_enqueue_script( 'academy-script', WD_ACADEMY_ASSETS . '/js/frontend.js', false, filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js' ), true );
            wp_enqueue_style( 'academy-script', WD_ACADEMY_ASSETS . '/css/frontend.css', false, filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js' ), true );
        }

    }