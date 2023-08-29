<?php

    namespace WeDevs\Academy\Admin;

    if ( ! class_exists('WP_List_Table' ) ) {
        require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
    }

    /**
     * AddressList table class
     */
    class AddressList extends \WP_List_Table {

        public function __construct()
        {
            parent::__construct( [
                'singular'  => 'contact',
                'plural'    => 'contacts',
                'ajax'      => false
            ] );
        }

        public function get_columns() {
            return [
                'cb'            => '<input type="checkbox" />',
                'name'          => __( 'Name', 'wedevs-academy' ),
                'phone'         => __( 'Phone', 'wedevs-academy' ),
                'address'       => __( 'Address', 'wedevs-academy' ),
                'created_at'    => __( 'Date', 'wedevs-academy' ),
            ];
        }

        function get_sortable_columns()
        {
            $sortable_columns = [
                'name'          => [ 'name', true ],
                'created_at'    => [ 'created_at', true ],
            ];

            return $sortable_columns;
        }


        /**
         * @param $item
         * @param $column_name
         * @return string|void
         */

        protected function column_default( $item, $column_name ) {
            switch ( $column_name ) {
                case 'value':

                default:
                    return isset( $item->$column_name ) ? $item->$column_name : '';
            }
        }

        public function column_name( $item ) {
            $actions = [];

            # Here is some problem in the video can't see the code at the time 23.29
            $actions['edit'] = sprintf( '<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=wedevs-academy&action=edit&id=' . $item->id ), $item->id, __( 'Edit', 'wedevs-academy' ), __( 'Edit', 'wedevs-academy' ) );
            $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=wd-ac-delete-address&id=' . $item->id ), 'wd-ac-delete-address' ), $item->id, __( 'Delete', 'wedevs-academy' ), __( 'Delete', 'wedevs-academy' ) );
            return sprintf(
              '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=wedevs-academy&action=view&id' . $item->id ), $item->name, $this->row_actions( $actions )
            );
        }

        protected function column_cb( $item ) {
            return sprintf(
                '<input type="checkbox" name="address_id[]" value="%d" />', $item->id
            );
        }

        public function prepare_items() {
            $column                 = $this->get_columns();
            $hidden                 = [];
            $sortable               = $this->get_sortable_columns();


            $this->_column_headers  = [ $column, $hidden, $sortable ];

            $per_page               = 5;
            $current_page           = $this->get_pagenum();
            $offset                 = ( $current_page - 1 ) * $per_page;

            $args = [
                'number' => $per_page,
                'offset' => $offset,
            ];

            if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
                $args['orderby']    = $_REQUEST['orderby'];
                $args['order']      = $_REQUEST['order'];
            }

            $this->items            = wd_ac_get_addresses( $args );
            $this->set_pagination_args([
                'total_items'       => wd_ac_address_count(),
                'per_page'          => $per_page,
            ]);
        }
    }