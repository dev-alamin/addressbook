<?php 

namespace Wedevs\Academy\Frontend;

/**
 * Shortcode handler
 */

 class Shortcode {

    public function __construct()
    {
        add_shortcode( 'wedevs-academy', [ $this, 'render_shortcode' ]);
    }

    /**
     * Shortcode handler class
     * 
     * @param array $atts
     * @param string $content
     */

    public function render_shortcode( $atts, $content = '' ){
        wp_enqueue_style( 'academy-style' );
        wp_enqueue_script( 'academy-script' );
        return '<div class="academy-shortcode">Hello from shortcode</div>';
    }
 }