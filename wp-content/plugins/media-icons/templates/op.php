<?php $sm_options = get_option( 'sm_op_icons' ); ?>

<div class="wrap">
	<form action="options.php" method="post">
		<?php settings_fields( 'sm_op' ); ?>

		<h1>Opções Plugin Media Icons</h1>

		<label>Facebook:</label><br>
		<input type="url" name="sm_op_icons[fb_perfil]" id="sm_op_icons[fb_perfil]" value="<?php echo $sm_options['fb_perfil']; ?>"><br>
		<label>Twitter:</label><br>
		<input type="url" name="sm_op_icons[tw_perfil]" id="sm_op_icons[tw_perfil]" value="<?php echo $sm_options['tw_perfil']; ?>"><br>
		<label>Youtube:</label><br>
		<input type="url" name="sm_op_icons[yt_perfil]" id="sm_op_icons[yt_perfil]" value="<?php echo $sm_options['yt_perfil']; ?>"><br>
		<input type="submit" name="submit" value="Salvar">
	</form>
</div>