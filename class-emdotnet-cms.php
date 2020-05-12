<?php
/**
 * EMdotNet CMS class
 *
 * @package emdotnet_cms
 * @since   0.1.0
 */

/**
 * Final EMdotNet_CMS class.
 *
 * @final
 */
final class EMdotNet_CMS {

    /**
     * Version
     *
     * (default value: '0.1.0')
     *
     * @var string
     * @access public
     */
    public $version = '0.1.0';

    /**
     * _instance
     *
     * (default value: null)
     *
     * @var mixed
     * @access protected
     * @static
     */
    protected static $_instance = null;

    /**
     * Instance function.
     *
     * @access public
     * @static
     * @return instance
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Construct class.
     *
     * @access public
     * @return void
     */
    public function __construct() {
        $this->define_constants();
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Define constants.
     *
     * @access private
     * @return void
     */
    private function define_constants() {
        $this->define( 'EMDOTNET_CMS_VERSION', $this->version );
        $this->define( 'EMDOTNET_PATH', plugin_dir_path( __FILE__ ) );
        $this->define( 'EMDOTNET_URL', plugin_dir_url( __FILE__ ) );
        $this->define( 'EMDOTNET_BASE', plugin_basename( BOOMI_CMS_PLUGIN_FILE ) );
    }

    /**
     * Custom define function.
     *
     * @access private
     * @param mixed $name string.
     * @param mixed $value string.
     * @return void
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }

    /**
     * Include plugin files.
     *
     * @access public
     * @return void
     */
    public function includes() {
        include_once( BOOMI_PATH . 'admin/class-boomi-cms-admin.php' );

    }

    /**
     * Init hooks for plugin.
     *
     * @access private
     * @return void
     */
    private function init_hooks() {
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts_styles' ) );
        add_action( 'init', array( $this, 'init' ), 0 );
        add_action( 'init', array( $this, 'load_includes' ), 0 );
    }

    /**
     * Init function.
     *
     * @access public
     * @return void
     */
    public function init() {}

    /**
     * Frontend scripts and styles.
     *
     * @access public
     * @return void
     */
    public function frontend_scripts_styles() {}

    /**
     * Load includes.
     *
     * @access public
     * @return void
     */
    public function load_includes() {
        $dirs = array( 'post-types' );

        foreach ( $dirs as $dir ) :
            foreach ( glob( BOOMI_PATH . $dir . '/*.php' ) as $file ) :
                include_once( $file );
            endforeach;
        endforeach;
    }

    /**
     * Add links to plugin action.
     *
     * @access public
     * @param mixed $links array.
     * @return array
     */
    public function plugin_action_links( $links ) {
        $links[] = sprintf( '<a href="%s" target="_blank">%s</a>', 'https://github.com/erikdmitchell/emdotnet-cms', __( 'GitHub', 'emdotnet-cms' ) );

        return $links;
    }

}

/**
 * EMdotNet CMS function.
 *
 * @access public
 * @return instance
 */
function emdotnet_cms() {
    return EMdotNet_CMS::instance();
}

// Global for backwards compatibility.
$GLOBALS['emdotnet_cms'] = emdotnet_cms();