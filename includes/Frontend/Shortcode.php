<?php
    namespace WeDevs\Academy\Frontend;


    class Shortcode {
        /**
         * Shortcode handler class
         */
        public function __construct() {
            add_shortcode('wedevs-academy', [ $this, 'render_shortcode' ]);
        }


        /**
         * Shortcode handle class
         * @param array $atts
         * @param string $content
         * @return string
         */
        public function render_shortcode( $atts, $content='' ) {
            return 'Hello from short code';
        }
    }