<div class="brands m-t-1">
	<div class="row">
	<?php   foreach ( $instance['client_repeater'] as $client_repeater ){
       	$image_url = wp_get_attachment_image_src( $client_repeater['client_title'], 'full'); ?>
		<div class="col-xs-6 col-md-4 col-lg-2"><img src="<?php echo esc_url( $image_url[0] );?>"></div>
	<?php } ?>
	</div>
</div>