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
    function send_coupom_order_status_completed( $order_id ) {
    //error_log( "Order complete for order $order_id", 0 );
    	print_r($order_id);
		echo "completeddddddddddd";
	}

	//exit;
	add_action( 'woocommerce_order_status_completed', 'send_coupom_order_status_completed', 10, 1 );

	add_action( 'woocommerce_thankyou', 'your_wc_autocomplete_order' );

	function your_wc_autocomplete_order( $order_id ) {

	 if ( ! $order_id ) {
	   return;
	 }
	 print($order_id);
	 echo "thankyou";

	 //	$order = wc_get_order( $order_id );
	 $order = new WC_Order( $order_id );
	 //print_r($order->user_id);
	 $user 		 = $order->get_user();
	 $user_id 	 = $user->ID;
	 $user_email = $user->user_email;
	 echo 'IDDDDDDDDD:';
	 print_r($user_id);
	 print_r($user_email);
	 print_r($order->get_used_coupons());
	 echo 'separacaaaaaaaaaaaaaaaaaaaaao';
	 echo '<br>';
	 $products = $order->get_items();
	 /*foreach ( $products as $item ) {
  		// This will be a product
  		echo 'from item:';
  		$product = $order->get_product_from_item( $item );
  		print_r($product);
  
  	echo 'get sku:';
  		// This is the products SKU
		$sku = $product->get_sku();
		print_r($sku);
		
		echo 'qnty profissio:';
		// This is the qty purchased
		$qty = $item['qty'];
		print_r($qty);
		/*foreach ( $item as $item_data ) {
			echo 'item release:';
			echo '<pre>';
			print_r($item_data);
			echo $item_data;
			echo '</pre>';
		}*/
		//$orderr = wc_get_order( $order_id );
	  foreach ($order->get_items() as $item_id => $item_obj) {
	  		echo 'aqui: ';
	  		echo $order_id;
	         $kua = $item_obj->get_meta_data();
	         $data = wc_get_order_item_meta( $item_id, '_tmcartepo_data' );
	         echo '<pre>';
	          print_r($data);
	          if ($data[0]['value'] == "Mensal") {
	          	echo 'foi';
	          	echo $data[2]['quantity'];
	          }


	  }

	/*	echo 'item release:';
		echo '<pre>';
		print_r($item);
		echo '</pre>';
		
		
		echo 'line total:';
		// Line item total cost including taxes and rounded
		$total = $order->get_line_total( $item, true, true );
		print_r($order->get_meta());
		echo 'line subtotal:';
		// Line item subtotal (before discounts)
		$subtotal = $order->get_line_subtotal( $item, true, true );
		print_r($order->get_meta_data());
	}*/

	 
	 echo '<pre>';
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

	function woo_email_order_coupons( $order_id ) {
        $order = new WC_Order( $order_id );
        
        if( $order->get_used_coupons() ) {
        
          $to = 'youremail@yourcompany.com';
	        $subject = 'New Order Completed';
	        $headers = 'From: My Name <youremail@yourcompany.com>' . "\r\n";
	        
	        $message = 'A new order has been completed.\n';
	        $message .= 'Order ID: '.$order_id.'\n';
	        $message .= 'Coupons used:\n';
	        
	        foreach( $order->get_used_coupons() as $coupon) {
		        $message .= $coupon.'\n';
	        }
	        @wp_mail( $to, $subject, $message, $headers );
        }
	}
	//add_action( 'woocommerce_thankyou', 'woo_email_order_coupons' ); Funçao para mudar status do cupom após ele ser utilizado

 
	// add_action( 'woocommerce_email_before_order_table', 'add_content', 20 ); adicionando contéudo ao email de ordem na página de agradecimento
	 
	function add_content() {
	echo '<h2 id="h2thanks">Get 20% off</h2><p id="pthanks">Thank you for making this purchase! Come back and use the code "<strong>Back4More</strong>" to receive a 20% discount on your next purchase! Click here to continue shopping.</p>';
	}
}