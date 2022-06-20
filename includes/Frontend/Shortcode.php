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
        return 'Hello from shortcode';
    }
 }