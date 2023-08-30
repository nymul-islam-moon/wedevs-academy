<?php
    namespace WeDevs\Academy;

    /**
     *
     */
    class Frontend {
        public function __construct() {
            new Frontend\Shortcode();

            new Frontend\Enquiry();
        }
    }