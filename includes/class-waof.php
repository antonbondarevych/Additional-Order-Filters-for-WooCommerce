<?php

/**
 * Additional Order Filters for WooCommerce / Main Class
 *
 * @package   Additional Order Filters for WooCommerce
 * @author    Anton Bond facebook.com/antonbondarevych
 * @license   GPL-2.0+
 * @link      http://woocommerce.com/
 * @copyright 2021 WooCommerce
 * @since     1.11
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * AOF Main options Class
 *
 * @package  Additional Order Filters for WooCommerce
 * @author   Anton Bond facebook.com/antonbondarevych
 * @since    1.11
 */

class AOF_Woo_Additional_Order_Filters {

	function __construct() {
		add_action( 'admin_menu', array( $this,'woaf_add_plugin_settings_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'woaf_admin_styles_and_scripts' ) );
	}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function woaf_add_plugin_settings_page() {
		add_action( 'admin_init', array( $this, 'woaf_load_textdomain' ) );
	}

	function woaf_load_textdomain() {
		load_plugin_textdomain( 'woaf-plugin', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
	}

	function woaf_admin_styles_and_scripts( $page ) {
		global $typenow;

		if ( $typenow == 'shop_order' || $page == 'toplevel_page_additional-order-filters-woocommerce' || $page = 'order-filters_page_сustom-additional-order-filters' ) {
			wp_enqueue_style( 'woaf_admin_styles', plugins_url( 'assets/css/woaf-admin.css', dirname( __FILE__ ) ) );
		}

		if ( $typenow == 'shop_order' ) {
			wp_enqueue_script( 'woaf_admin_scripts', plugins_url( 'assets/js/woaf-admin-filters.js', dirname( __FILE__ ) ) );
		}
		if ( $page == 'toplevel_page_additional-order-filters-woocommerce' || $page = 'order-filters_page_сustom-additional-order-filters' ) {
			wp_enqueue_script( 'woaf_admin_scripts', plugins_url( 'assets/js/woaf-admin-options.js', dirname( __FILE__ ) ) );
		}

	}
}

new AOF_Woo_Additional_Order_Filters();