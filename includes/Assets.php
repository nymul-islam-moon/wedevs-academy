<?php
    namespace WeDevs\Academy;

    /**
     *  Assets handlers class
     */
    class Assets {
        public function __construct()
        {

        }

        public function enqueue_assets() {
            wp_enqueue_script( 'academy-script', WD_ACADEMY_ASSETS . '/js/frontend.js' );
        }

    }