<?php 

namespace Wedevs\Academy;

class Admin{

    public function __construct(){
        $addressbook = new Admin\Addressbook();

        new Admin\Menu( $addressbook );

        $this->dispatch_actions( $addressbook );
    }

    public function dispatch_actions( $addressbook ){
        add_action( 'admin_init', [ $addressbook, 'form_handler' ]);
        add_action( 'admin_post_wd-ac-delete-address', [ $addressbook, 'delete_address' ]);
    }


}