<?php
namespace WeDevs\Academy;

/**
 *  Assets handlers class
 */
class Assets {
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }


    public function get_scripts() {
        return [
            'academy-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/frontend.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js' ),
                'deps' => [ 'jquery' ]
            ],

            'academy-admin-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/admin.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/admin.js' ),
            ],

            'academy-enquiry-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/enquiry.js',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/js/enquiry.js' ),
                'deps' => [  ]
            ],


        ];
    }

    public function get_styles() {
        return [
            'academy-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/frontend.css' ),
            ],

            'academy-admin-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/admin.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/admin.css' ),
            ],

            'academy-enquiry-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/enquiry.css',
                'version' => filemtime( WD_ACADEMY_PATH . '/assets/css/enquiry.css' ),
            ]
        ];
    }

    /**
     * @return void
     */
    public function register_assets() {

        $scripts = $this->get_scripts();
        $styles = $this->get_styles();

        foreach ( $scripts as $key=> $script ) {
            $deps = isset( $script[ 'deps' ] ) ? $script[ 'deps' ] : false;
            wp_register_script( $key, $script[ 'src' ], $deps, $script[ 'version' ], true );
        }

        foreach ( $styles as $key=> $style ) {
            $deps = isset( $style[ 'deps' ] ) ? $style[ 'deps' ] : false;
            wp_register_style( $key, $style[ 'src' ], $deps, $style[ 'version' ], false );
        }

        wp_localize_script( 'academy-enquiry-script', 'weDevsAcademy', [
            'ajaxurl'   => admin_url( 'admin-ajax.php' ),
            'error'     => __( 'Something went wrong', 'wedevs-academy' ),
        ] );

    }

}