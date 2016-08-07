<?php if( $instance['style'] =='single' ) 
{ 
$row_class ='row';
$col_class ='col-xs-6 col-md-4 col-lg-2';
echo '<div class="brands m-t-1">';
}
else {
$col_class ='col-xs-4';
$row_class ='row row-brands';
}?>

	<div class="<?php echo $row_class;?>">

	<?php   foreach ( $instance['client_repeater'] as $client_repeater ){

       	$image_url = wp_get_attachment_image_src( $client_repeater['client_title'], 'full'); ?>

		<div class="<?php echo $col_class;?>"><img src="<?php echo esc_url( $image_url[0] );?>"></div>

	<?php } ?>

	</div>

<?php if( $instance['style']=='single' ) echo '</div>';?>