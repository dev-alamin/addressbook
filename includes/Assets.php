<?php 

namespace Wedevs\Academy;


/**
 * Assets handler class
 */

 class Assets {

    function __construct() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assests']);
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assests']);
    }

    public function get_scripts( ) {
        return [
            'academy-script' => [
                'src' => WD_ACADEMY_ASSETS . '/js/frontend.js',
                'version' => WD_ACADEMY_PATH . '/assets/js/frontend.js',
                'deps' => ['jquery']
            ]
        ];
    }

    public function get_style( ) {
        return [
            'academy-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version' => WD_ACADEMY_PATH . '/assets/js/frontend.css'
            ],

            'academy-admin-style' => [
                'src' => WD_ACADEMY_ASSETS . '/css/admin.css',
                'version' => WD_ACADEMY_PATH . '/assets/js/admin.css'
            ]
        ];
    }


    public function enqueue_assests() {

        $scripts = $this->get_scripts();

        foreach($scripts as $handle => $script ){
            $deps = isset( $script['version']) ? $script['version'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }


        $styles = $this->get_style();

        foreach($styles as $handle => $style ){
            $deps = isset( $style['deps']) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

    }
 }