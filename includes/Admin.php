<?php

    namespace WeDevs\Academy;

    /**
     * The admin class
     */
    class Admin {
        public function __construct()
        {
            $addressBook = new Admin\AddressBook();
            $this->dispatch_actions( $addressBook );
            new Admin\Menu( $addressBook );
        }

        public function dispatch_actions( $addressBook ) {

            add_action( 'admin_init', [ $addressBook, 'form_handler' ] );
            add_action( 'admin_post_wd-ac-delete-address', [ $addressBook, 'delete_address' ] );
        }
    }