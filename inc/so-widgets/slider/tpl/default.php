  <!-- Site header -->
  <header class="site-header">
  	<div class="swiper-container header-slider">
  		<div class="swiper-wrapper">
  		<?php foreach ( $instance['slider_repeater'] as $slider_detail ){ 
  			$image_url = wp_get_attachment_image_src($slider_detail['image'], 'full'); 
  			$content_align = $slider_detail['content_align'];
  			if( 'center' == $content_align ){

  				$align_text = '<div class="col-sm-12 v-center text-xs-center">';
  			}
  			elseif( 'left' == $content_align )
  			{
  				$align_text = '<div class="col-sm-12 col-md-9 col-lg-6 v-center">';

  			}
  			elseif( 'right' == $content_align )
  			{
  				$align_text = '<div class="col-sm-12 col-md-offset-6 col-md-6 v-center">';
  			}
  			else{
  				$align_text = '';

  			}
  			$right_class = '';
			if( 'right' == $content_align ){
				$right_class = 'slide-gradient-right';
			}	

  			$overlay_class = '';
  			if( true == $slider_detail['overlay_checkbox'] ){
  				$overlay_class = 'swiper-overlay';
  			}
  			?>
  			<div class="swiper-slide <?php echo $right_class; ?> <?php echo $overlay_class; ?>" style="background-image: url(<?php echo esc_url( $image_url[0] ); ?>)">
  				<div class="container">
  					<div class="row">
  						<?php echo $align_text; ?>
  							<?php echo  $slider_detail['content'];?>
  						</div>
  					</div>
  				</div>
  			</div>
  		<?php } ?>
  		</div>

  		<div class="container">
  			<div class="swiper-pagination"></div>
  		</div>

  	</div>
  </header>
  <!-- END Site header -->
  
