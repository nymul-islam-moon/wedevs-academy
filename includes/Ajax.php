<?php
    namespace WeDevs\Academy;

    /**
     * Ajax handler class
     */
    class Ajax {
        function __construct() {
            add_action( 'wp_ajax_wd_ac_enquiry', [ $this, 'submit_enquiry' ] );

            public function submit_enquiry() {

            }
        }
    }