<?php
/**
 * Plugin Name: Do you deliver for Woocommerce
 * Description: Let our customers see if we deliver in their area and in how much time.
 * Version: 1.2
 * Plugin URI: http://www.exam18.com
 * Author: AppZab
 * Author URI: http://www.exam18.com
 *
 */

defined('SB_DS') or define('SB_DS', DIRECTORY_SEPARATOR);
global $wpdb;
$mylink = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}zip_css_validation WHERE id = '1' LIMIT 1");

if(isset($mylink) && !empty($mylink)){
	$zip_name = $mylink->name;
	$css = $mylink->css;
	$validation = $mylink->validation;
}
class SB_WC_CheckDelivery

	{
	protected $_plugin_id = 'sb_wc_cd';
	protected $_plugin_dir;
	protected $_plugin_url;
	protected $_shortcode = 'doyoudeliver';
	protected $_hour_seconds = 0;
	protected $_day_seconds = 0;
	public

	function __construct()
		{
		$this->_plugin_dir = dirname(__FILE__);
		$this->_plugin_url = site_url('/wp-content/plugins/') . basename($this->_plugin_dir);
		$this->_hour_seconds = 3600;
		$this->_day_seconds = $this->_hour_seconds * 24;
		$this->addActions();
		$this->addFilters();
		$this->addShortcodes();
		}

	public static

	function OnActivated()
		{
		global $wpdb;
		$queries = array();
		$queries[] = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wc_delivery_codes(code_id int not null auto_increment primary key,

				code varchar(100),

				days int,

				note text,

				creation_date datetime

			)";
		$queries[] = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}zip_css_validation(id int not null auto_increment primary key,

				name varchar(100),

				css text,

				validation varchar(25)

			)";
		foreach($queries as $query)
			{
			$wpdb->query($query);
			}
		}

	public static

	function OnDeactivate()
		{
		global $wpdb;
		/* $query = "DROP TABLE {$wpdb->prefix}wc_delivery_codes";
		$wpdb->query($query); */
		}

	protected
	function addActions()
		{
		$ops = get_option('wc_cd_settings', array());
		if (!is_array($ops)) $ops = array();
		add_action('init', array(
			$this,
			'action_init'
		));
		if (is_admin())
			{
			add_action('woocommerce_settings_cd_settings', array(
				$this,
				'action_woocommerce_settings_cd_settings'
			));
			add_action('woocommerce_settings_save_cd_settings', array(
				$this,
				'action_save_settings'
			));
			}
		  else
			{
			if (isset($ops['cart_page']) && $ops['cart_page'] == 'yes') add_action('woocommerce_after_cart_table', array(
				$this,
				'action_woocommerce_after_cart_table'
			));
			if (isset($ops['product_page']) && $ops['product_page'] == 'yes') add_action('woocommerce_before_add_to_cart_button', array(
				$this,
				'action_woocommerce_before_add_to_cart_button'
			));
			}
		}

	protected
	function addFilters()
		{
		add_filter('widget_text', 'do_shortcode');
		if (is_admin())
			{
			add_filter('woocommerce_settings_tabs_array', array(
				$this,
				'filter_woocommerce_settings_tabs_array'
			) , 50);
			}
		}

	protected
	function addShortcodes()
		{
		add_shortcode($this->_shortcode, array(
			$this,
			'shortcode_doyoudeliver'
		));
		}

	public

	function shortcode_doyoudeliver($atts)
		{
		global $wp_scripts, $woocommerce;
		$ops = get_option('wc_cd_settings', array());
		if (!is_array($ops)) $ops = array();
		ob_start();
		if (isset($ops['layout']) && $ops['layout'] != 'lightbox'):
?>

<style type="text/css">

<?php
			echo $GLOBALS['css']; ?>

</style>
		<div class="delivery-box">

			<?php if(isset($GLOBALS['zip_name'])){ echo $GLOBALS['zip_name']; }?>
			<br />

			<input type="text" id="pin_code" name="pin_code" value="" style="float:left;display:block;width:40%" placeholder="Enter Pin Code" />

			<a href="javascript:;" class="wc-delivery-button button" style="margin:0px 5px;max-height:35px;"><?php
			_e('GO');
?></a>

	<div class="wc-delivery-time-response" style="clear:both;font-size:13px;"></div>

</div>
		<?php
		else:
?>

		<?php
			
			if (!isset($wp_scripts->queue['prettyPhoto']))
				{
				wp_enqueue_script('prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.js', array(
					'jquery'
				) , $woocommerce->version, true);
				wp_enqueue_script('prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init.js', array(
					'jquery'
				) , $woocommerce->version, true);
				wp_enqueue_style('woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css');
				}

?>

		<p style="clear:both;overflow:hidden;">

			<a id="wc-check-delivery-btn" href="#wc-cd-box" rel="prettyPhoto-box" class="button"><?php
			_e('Check Delivery Time');
?></a>

		</p>

		<div id="wc-cd-box" class="hide">

			<p>

				<label><?php
			if(isset($GLOBALS['zip_name'])){ echo $GLOBALS['zip_name']; }?></label>

				<input type="text" id="pin_code" name="pin_code" value="" style="float:left;" />

				<a href="javascript:;" class="wc-delivery-button button" style="float:left;"><?php
			_e('GO');
?></a>



			</p>

			<div class="wc-delivery-time-response" style="clear:both;"></div>

		</div>

		<?php
		endif;
?>

		<script type="text/javascript">

		jQuery(function()

		{

			jQuery(document).on('click', '.wc-delivery-button', function()

			{

				jQuery('.wc-delivery-time-response').html('');

				var code = jQuery(this).parent().find('input[name=pin_code]:first').val().trim();

				var url = '<?php
		print home_url('/index.php?task=wc_check_delivery&code=');
?>' + code;

				jQuery.get(url, function(res)

				{

					jQuery('.wc-delivery-time-response').html(res);

				});

				return false;

			});

			

		});

		</script>

		<?php
		return ob_get_clean();
		}

	public

	function filter_woocommerce_settings_tabs_array($tabs)
		{
		$tabs['cd_settings'] = __('Do you Deliver?');
		return $tabs;
		}

	public

	function action_woocommerce_settings_cd_settings()
		{
		global $wpdb;
		$ops = get_option('wc_cd_settings', array());
		if (!is_array($ops)) $ops = array();
		$codes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wc_delivery_codes ORDER BY code_id DESC");
		require_once $this->_plugin_dir . SB_DS . 'html' . SB_DS . 'admin' . SB_DS . 'settings.php';

		}

	public

	function action_save_settings()
		{
		global $wpdb;
		if (!isset($_POST['ops'])) return false;
		if (count($_POST['ops']) <= 0) return false;
		if (isset($_POST['ops3']['zip_name']) && isset($_POST['ops3']['css']) && isset($_POST['ops3']['validation'])){
			$table_name = $wpdb->prefix . 'zip_css_validation';
			$zcv_results = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = 1", OBJECT );
			// echo '<pre>qq';
			// print_r($zcv_results);
			// echo '</pre>';
			// die();
				if(!empty($zcv_results)){
					$new_code = array(
						'name' => $_POST['ops3']['zip_name'],
						'css' => $_POST['ops3']['css'],
						'validation' => $_POST['ops3']['validation']
					);
					$wpdb->update($wpdb->prefix . 'zip_css_validation', $new_code, array(
						'id' => '1'
					));
				}else{
					
					$table_name = $wpdb->prefix . 'zip_css_validation';
					$zip_name = trim($_POST['ops3']['zip_name']);
					$css = trim($_POST['ops3']['css']);
				 	$validation = trim($_POST['ops3']['validation']);
					$wpdb->insert( 
						$table_name, 
						array( 
							'name' => $zip_name, 
							'css' => $css, 
							'validation' => $validation 
						)
					);
					
				}
			}

		if (isset($_POST['ops2']) && isset($_POST['ops2']['code']) && isset($_POST['ops2']['days']) && isset($_POST['ops2']['note']) && $_POST['ops2']['code'] != "")
			{
			$code = preg_replace('/[^a-zA-Z0-9,*,?, ,]/i', '', $_POST['ops2']['code']);
			if (!empty($code))
				{
				$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code = '$code' LIMIT 1";
				$row = $wpdb->get_row($query);
				if (!$row)
					{
					$new_code = array(
						'code' => trim($code) ,
						'days' => (int)trim($_POST['ops2']['days']) ,
						'note' => trim($_POST['ops2']['note']) ,
						'creation_date' => date('Y-m-d H:i:s')
					);
					$wpdb->insert($wpdb->prefix . 'wc_delivery_codes', $new_code);
					}
				}
			}

		if (isset($_POST['ops']['import_local']) && $_POST['ops']['import_local'] == "yes")
			{
			$local_del = get_option("woocommerce_local_delivery_settings");
			$local_code_str = $local_del['codes'];
			$local_codes = explode(",", $local_code_str);
			$local_codes = array_map('trim', $local_codes);
			foreach($local_codes as $code)
				{
				$code = preg_replace('/[^a-zA-Z0-9,*,?, ,]/i', '', $code);
				if (empty($code)) continue;
				$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code = '$code' LIMIT 1";
				$row = $wpdb->get_row($query);
				if (!$row)
					{
					$new_code = array(
						'code' => trim($code) ,
						'days' => '',
						'note' => '',
						'creation_date' => date('Y-m-d H:i:s')
					);
					$wpdb->insert($wpdb->prefix . 'wc_delivery_codes', $new_code);
					}

				$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes";
				$row = $wpdb->get_results($query);
				$my_codes = array();
				foreach($row as $c)
					{
					$my_codes[] = $c->code;
					}

				$local_del['codes'] = implode(", ", $my_codes);
				update_option('woocommerce_local_delivery_settings', $local_del);
				}
			}

		$ops = array_map('trim', $_POST['ops']);
		update_option('wc_cd_settings', $ops);

		// ##check if there is an uploaded file

		if (isset($_FILES['csv_file']) && $_FILES['csv_file']['size'] > 0)
			{
			$data = file_get_contents($_FILES['csv_file']['tmp_name']);
			$lines = explode("\n", $data);
			foreach($lines as $line)
				{
				list($code, $days, $note) = explode(',', trim($line));
				$code = preg_replace('/[^a-zA-Z0-9,*,?, ,]/i', '', $code);

				// var_dump($code);

				if (empty($code)) continue;
				$query1 = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code = '$code' LIMIT 1";
				$row1 = $wpdb->get_row($query1);
				if (!$row1)
					{
					$new_code = array(
						'code' => trim($code) ,
						'days' => (int)trim($days) ,
						'note' => trim($note) ,
						'creation_date' => date('Y-m-d H:i:s')
					);
					$wpdb->insert($wpdb->prefix . 'wc_delivery_codes', $new_code);
					}
				}
			}

		// if(isset())

		}

	public

	function action_init()
		{
		if (is_admin())
			{
			$this->handleAdminRequests();
			}
		  else
			{
			$this->handleRequests();
			}
		}

	protected
	function handleAdminRequests()
		{
		global $wpdb;
		$task = isset($_REQUEST['task']) ? $_REQUEST['task'] : null;
		if (!$task) return false;
		if ($task == 'sb_wc_cd_delete_code' && isset($_GET['id']))
			{
			$ids = array();
			if (is_int($_GET['id'])) $ids[] = $_GET['id'];
			  else
				{
				$id = rtrim($_GET['id'], ',');
				$ids = explode(',', $id);
				}

			$query = "DELETE FROM {$wpdb->prefix}wc_delivery_codes WHERE code_id IN(" . implode(',', $ids) . ")";
			$wpdb->query($query);
			header('Location: ' . admin_url('/admin.php?page=wc-settings&tab=cd_settings'));
			die();
			}
		elseif ($task == 'sb_wc_cd_update_code' && isset($_POST['code_id']))
			{
			$id = $_POST['code_id'];
			$data = array(
				'code' => trim($_POST['code']) ,
				'days' => (int)$_POST['days'],
				'note' => trim($_POST['note'])
			);
			$wpdb->update($wpdb->prefix . 'wc_delivery_codes', $data, array(
				'code_id' => $id
			));
			wp_redirect(admin_url('/admin.php?page=wc-settings&tab=cd_settings'));
			die();
			}
		}

	protected
	function handleRequests()
		{
		global $wpdb;
		$task = isset($_REQUEST['task']) ? $_REQUEST['task'] : null;
		if (!$task) return false;
		if ($task == 'wc_check_delivery' || $task == 'wc_check_delivery2')
			{
			$ops = get_option('wc_cd_settings', array());
			if (!is_array($ops)) $ops = array();
			$code = trim($_GET['code']);
			$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code = '$code' LIMIT 1";
			$row = $wpdb->get_row($query);
			if (!$row)
				{
				$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code LIKE '%*' AND SUBSTRING(code,1,LENGTH(code-1)) = SUBSTRING('$code',1,LENGTH(code-1))  AND LENGTH(code) <= LENGTH('$code') LIMIT 1";
				$row = $wpdb->get_row($query);
				if (!$row)
					{
					$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code LIKE '%?' AND SUBSTRING(code,1,LENGTH(code-1)) = SUBSTRING('$code',1,LENGTH(code-1)) AND LENGTH(code)= LENGTH('$code') LIMIT 1";

					// $query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code LIKE '$code%' AND   code LIKE '%*' LIMIT 1";

					$row = $wpdb->get_row($query);
					if (!$row)
						{
						if ($task == "wc_check_delivery2") die('false');
						$msg = (isset($ops['error_msg']) && !empty($ops['error_msg'])) ? $ops['error_msg'] : __('Oops! This Zip/Pin code is not found');
						die($msg);
						}
					}
				}

			// print_r($row);

			$time = time();
			$d_time = $time + ($this->_day_seconds * $row->days);
			$msg = sprintf(__('<span class="doyoudeliver-yes">YES!</span> <br /> Estimated Delivery in <b>%d days (by %d %s, %d)') , $row->days, date('d', $d_time) , date('M', $d_time) , date('Y', $d_time)) . '</b><br/>';
			if (!empty($row->note)) $msg.= sprintf(__('%s') , $row->note) . '<br/>';
			die($msg);
			}
		}

	public

	function action_woocommerce_before_add_to_cart_button()
		{
		print do_shortcode('[' . $this->_shortcode . ']');
		}

	public

	function action_woocommerce_after_cart_table()
		{
		print do_shortcode('[' . $this->_shortcode . ']');
		}

	public

	function GetCodeById($id)
		{
		global $wpdb;
		$query = "SELECT * FROM {$wpdb->prefix}wc_delivery_codes WHERE code_id = $id LIMIT 1";
		return $wpdb->get_row($query);
		}
	}

$sb_wc_cd = new SB_WC_CheckDelivery();
register_activation_hook(__FILE__, array(
	$sb_wc_cd,
	'OnActivated'
));
register_deactivation_hook(__FILE__, array(
	$sb_wc_cd,
	'OnDeactivate'
));

function SB_WC_shipping_pin_code()
	{
	$ops = get_option('wc_cd_settings', array());
	
	if (!is_array($ops)) $ops = array();
	$msg = (isset($ops['error_msg']) && !empty($ops['error_msg'])) ? $ops['error_msg'] : __('Oops! This Zip/Pin code is not found');
?>

	<script>

	function check_if_deliver_there(){

		var code =  jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').val().trim();
		//alert(code);
		if(code==""){
			setTimeout(function(){
				jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled');
				return;
			}, 6000);
			
		}

		var url = '<?php
	print home_url('/index.php?task=wc_check_delivery2&code=');
?>' + code;

		jQuery.get(url, function(res)

		{

			jQuery('.do_delivery_msg').remove();

setTimeout(function(){

			if(res=="false")

			{

				jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg err"><?php
	echo ($msg);
?></small>');

				jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled').parent().append('<small class="do_delivery_msg err"><?php
	echo ($msg);
?></small>');

			}else

			{



				jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg success">'+res+'</small>');

				jQuery('[name="woocommerce_checkout_place_order"]').removeAttr('disabled').parent().append('<small class="do_delivery_msg success">'+res+'</small>');



			}

			},1000);

		});

	}

	function check_if_deliver_there2(){

		var code =  jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').val().trim();
		//alert(code);
		if(code==""){
			setTimeout(function(){
				jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled');
				return;
			}, 1000);
			
		}

		var url = '<?php
	print home_url('/index.php?task=wc_check_delivery2&code=');
?>' + code;

		jQuery.get(url, function(res)

		{

			jQuery('.do_delivery_msg').remove();

setTimeout(function(){

			if(res=="false")

			{

				jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg err"><?php
	echo ($msg);
?></small>');

				jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled').parent().append('<small class="do_delivery_msg err"><?php
	echo ($msg);
?></small>');

			}else

			{



				jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg success">'+res+'</small>');

				jQuery('[name="woocommerce_checkout_place_order"]').removeAttr('disabled').parent().append('<small class="do_delivery_msg success">'+res+'</small>');



			}

			},3000);

		});

	}
	
	function check_if_deliver_there3(){
		var code =  jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').val().trim();
		if(code==""){
			setTimeout(function(){
				jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled');
				return;
			}, 6000);
			
		}
		var url = '<?php print home_url('/index.php?task=wc_check_delivery2&code=');?>' + code;
		jQuery.get(url, function(res){
			jQuery('.do_delivery_msg').remove();
			setTimeout(function(){
				if(res=="false"){
					jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg err"><?php echo ($msg);?></small>');
					jQuery('[name="woocommerce_checkout_place_order"]').attr('disabled','disabled').parent().append('<small class="do_delivery_msg err"><?php echo ($msg);?></small>');
				}else{
					jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').parent().append('<small class="do_delivery_msg success">'+res+'</small>');
					jQuery('[name="woocommerce_checkout_place_order"]').removeAttr('disabled').parent().append('<small class="do_delivery_msg success">'+res+'</small>');
				}
			},3000);
		});
	}

	jQuery('#<?php echo $GLOBALS['validation'] ?>_postcode').change(function(){

		check_if_deliver_there2();

	});

	jQuery(document).ready(function() {
		jQuery('#ship-to-different-address-checkbox').click(function() {
			check_if_deliver_there3();
		});
	});

	jQuery(document).ready(function(){

		check_if_deliver_there();

	})

	</script>



	<?php
	}
if(isset($GLOBALS['validation']) && $GLOBALS['validation'] == 'shipping'){
	add_action('woocommerce_after_checkout_shipping_form', 'SB_WC_shipping_pin_code');
}elseif(isset($GLOBALS['validation']) && $GLOBALS['validation'] == 'billing'){
	add_action('woocommerce_after_checkout_billing_form', 'SB_WC_shipping_pin_code');
}elseif(isset($GLOBALS['validation']) && $GLOBALS['validation'] == 'validate_none'){
}
wp_enqueue_script('jquery');
