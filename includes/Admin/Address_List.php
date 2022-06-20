<?php 
namespace Wedevs\Academy\Admin;

if( ! class_exists( 'WP_List_Table' )){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List Table Class
 */

 class Address_List extends \WP_List_Table {

    function __construct(){
        parent::__construct( [
            'singular' => 'contact',
            'plural' => 'contacts',
            'ajax' => false,
        ] );
    }

    public function get_columns(){
        return [
            'cb' => '<input type="checkbox" />',
            'name' => __( 'Name', 'wedevs-academy' ),
            'address' => __( 'Address', 'wedevs-academy' ), 
            'phone' => __( 'Phone', 'wedevs-academy' ), 
            'date' => __( 'Date', 'wedevs-academy' ), 
        ];
    }

    /**
     * Get sortable columns
     * 
     * @return array
     */

    function get_sortable_columns() {
        $sortable_columns = [
            'name' => [ 'name', true ],
            'created_at' => [ 'created_at', true ]
        ];

        return $sortable_columns;
    }

    protected function column_default( $item, $column_name ){

        switch( $column_name ){
            case 'value':
                break;

                default:
                return isset( $item->$column_name) ? $item->$column_name : '';
        }
    }

    public function column_name( $item ){
        $actions = [];

        $actions['edit'] = sprintf('<a href="%s" title="%s">%s</a>', admin_url( 'admin.php?page=wedevs-academy&action=edit&id=' . $item->id), $item->id, __('Edit', 'wedevs-academy'), __( 'Edit', 'wedevs-academy' ) );
        $actions['delete'] = sprintf('<a onclick="return confirm(\'Are you sure?\');" class="submitdelete" href="%s" title="%s">%s</a>', wp_nonce_url( admin_url( 'admin-post.php?action=wd-ac-delete-address&id=' . $item->id ), 'wd-ac-delete-address' ), $item->id, __( 'Delete', 'wedevs-academy' ), __( 'Delete', 'wedevs-academy' ) );

        return sprintf(
            '<a href="%1s"> <strong>%2s</strong></a> %3$s', admin_url( 'admin.php?page=wedevs-academy&action=view&id' . $item->id), $item->name, $this->row_actions( $actions )
        );
    }

    public function column_cb( $item )
    {   
        return sprintf(
            '<input type="checkbox" name="address_id[]" value="%d" />', $item->id
        );
    }

    public function preapre_items(){
        $column = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [ $column, $hidden, $sortable ];

        $per_page = 20;
        $current_page = $this->get_pagenum();
        $offset = ( $current_page - 1 ) * $per_page;

        $args = [
            'number' => $per_page,
            'offset' => $offset
        ];

        if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order']   = $_REQUEST['order'] ;
        }

        $this->items = wd_ac_get_addresses( $args );

        $this->set_pagination_args( [
            'total_items' => wd_ac_get_address_count(),
            'per_page' => $per_page
        ] );
    }
 }