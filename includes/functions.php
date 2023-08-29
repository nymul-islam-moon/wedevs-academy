<?php

    /**
     * Insert a new address
     * @param array $args
     * @return int|WP_Error
     */
    function wd_ac_insert_address($args = [])
    {
        global $wpdb;

        if (empty($args['name'])) {
            return new \WP_Error('no-name', __('You must provide a name', 'wedevs-academy'));
        }

        $defaults = [
            'name' => '',
            'address' => '',
            'phone' => '',
            'created_at' => current_time('mysql'),
            'created_by' => get_current_user_id(),
        ];

        $data = wp_parse_args($args, $defaults);

        $inserted = $wpdb->insert(
            "{$wpdb->prefix}ac_addresses",
            $data,
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s'
            ]
        );

        if (!$inserted) {
            return new \WP_Error('failed-to-insert', __('Failed to insert data', 'wedevs_academy'));
        }

        return $wpdb->insert_id;

    }

    /**
     * Fetch Addresses
     * @param $args
     * @return array|object|stdClass[]|null
     */
    function wd_ac_get_addresses($args = [])
    {
        global $wpdb;

        $defaults = [
            'number' => 20,
            'offset' => 0,
            'order_by' => 'id',
            'order' => 'ASC'
        ];

        $args = wp_parse_args($args, $defaults);

        $items = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}ac_addresses ORDER BY {$args['order_by']} {$args['order']} LIMIT %d, %d", $args['offset'], $args['number']
            )
        );

        return $items;
    }

    /**
     * Get the count of total addresses
     * @return int
     */
    function wd_ac_address_count()
    {
        global $wpdb;

        return (int)$wpdb->get_var("SELECT count(id) FROM {$wpdb->prefix}ac_addresses");
    }

    /**
     * Fetch single contact form the DB
     * @param int $id
     * @return object
     */
    function wd_ac_get_address( $id ) {
        global $wpdb;

        return $wpdb->get_row(
            $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}ac_addresses WHERE `id` = %d", $id )
        );
    }


    function wd_ac_delete_address( $id ) {
        global $wpdb;

        return $wpdb->delete();
    }