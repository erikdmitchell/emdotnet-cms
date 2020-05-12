<?php
/**
 * Plugin Name:     EMdotNet CMS
 * Plugin URI:      http://erikdmitchell.net
 * Description:     Helps power the EMdotNet site.
 * Author:          Erik Mitchell
 * Author URI:      http://erikdmitchell.net
 * Text Domain:     emdotnet-cms
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         emdotnet_cms
 */
 
 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! defined( EMDOTNET_CMS_PLUGIN_FILE' ) ) {
    define( 'EMDOTNET_CMS_PLUGIN_FILE', __FILE__ );
}

// Include the main Boomi_CMS class.
if ( ! class_exists( 'Boomi_CMS' ) ) {
    include_once dirname( __FILE__ ) . '/class-emdotnet-cms.php';
}