// Action: Aprovação de usuários Produtores da sidebar
	if($_POST['action'] == 'user.approved'){
		$user_id = $_POST['id'];
		$key = sha1(wp_generate_password(20));

		$res = $wpdb->get_col($wpdb->prepare("SELECT 1 FROM {$wpdb->users} WHERE user_activation_key != '' && ID = " . $user_id));
		if ($res)
			exit();

		$wpdb->update(
			$wpdb->users,
			array(
				'user_activation_key' => $key,
			),
			array( 'ID' => $user_id ),
			array(
				'%s',
			),
			array( '%d' )
		);

    	/*enviar email*/
		update_user_meta( $user_id, 'status', 'pendente');

		$xo = 'bruno_shenn@hotmail.com';
	 	$so = 'brunosantana@trii.com.br';
	 	$to = get_userdata($user_id)->user_email;
  		$subject = "Aprovacao cadastro edumais";
 		$message = '<html xmlns="http://www.w3.org/1999/xhtml">' .
						'<head>' .
							'<meta content="text/html; charset=utf-8" http-equiv="Content-Type">' .
							'<meta content="width=device-width, initial-scale=1" name="viewport">' .
							'<title>Edumais</title>' .
						'</head>' .

						'<body class="body" style="margin: 0px; padding: 0px; font-family: "Trebuchet MS", sans-serif; font-size: 10pt; color: rgb(136, 136, 136); line-height: 1.3em; width: 100%; min-width: 600px;">' .
							'<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" style="padding: 0;margin: 0;border-collapse: collapse; " width="600">' .
								'<tbody>' .
									'<tr>' .
										'<td align="center" bgcolor="#f0f0f0" class="full_width" style="border-collapse: collapse;" width="100%">' .
										'<div class="wrapper" style="width: 600px;margin: auto;">' .
										'<table border="0" cellpadding="0" cellspacing="0" class="table600con" style="border-collapse: collapse;" width="600">' .
											'<tbody>' .
												'<tr>' .
													'<td align="left" class="grid_block" style="padding-left: 5px;border-collapse: collapse;font-family: "Trebuchet MS", sans-serif; padding-left: 24px; padding-top:20px; padding-bottom:20px;" valign="middle" width="400">' .

													'<p style="padding-top: 10px;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:20px;color:#909090">' .
														'Você foi aprovado para participar do Edumais.<br >' .
														'Clique no botão abaixo para ativar seu cadastro como Produtor.' .
													'</p>' .

													'<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;" width="100">' .
														'<tbody>' .
															'<tr>' .
																'<td align="center" bgcolor="#5191d1" height="22" style="border-radius:3px;border-collapse: collapse;border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; -ms-border-radius:3px; " valign="middle"><a href="http://edumais.com.br/login?verification_key=' . $key . '" ' . 'style="display: block;font-size: 9pt; color: #ffffff;text-decoration: none;outline: none; border-radius:5px;">ATIVAR</a></td>' .
															'</tr>' .
														'</tbody>' .
													'</table>' .

													'<br ><img alt="" src="http://edumais.com.br/wp-content/themes/edumais-2014/images/logo.png" style=" padding-bottom:40px; margin-top:12px; border: 0;display: block;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;">' .

													'</td>' .
													'<td class="spacer" style="border-collapse: collapse;" width="0">&nbsp;</td>' .
													'<td align="left" class="grid_block" style="padding-top:26px; border-collapse: collapse;" valign="top" width="242">' .
													'</td>' .
													'<td class="spacer" style="border-collapse: collapse;" width="0">&nbsp;</td>' .
												'</tr>' .
											'</tbody>' .
										'</table>' .
										'</div>' .
										'</td>' .
									'</tr>' .
								'</tbody>' .
							'</table>' .
						'</body>' .

					'</html>';

 		wp_mail( $to, $subject, $message);
 		wp_mail( $xo, $subject, $message);
 		wp_mail( $so, $subject, $message);


		print_r($key);
		print_r($to);
		print_r('foiemail?');
		exit();
	}
