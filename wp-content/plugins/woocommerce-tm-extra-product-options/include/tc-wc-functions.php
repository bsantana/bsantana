<?php
// Direct access security
if (!defined('TM_EPO_PLUGIN_SECURITY')){
	die();
}

if (!function_exists('wc_get_price_decimal_separator')){
    function wc_get_price_decimal_separator() {
        $separator = stripslashes( get_option( 'woocommerce_price_decimal_sep' ) );
        return $separator ? $separator : '.';
    }
}
if (!function_exists('wc_get_price_thousand_separator')){
    function wc_get_price_thousand_separator() {
		$separator = stripslashes( get_option( 'woocommerce_price_thousand_sep' ) );
		return $separator;
	}
}
?>