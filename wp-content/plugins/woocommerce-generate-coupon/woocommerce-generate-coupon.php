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

/*

1 - Cupom gerado após o cadastro de ordem de pagamento com quantidade de meses que o cliente contratou que é igual a quantidade que o cupom pode ser utilizado
	1.1 - Falta definir data de expiração "metadata" -> $used = true; else: $used = false;
1.2 - 
2 - Email com cupom enviado após a confirmação por parte do administrador do sistema
	3 - Excluir cupom caso o administrador do sistema cancele a ordem

*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function send_coupom_order_status_completed( $order_id ) {
    	// Regra para enviar cupom personalizado aqui após ter sido criado
    	// Verifica se existe cupom associado a ordem
    	$order = new WC_Order( $order_id );
    	$user_email = $order->get_user()->user_email;

		global $wpdb;
		$coupon_order = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_parent = {$order_id}" );

		if ($coupon_order) {
			$to = $user_email;
	        $subject = 'New Order Completed';
	        //$headers = 'From: My Name <youremail@yourcompany.com>' . "\r\n";
	        
	        $message = "A new order has been completed.\n";
	        $message .= "Order ID: {$order_id} \n";
	        $message .= "Coupons for use:\n";
	        $message .= $coupon_order->post_title;
	        
        	@wp_mail( $to, $subject, $message );
		}

    	
	}
	add_action( 'woocommerce_order_status_completed', 'send_coupom_order_status_completed', 10, 1 );

	function your_wc_autocomplete_order( $order_id ) {
		if ( ! $order_id ) return;

		echo "<p style='display: none;'>thankyou</p>";
		$order = new WC_Order( $order_id );
		//print_r($order->get_used_coupons());

		$user_id    = $order->get_user()->ID;
		$user_email = $order->get_user()->user_email;

		foreach ($order->get_items() as $item_id => $item_obj) {
			$data = wc_get_order_item_meta( $item_id, '_tmcartepo_data' );
			//echo '<pre>';
			//print_r($data);
			if ($data[0]['value'] == "Mensal") {
				$qty_mensal += $data[2]['quantity'];
			}
		}

		// Regra para criar cupom personalizado aqui
		//echo "Enviar email quantidade mensal: " . $qty_mensal;
		if ($qty_mensal >= 1) {
			$coupon_code = "{$user_id}-{$order_id}"; // Code
			$discount = '100'; // Desconto
			$discount_type = 'percent_product'; // Type: fixed_cart, percent, fixed_product, percent_product
			//$expiry_date = '2017-10-11';
								
			$coupon = array(
				'post_title' => $coupon_code,
				'post_content' => '',
				'post_name' => $coupon_code,
				'post_parent' => $order_id,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_type'		=> 'shop_coupon'
			);

			// Verifica se existe cupom associado a ordem
			global $wpdb;
			$coupon_order = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_parent = {$order_id}" );

			if (!$coupon_order) {
				$new_coupon_id = wp_insert_post( $coupon );

				// Add meta
				update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
				update_post_meta( $new_coupon_id, 'coupon_amount', $discount );
				update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
				update_post_meta( $new_coupon_id, 'product_ids', '3090,3000,2989,2985,2181,9673,9938' );
				update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
				update_post_meta( $new_coupon_id, 'usage_limit', $qty_mensal );
				update_post_meta( $new_coupon_id, 'expiry_date', $expiry_date ); // data de expiração
				update_post_meta( $new_coupon_id, 'limit_usage_to_x_items', '1' ); // data de expiração
				update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
				update_post_meta( $new_coupon_id, 'maximum_amount', '300' );
				update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
			}
		}
	}
	add_action( 'woocommerce_thankyou', 'your_wc_autocomplete_order' );

	function testando_er( $err, $err_code, $this ) {
		return 'meu erro';
	}
	
	function coupon_always_valid($valid, $coupon){
		 $to = 'jaci.bruno@russelservicos.com.br';
        $subject = 'New Order Completed';
        //$headers = 'From: My Name <youremail@yourcompany.com>' . "\r\n";
        
        $message = "A new order has been completed.\n";
        $message .= "Order ID: {$order_id} - {$valid} - {$coupon} - {$intt} \n";
        $message .= "Coupons for use:\n";
        $message .= $coupon_order->post_title;
        
    	@wp_mail( $to, $subject, $message );
    	if (1 == 2) {
    		add_filter('woocommerce_coupon_error', 'testando_er');
    		$valid = false;
    	} else {
    		$valid = true;
    	}
    	
    	$error_code = WC_Coupon::E_WC_COUPON_MAX_SPEND_LIMIT_MET;
    	$coupon->error_message = $coupon->get_coupon_error( $error_code );
    	//apply_filters( 'woocommerce_coupon_error', '$err', 200, null );
    	//wc_add_notice( '$msg', 'error' );
		return $valid;
    	//die();

	}
	add_filter('woocommerce_coupon_is_valid','coupon_always_valid',99,2);
	//add_filter( 'woocommerce_coupon_code', 'woocommerce_coupon_code_no_discount', 10, 1 );
	function woocommerce_coupon_code_no_discount($coupon_code){
		return ''; // return anything that is not a coupon code...
	}
	
	function apply_product_on_coupon( $array, $int, $intt ) {
	    global $woocommerce;
	    $coupon_id = '9-13976';
	    $free_product_id = 54321;
	    

	    $to = 'jaci.bruno@russelservicos.com.br';
        $subject = 'New Order Completed';
        //$headers = 'From: My Name <youremail@yourcompany.com>' . "\r\n";
        
        $message = "A new order has been completed.\n";
        $message .= "Order ID: {$order_id} - {$array} - {$int} - {$intt} \n";
        $message .= "Coupons for use:\n";
        $message .= $coupon_order->post_title;
        die();
    	@wp_mail( $to, $subject, $message );
    	
	    if(in_array($coupon_id, $woocommerce->cart->applied_coupons)){
	        $woocommerce->cart->add_to_cart($free_product_id, 1);
	    }
	}
	//add_action('woocommerce_applied_coupon', 'apply_product_on_coupon');

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
	//add_action( 'woocommerce_payment_complete', 'so_payment_complete' );

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