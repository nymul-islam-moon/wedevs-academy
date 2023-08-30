<?php
    namespace WeDevs\Academy\Frontend;


    class Shortcode {
        /**
         * Shortcode handler method
         */
        public function __construct() {
            add_shortcode('wedevs-academy', [ $this, 'render_shortcode' ]);
        }


        /**
         * Shortcode handle method
         * @param array $atts
         * @param string $content
         * @return string
         */
        public function render_shortcode( $atts, $content='' ) {

            wp_enqueue_script( 'academy-script' );
            wp_enqueue_style( 'academy-style' );

            return '<div class="academy-shortcode">Hello from short code</div>';
        }
    }