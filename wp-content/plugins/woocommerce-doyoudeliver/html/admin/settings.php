<?php
global $wpdb;
$mylink = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}zip_css_validation WHERE id = '1' LIMIT 1");
if(isset($mylink) && !empty($mylink)){
	$name = $mylink->name;
	$css = $mylink->css;
	$validation = $mylink->validation;
}
?>

<?php

if (isset($_GET['view']) && $_GET['view'] == 'edit'):
	$code_id = (int)$_GET['id'];
	$c = $this->GetCodeById($code_id); ?>
<h2><?php
	_e('Edit Zip/Pin'); ?></h2>
<input type="hidden" name="task" value="sb_wc_cd_update_code" />
<input type="hidden" name="code_id" value="<?php
	print $c->code_id; ?>" />
<p>
	<label><?php
	_e('Zip/Pin'); ?></label>
	<input type="text" name="code" value="<?php
	print $c->code ?>" />
</p>
<p>
	<label><?php
	_e('Days'); ?></label>
	<input type="text" name="days" value="<?php
	print $c->days; ?>" />
</p>
<p>
	<label><?php
	_e('Note'); ?></label><br/>
	<textarea name="note" style="width:50%;height:70px;"><?php
	print $c->note; ?></textarea>
</p>
<?php
else: ?>
<h3><?php
	_e('Do You Deliver? Settings'); ?></h3>
<table>
<tr>
<td><b>Title</b></td>
<td><input name="ops3[zip_name]" type="text" class="regular-text" value="<?php
	if (isset($name) && $name != ""){
		echo $name;
	}else{
		echo "Zip Code";
	} ?>"></td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
<td><b>Validation</b></td>
<?php //echo '==' . $validation;?>
<td><select name="ops3[validation]"><option value="billing" <?php
	if (isset($validation) && $validation == "billing")
		{
		echo "SELECTED";
		} ?>>Billing Address</option><option value="shipping" <?php
	if (isset($validation) && $validation == "shipping")
		{
		echo "SELECTED";
		} ?>>Shipping Address</option><option value="validate_none" <?php
	if (isset($validation) && $validation == "validate_none")
		{
		echo "SELECTED";
		} ?>>Validate None</option></select></td>

</tr>
<tr>
<td colspan="2">This feature checks Zip/Pin code in real time when visitor is on Checkout page. If the code is not found, a message is shown and Submit Order button is disabled. </td>
</tr>


<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
	<td><b><?php
	_e('Show widget on product page'); ?></b></td>
	<?php
		// echo '<pre>';
		// print_r($ops);
		// echo '</pre>';
		if(empty($ops)){
			?>
			<td><input type="checkbox" name="ops[product_page]" value="yes" /></td>
			<?php
		}else{
	?>
	<td><input type="checkbox" name="ops[product_page]" value="yes" <?php
	print (isset($ops['product_page']) && $ops['product_page'] == 'yes') ? 'checked' : ''; }?> /></td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
	<td><b><?php
	_e('Show widget on cart page'); ?></b></td>
	<?php
	if(empty($ops)){
	?>
	<td><input type="checkbox" name="ops[cart_page]" value="yes"/></td>
	<?php
	}else{
	?>
	<td><input type="checkbox" name="ops[cart_page]" value="yes" <?php
	print (isset($ops['cart_page']) && $ops['cart_page'] == 'yes') ? 'checked' : ''; }?> /></td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>	
	<td><b>Shortcode</b></td>
	<td>[doyoudeliver]</td>
</tr>
<tr>
<td colspan="2">Place this shortcode on products, pages, posts or widgets.</td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
	<td><b><?php
	_e('Message when code not found');?></b></td>
	<?php
	if(empty($ops)){
	?>
	<td><textarea style="width:100%;height:70px;" name="ops[error_msg]"></textarea></td>
	<?php
	}else{
	?>
	<td><textarea style="width:100%;height:70px;" name="ops[error_msg]"><?php
	print $ops['error_msg']; }?></textarea></td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
<td><b>Customize CSS</b></td>
<td><textarea style="height: 127px;width: 350px;" name="ops3[css]"><?php
	if (isset($css) && $css != "")
		{
		echo $css;
		}
	  else
		{
		echo ".delivery-box {
background-color:#f7f7f7;padding:5px 10px;border-radius:2px;border:2px dashed #e9e9e9;margin:10px 0px;display:block;clear:both;
}
.wc-delivery-button {
}
.doyoudeliver-yes {
color: #41F3BF;
font-size:16px;
font-weight:bold;
}";
		} ?></textarea></td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>

<tr>
	<td><b><?php
	_e('Layout'); ?></b></td>
	<?php
	if(empty($ops)){
	?>
	<td>
		<input type="radio" name="ops[layout]" value="direct" /><?php
	_e('Visible Form'); ?>
		
	</td>
	<?php
	}else{
	?>
	<td>
		<input type="radio" name="ops[layout]" value="direct" <?php
	print (isset($ops['layout']) && $ops['layout'] == 'direct') ? 'checked' : ''; }?> /><?php
	_e('Visible Form'); ?>
		
	</td>
</tr>
</tbody></table>
<hr>
<h2>Add Zip/Pin Codes</h2>
<table>
<tbody>
<tr>
	<td colspan=2><h3>Bulk Upload</h3></td>
</tr>

<tr>
	<td><b><?php
	_e('Upload CSV file with Zip/Pin Codes'); ?></b></td>
	<td><input type="file" name="csv_file" value="" /></td>
</tr>
<tr>
<td colspan=2>Make sure CSV file has three columns in this order - Zip/Pin Code, No. of Days, Note</td>
</tr>

<tr>
<td><br /></td>
<td><br /></td>
</tr>


<tr>
	<td colspan=2><h3>Quick Add</h3></td>
</tr>

<tr>
<td><b>Zip/Pin</b></td>
<td><input  name="ops2[code]" type="text" class="regular-text"></td>
</tr>
<tr>
<td><b>No. Of Days</b></td>
<td><input  name="ops2[days]" type="text" class="regular-text"></td>
</tr>
<tr>
<td><b>Note</b></td>
<td><input  name="ops2[note]" type="text" class="regular-text"></td>
</tr>

</tbody></table>



<hr>

<div class="tablenav top">
	<div class="alignleft actions bulkactions">
		<label class="screen-reader-text" for="bulk-action-selector-top">Select bulk action</label>
		<select id="bulk-action-selector-top" name="bulk_action">
			<option selected="selected" value="-1">Bulk Actions</option>
			<option value="sb_wc_cd_delete_code">Delete</option>
		</select>
		<button type="button" id="btn-apply-bulk" class="button"><?php
	_e('Apply'); ?></button>
	</div>
	<br class="clear">
</div>

<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<table id="pin_codes_table" class="wp-list-table widefat fixed posts">
<thead>
<tr>
	<th class="manage-column column-cb check-column"><input type="checkbox" id="cb-select" name="cb_select" value=""  /></th>
	<th>#</th>
	<th><?php
	_e('Zip/Pin'); ?></th>
	<th><?php
	_e('No of Days'); ?></th>
	<th><?php
	_e('Note'); ?></th>
	<th><?php
	_e('Action'); ?></th>
</tr>
</thead>
<tbody>
<?php
	$i = 1;
	foreach($codes as $c): ?>
<tr>
	<td><input class="bulk-action" type="checkbox" name="ids[]" value="<?php
		print $c->code_id; ?>" /></td>
	<td><?php
		print $i; ?></td>
	<td><?php
		print $c->code ?></td>
	<td><?php
		print $c->days ?></td>
	<td><?php
		print $c->note ?></td>
	<td>
		<a href="<?php
		print admin_url('admin.php?page=wc-settings&tab=cd_settings&view=edit&&id=' . $c->code_id) ?>"><?php
		_e('edit'); ?></a> |
		<a href="<?php
		print admin_url('/admin.php?task=sb_wc_cd_delete_code&id=' . $c->code_id) ?>"><?php
		_e('delete'); ?></a>
	</td>
</tr>
<?php
		$i++;
	endforeach; ?>
</tbody>
</table>
<script>
/*jQuery('#cb-select').click(function()
{
	if( !jQuery(this).is(':checked') )
	{

		jQuery('#pin_codes_table tbody tr').each(function(i, tr)
		{
			jQuery(tr).find('td:first input').attr('checked', false);
		});

	}
	  else
	{
		jQuery('#pin_codes_table tbody tr').each(function(i, tr)
		{
			jQuery(tr).find('td:first input').attr('checked', true);
		});
	}

});*/
jQuery('#btn-apply-bulk').click(function()
{
	if( jQuery('#bulk-action-selector-top').val() == -1 )
		return false;
	var cbs = jQuery('#pin_codes_table tbody tr').find('input[type=checkbox]:checked');
	if( cbs.length <= 0 )
		return false;
	var ids = '';
	jQuery(cbs).each(function(i, cb)
	{
		ids += cb.value + ',';
	});
	var params = '<?php
	print admin_url('/admin.php?task=sb_wc_cd_delete_code&id='); ?>' + ids;
	window.location = params;
	return false;
});
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script>
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}
$(document).ready(function() {
    $('#pin_codes_table').DataTable( {
        "pagingType": "full_numbers"
    } );
		$('#pin_codes_table th:first').removeClass('sorting_asc');
		$('#pin_codes_table th:first').removeClass('sorting_desc');
		$('#pin_codes_table th:first').removeClass('sorting');
		$('#pin_codes_table th:last').removeClass('sorting_asc');
		$('#pin_codes_table th:last').removeClass('sorting_desc');
		$('#pin_codes_table th:last').removeClass('sorting');
	
	$("#pin_codes_table th").click(function(){
		$('#pin_codes_table th:first').removeClass('sorting_asc');
		$('#pin_codes_table th:first').removeClass('sorting_desc');
		$('#pin_codes_table th:first').removeClass('sorting');
		$('#pin_codes_table th:last').removeClass('sorting_asc');
		$('#pin_codes_table th:last').removeClass('sorting_desc');
		$('#pin_codes_table th:last').removeClass('sorting');
	});
	

	$('#pin_codes_table tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#pin_codes_table tbody td').on('click', 'tbody td input[type="checkbox"], thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('#pin_codes_table thead input[type="checkbox"]').on('click', function(e){
      if(this.checked){
         $('#pin_codes_table tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#pin_codes_table tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
	
	
} );
</script>
<?php
endif; ?>
