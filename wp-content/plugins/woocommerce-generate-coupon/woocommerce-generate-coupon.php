<?php
/**
 * Plugin Name: Cupom Automatizado
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
    	$user_name = $order->get_user()->display_name;

		global $wpdb;
		$coupon_order = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_parent = {$order_id} AND post_type = 'shop_coupon'" );

		if ($coupon_order) {
			$wpdb->query( $wpdb->prepare( 
				"
				UPDATE $wpdb->posts 
				SET post_status = %s
				WHERE post_parent = %d
					AND post_type = %s
					AND post_status = %s
				",
			        'publish', $order_id, 'shop_coupon', 'draft'
			) );

			//$to = $user_email;
			$to = 'jaci.bruno@russelservicos.com.br';
	        $subject = 'Cupom de Diária Gratuita';
	        //$headers = 'From: My Name <youremail@yourcompany.com>' . "\r\n";
	        $headers = "Content-Type: text/html; charset=UTF-8\r\n";
	        //$message = "A new order has been completed.\n";
	        //$message .= "Order ID: {$order_id} \n";
	        //$message .= "Coupons for use:\n";
	        //$message .= $coupon_order->post_title;
	        /*$message = "Olá {$user_name},
	        <img src='...'>
			Estamos felizes com a contratação no Plano Mensal Russel Hora Mais e esperamos que tire o máximo de proveito. Um dos diferenciais da realização de contratação em nosso plano é o bônus que você recebe em Diárias Gratuitas. Ao contratar qualquer profissional no plano mensal você ganha 1 diária gratuita por mês de contratação;

			Segue abaixo o seu CUPOM para utilização do benefício de DIÁRIA GRATUITA. 

			CÓDIGO DO CUPOM DE DIÁRIA GRATUITA:  {$coupon_order->post_title}

			Para saber mais detalhes sobre as regras de utilização dos benefícios do Russel Hora Mais, clique aqui.
			";*/
			$message = '<div style="width: 600px;margin: auto;margin-bottom: 20px;"><img style="margin: auto;display: block;" src="https://www.russelservicos.com.br/wp-content/uploads/2017/08/LOGO-RUSSEL-EMAIL.png"></div><table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;margin: auto;">
<tbody><tr>
<td align="center" valign="top">
                                    <!-- Header -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #cd1f25; border-radius: 3px 3px 0 0 !important; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><tbody><tr>
<td id="header_wrapper" style="padding: 36px 48px; display: block;">
                                            	<h1 style="color: #ffffff; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: center; text-shadow: 0 1px 0 #d74c51; -webkit-font-smoothing: antialiased;">Cupom de Diária Gratuita</h1>
                                            </td>
                                        </tr></tbody></table>
<!-- End Header -->
</td>
                            </tr>
<tr>
<td align="center" valign="top">
                                    <!-- Body -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body"><tbody><tr>
<td valign="top" id="body_content" style="background-color: #fdfdfd;">
                                                <!-- Content -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
<td valign="top" style="padding: 0px;">
                                                            <div id="body_content_inner" style="color: #737373; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;">
<p style="margin: 0 0 16px;padding: 48px 48px 0 48px;">Olá '.$user_name.',<br><br>
	        
			Estamos felizes com a contratação no Plano Mensal Russel Hora Mais e esperamos que tire o máximo de proveito. Um dos diferenciais da realização de contratação em nosso plano é o bônus que você recebe em Diárias Gratuitas. <br><br><b>Ao contratar qualquer profissional no plano mensal você ganha 1 diária gratuita por mês de contratação.</b><br><br>

			Segue abaixo o seu CUPOM para utilização do benefício de DIÁRIA GRATUITA. <br><br>
			<div style="position: relative;padding: 0 48px;text-align: center;">
			<p style="background: #cd1f25;padding: 15px;margin: 0;color: #fff;font-size: 18px;"><b>CÓDIGO DO CUPOM:</b></p>
			<p style="border: 2px dashed #cd1f25;margin: 0;right: 21.4%;top: 28%;color: #cd1f25;font-size: 30px;padding: 16px;background: #fff;border-radius: 3px;">'.$coupon_order->post_title.'</p>
			</div><br>

			<p style="padding: 0 48px 48px 48px;">Para saber mais detalhes sobre as regras de utilização dos benefícios do Russel Hora Mais e de como utilizar o seu cupom, <a href="https://www.russelservicos.com.br/plano-mensal-russel-hora-mais/">clique aqui</a>.</p>
															</div>
														</td>
                                                    </tr></tbody></table>
<!-- End Content -->
</td>
                                        </tr></tbody></table>
<!-- End Body -->
</td>
                            </tr>
<tr style="display: none;">
<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer"><tbody><tr>
<td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #e1797c; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;">
                                                        	<p class="title-email">Russel Serviços</p>
<p><a href="http://www.russelservicos.com.br/termos-e-condicoes/" style="color: #cd1f25; font-weight: normal; text-decoration: underline;">Clique aqui e leia os Termos e Condições do serviço contratado acima.</a></p>
                                                        </td>
                                                    </tr></tbody></table>
</td>
                                        </tr></tbody></table>
<!-- End Footer -->
</td>
                            </tr>
</tbody></table>';
	        
        	@wp_mail( $to, $subject, $message, $headers );
		}

    	
	}
	add_action( 'woocommerce_order_status_completed', 'send_coupom_order_status_completed', 10, 1 );

	function delete_coupon( $order_id ) {
		global $wpdb;

		$wpdb->query( $wpdb->prepare( 
			"
			UPDATE $wpdb->posts 
			SET post_status = %s
			WHERE post_parent = %d
				AND post_type = %s
			",
		        'trash', $order_id, 'shop_coupon'
		) );
	}

	add_action('woocommerce_order_status_refunded', 'delete_coupon');
	add_action('woocommerce_order_status_cancelled', 'delete_coupon');

	function your_wc_autocomplete_order( $order_id ) {
		if ( ! $order_id ) return;

		global $wpdb;

		$order = new WC_Order( $order_id );

		$user_id    = $order->get_user()->ID;
		$user_email = $order->get_user()->user_email;
		$title_coupon = $order->get_used_coupons()[0];

		foreach ($order->get_items() as $item_id => $item_obj) {
			$data = wc_get_order_item_meta( $item_id, '_tmcartepo_data' );

			if ($data[0]['value'] == "Mensal") {
				$qty_mensal += $data[2]['quantity'];
			}
		}

		// Regra para criar cupom personalizado aqui
		//echo "Enviar email quantidade mensal: " . $qty_mensal;
		if ($qty_mensal >= 1) {
			$coupon_code = "{$user_id}-{$order_id}/".rand($user_id, $order_id); // Code
			$discount = '100'; // Desconto
			$discount_type = 'percent_product'; // Type: fixed_cart, percent, fixed_product, percent_product
			//$expiry_date = '2017-10-11';
								
			$coupon = array(
				'post_title' => $coupon_code,
				'post_content' => '',
				'post_name' => $coupon_code,
				'post_parent' => $order_id,
				'post_status' => 'draft', // status: publish - publicado, draft - rascunho, trash - lixeira
				'post_author' => 1,
				'post_type'		=> 'shop_coupon'
			);

			// Verifica se existe cupom associado a ordem
			$coupon_order = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_parent = {$order_id} AND post_type = 'shop_coupon'" );

			if (!$coupon_order) {
				$new_coupon_id = wp_insert_post( $coupon );

				// Add meta
				update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
				update_post_meta( $new_coupon_id, 'coupon_amount', $discount );
				update_post_meta( $new_coupon_id, 'individual_use', 'yes' );
				update_post_meta( $new_coupon_id, 'product_ids', '3090,3000,2989,2985,2181,9673,9938' );
				update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
				update_post_meta( $new_coupon_id, 'usage_limit', $qty_mensal );
				update_post_meta( $new_coupon_id, 'usage_count', '0' );
				update_post_meta( $new_coupon_id, 'expiry_date', $expiry_date ); // data de expiração
				//update_post_meta( $new_coupon_id, 'date_expires', $expiry_date ); // data de expiração novo meta
				update_post_meta( $new_coupon_id, 'limit_usage_to_x_items', '1' );
				update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
				update_post_meta( $new_coupon_id, 'maximum_amount', '300' );
				update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
				update_post_meta( $new_coupon_id, 'current_user', $user_id );
				update_post_meta( $new_coupon_id, 'coupon_usage', '0' );
				update_post_meta( $new_coupon_id, 'count_cron', '0' );
			}
		} else {
			// Verifica se existe cupom associado a ordem
			$in_used_coupon = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_title = '{$title_coupon}' AND post_type = 'shop_coupon'" );

			if ($in_used_coupon->post_parent >= 1) {
				update_post_meta( $in_used_coupon->ID, 'coupon_usage', '1' );
			}
			
		}
	}
	add_action( 'woocommerce_thankyou', 'your_wc_autocomplete_order' );

	function error_101() {
		return 'Cupom já utilizado esse mês.';
	}

	function error_102() {
		return 'Você não tem permissão para utilizar esse cupom!';
	}

	function error_103() {
		return 'Alguns produtos que estão no carrinho não se aplicam a esse cupom!';
	}
	
	function coupon_monthly_valid($valid, $coupon){
        $current_user_id = get_current_user_id();
        $coupon_used_meta = get_post_meta($coupon->id, 'coupon_usage', true);
        $coupon_current_user_meta = get_post_meta($coupon->id, 'current_user', true);

    	if ($coupon_used_meta == '1') { // Verifica se o cupom foi utilizado no mês atual
    		add_filter('woocommerce_coupon_error', 'error_101');
    		$valid = false;
    	} else if ($coupon_current_user_meta >= 1 && $coupon_current_user_meta != $current_user_id) { // Verifica se existe o meta para o cupom personalizado e se o usuário que quer utilizar o cupom é o mesmo dono do cupom
    		add_filter('woocommerce_coupon_error', 'error_102');
    		$valid = false;
    	}

    	if ($coupon_current_user_meta >= 1 && $coupon_current_user_meta == $current_user_id && $coupon_used_meta == '0') {
    		global $woocommerce;
	    	$items = $woocommerce->cart->get_cart();

	    	foreach($items as $item => $values) { 
				$_product = $values['data']->post;
				$cart_meta = $values['tmcartepo'];

				if ($cart_meta[0]['value'] != 'Diária' || $cart_meta[1]['value'] != '08 às 18h' || $cart_meta[2]['value'] != 'Dias Úteis') {
					add_filter('woocommerce_coupon_error', 'error_103');
	    			$valid = false;
				}
			}
    	}

		return $valid;
	}
	add_filter('woocommerce_coupon_is_valid','coupon_monthly_valid',99,2);
	
	function verify_status_coupon() {
		global $wpdb;

		$coupon_order = $wpdb->get_results( 
			"
			SELECT * 
			FROM $wpdb->posts
			WHERE post_parent > 0 
				AND post_type = 'shop_coupon'
				AND post_status = 'publish'
			"
		);

		if ( ! empty( $coupon_order ) ) {
			foreach ( $coupon_order as $coupon ) {
				$coupon_used_meta = get_post_meta($coupon->ID, 'coupon_usage', true);
				$coupon_used_count = get_post_meta($coupon->ID, 'usage_count', true);
				$count_cron = get_post_meta($coupon->ID, 'count_cron', true);
				$coupon_used_limit = get_post_meta($coupon->ID, 'usage_limit', true);

				if ( $coupon_used_meta == '1' && $count_cron >= 30 ) { // Verifica se o cupom foi utilizado no mês atual e contou os 30 dias
					update_post_meta( $coupon->ID, 'coupon_usage', '0' );
					update_post_meta( $coupon->ID, 'count_cron', '0' );
				} else if ( $coupon_used_meta == '0' && $count_cron >= 30 ) {
					update_post_meta( $coupon->ID, 'usage_count', $coupon_used_count + 1 );
					update_post_meta( $coupon->ID, 'count_cron', '0' );
				} else if ( $coupon_used_count < $coupon_used_limit ) {
					update_post_meta( $coupon->ID, 'count_cron', $count_cron + 1 );
				}
			}
		}
	}
	add_action( 'woo_valid_coupon', 'verify_status_coupon' );
	 
	function my_account_coupons() {
		// Get all customer orders
	    $customer_coupons = get_posts( array(
	        'numberposts' => -1,
	        'meta_key'    => 'current_user',
	        'meta_value'  => get_current_user_id(),
	        'post_type'   => 'shop_coupon',
	        'post_status' => 'publish',
	    ) );

		echo "<h2>Meus cupons</h2>";
		echo 
			'<table class="shop_table shop_table_responsive my_account_orders">
				<thead>
					<tr>
						<th class="order-number"><span class="nobr">Pedido</span></th>
						<th class="order-number"><span class="nobr">Código do Cupom</span></th>
						<th class="order-number"><span class="nobr">Status do Cupom</span></th>
						<th class="order-number"><span class="nobr">Vencimento</span></th>
					</tr>
				</thead>
				<tbody>
					<tr class="order">';
					foreach ($customer_coupons as $coupon) {
						$coupon_used_count = get_post_meta($coupon->ID, 'usage_count', true);
	    				$coupon_used_limit = get_post_meta($coupon->ID, 'usage_limit', true);

				    	echo '<td class="order-number" data-title="Pedido">
							<a href="view-order/'.$coupon->post_parent.'">#'.$coupon->post_parent.'</a>
						</td>
						<td class="order-number" data-title="Pedido">
							'.$coupon->post_title.'
						</td>
						<td class="order-number" data-title="Pedido">
							'.(get_post_meta($coupon->ID, "coupon_usage", true) == "0" && $coupon_used_count < $coupon_used_limit ? "Ativo" : "Desativado").'
						</td>
						<td class="order-number" data-title="Pedido">
							'.($coupon_used_count < $coupon_used_limit ? ($coupon_used_limit - $coupon_used_count == 1 ? "1 Mês" : $coupon_used_limit - $coupon_used_count." Meses" ) : 'Expirado').'
						</td>';
				    }
		echo 		'</tr>
				</tbody>
			</table>';
	}
	add_action('woocommerce_before_my_account', 'my_account_coupons');
}