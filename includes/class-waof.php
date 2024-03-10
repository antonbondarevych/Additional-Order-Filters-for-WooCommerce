<?php

/**
 * Additional Order Filters for WooCommerce / Main Class
 *
 * @package   Additional Order Filters for WooCommerce
 * @author    Anton Bond facebook.com/antonbondarevych
 * @license   GPL-2.0+
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
		add_action( 'plugins_loaded', array( $this, 'woaf_load_textdomain' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'woaf_admin_styles_and_scripts' ) );
	}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function woaf_load_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), WOAF_PLUGIN_DOMAIN );
		load_textdomain( WOAF_PLUGIN_DOMAIN, trailingslashit( WP_LANG_DIR ) . WOAF_PLUGIN_DOMAIN . '/' . WOAF_PLUGIN_DOMAIN . '-' . $locale . '.mo' );
		load_plugin_textdomain( 'woaf-plugin', false, WOAF_PLUGIN_DOMAIN . '/languages/' );
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
			wp_set_script_translations( 'woaf_admin_scripts', 'woaf-plugin', WOAF_PLUGIN_DIR . '/languages/' );
		}

		if ( $page = 'order-filters_page_сustom-additional-order-filters' ) {
			wp_enqueue_script( 'woaf_select2_script', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js' );
			wp_enqueue_style( 'woaf_select2_styles', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
		}

	}
}

new AOF_Woo_Additional_Order_Filters();