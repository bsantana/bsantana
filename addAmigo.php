public function addAmigo($ID = null){
	if($ID === NULL) return false;
	global $wpdb, $current_user, $notificacoes; get_currentuserinfo();

	$x = $wpdb->get_results("SELECT seguido AS ID FROM em_em_amigos WHERE seguidor = {$current_user->ID} AND seguido = {$ID} AND status != '' ");
	$y = $wpdb->get_results("SELECT seguidor AS ID FROM em_em_amigos WHERE seguido = {$current_user->ID} AND seguidor = {$ID} AND status != '' ");
	$z = array_merge($x, $y);

	if(!$z) {
		$q = $wpdb->insert('em_em_amigos', array('seguidor' => $current_user->ID, 'seguido' => $ID, 'status' => 'pendente'));
		return true;
	}
	do_action('badges.score', 'seguidores', $ID);

	return false;
}
