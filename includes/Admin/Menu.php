<?php 

namespace Wedevs\Academy\Admin;

/**
 * The Menu handler class
 */
class Menu{

    public $addressbook;

    public function __construct( $addressbook ){
        $this->addressbook = $addressbook;
        add_action('admin_menu', [ $this, 'admin_menu'] );
    }

    public function admin_menu(){
        $parent_slug = 'wedevs-academy';
        $capability  = 'manage_options';

        add_menu_page(__( 'weDevs Academy', 'wedevs-academy' ), __( 'Academy', 'wedevs-academy'), 'manage_options', $parent_slug, [ $this->addressbook, 'plugin_page'], 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __('Address Book', 'wedevs-academy'), __( 'Address Book', 'wedevs-academy'), $capability, $parent_slug , [ $this->addressbook, 'plugin_page' ]);
        add_submenu_page( $parent_slug, __('Settings', 'wedevs-academy'), __( 'settings', 'wedevs-academy'), $capability, 'wedevs-academy-settings' , [ $this, 'settings_page' ]);

    }

    /**
     * Settings page forntend render func
     *
     * @return void
     */

    public function settings_page(){
        echo 'Hello from settings page'; 
    }
}

/**
 * Please create an A record in your Cloudflare account with Name: hab.almn.me
* IP address: 68.65.122.169.
 */