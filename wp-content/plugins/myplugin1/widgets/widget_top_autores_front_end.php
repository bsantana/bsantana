<center><h4>Top Autores:</h4></center>
<table>
	<tr>
		<th>Nome:</th>
		<th>Posts:</th>
	</tr>

<?php 
$dados = get_users( array( 'orderby' => 'post_count', 'order' => 'DESC' ) );
foreach ($dados as $dado): ?>
	<tr>
		<td>
			<a href="<?php echo get_author_posts_url($dado->ID); ?>">
			<?php echo $dado->user_nicename; ?>
			</a>
		</td>
		<td>
			<?php echo count_user_posts($dado->ID); ?>
		</td>
	</tr>
<?php
endforeach;
?>

</table>