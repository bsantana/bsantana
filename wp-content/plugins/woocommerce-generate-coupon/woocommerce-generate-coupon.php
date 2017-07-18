<?php
/**
 * Plugin Name: Cupom Personalizado
 * Description: Gera cupom automaticamente e encaminha via email para o usuário
 * Author: Jaci Felicio
 * Author URI: http://jfelicio.com/
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function mysite_woocommerce_order_status_completed( $order_id ) {
    error_log( "Order complete for order $order_id", 0 );
	}
	print($order_id);
	echo "completed";
	//exit;
	add_action( 'woocommerce_order_status_completed', 'mysite_woocommerce_order_status_completed', 10, 1 );

	add_action( 'woocommerce_thankyou', 'your_wc_autocomplete_order' );

	function your_wc_autocomplete_order( $order_id ) {

	 if ( ! $order_id ) {
	  // return;
	 }
	 print($order_id);
	 echo "thankyou";

	 //	$order = wc_get_order( $order_id );
	 $order = new WC_Order( $order_id );
	 //print_r($order->user_id);
	 $user = $order->get_user();
	 print_r($user);
	 echo 'separacaaaaaaaaaaaaaaaaaaaaao';
	 $products = $order->get_items();
	 print_r($products);
	 //$order->update_status( 'completed' );

	}

	add_action( 'woocommerce_payment_complete', 'so_payment_complete' );
	function so_payment_complete( $order_id ){
	    $order = wc_get_order( $order_id );
	    $user = $order->get_user();
	    $products = $order->get_items();
	    echo "payment complete";
	    print_r($order);
	    print_r($products);
	    if( $user ){
	        // do something with the user
	    }
	}
}