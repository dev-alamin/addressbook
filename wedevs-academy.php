<?php

/**
 * Plugin Name: weDevs Academy
 * Plugin URI:  https:almn.me/wp/plugin/wedevs-academy
 * Description: This is a practice plugin with tareq vai.
 * Version:     1.0
 * Author:      Al amin
 * Author URI:  https://almn.me
 * Text Domain: wedevs
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     weDevs
 * @author      Al amin
 * @copyright   2022 wedevs
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      weDevs
 */

use Wedevs\Academy\Admin\Menu;

defined('ABSPATH') || die('No script kiddies please!');

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */

final class WeDevs_Academy
{

    // Define constant
    const version = '1.0';

    /**
     * Class constructor
     */

    private function __construct(){
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate']);

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \WeDevs_Academy
     */
    public static function init(){
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    public function define_constants()
    {
        define( 'WD_ACADEMY_VERSION', self::version );
        define( 'WD_ACADEMY_FILE', __FILE__ );
        define( 'WD_ACADEMY_PATH', __DIR__ );
        define( 'WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE) );
        define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
    }

    public function init_plugin(){

        new \Wedevs\Academy\Assets();

        if( is_admin() ){
            new Wedevs\Academy\Admin();
        }else{
            // Do stuff for frontend
            new \Wedevs\Academy\Frontend();
        }

    }

    /**
     * Do actions upon plugin activation 
     */

    public function activate(){
      $installer = new \Wedevs\Academy\Installer();
      $installer->run();
    }
}
/**
 * Initializes the main plugin
 * @return \WeDevs_Academy
 */

function wedevs_academy(){
    return wedevs_academy::init();
}
// kick-off the plugin
wedevs_academy();
