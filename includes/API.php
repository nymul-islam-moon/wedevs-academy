<?php

    namespace WeDevs\Academy;

    /**
     * API class
     */
    class API {

        public function __construct() {
            add_action( 'rest_api_init', [ $this, 'register_api' ] );
        }

        public function register_api() {
            $address_book = new API\AddressBook();
            $address_book->register_routes();
        }

    }