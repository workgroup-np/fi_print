<!-- Site header -->

<header class="site-header">
	<div class="swiper-container header-slider">
		<div class="swiper-wrapper">
	       <?php 
	       $i = 1;
	       foreach ( $instance['slider_repeater'] as $slider_detail ){ 
	       	if ( $i % 2 == 0 ) {
  				$class = 'left';
  				$offset = '';
			}
			else{
				$class = 'right';
				$offset = 'col-md-offset-6';
			}
	       	$image_url = wp_get_attachment_image_src($slider_detail['image'], 'full'); ?>
			<div class="swiper-slide slide-gradient-<?php echo $class ;?>" style="background-image: url(<?php echo esc_url( $image_url[0] ); ?>)">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 <?php echo $offset; ?> col-md-6 v-center">
							<?php if ( ! empty( $slider_detail['title'] ) ) : ?>
							<?php echo $slider_detail['title'];	?>
							<?php endif; ?>
							<?php if ( ! empty( $slider_detail['sub_title'] ) ) : ?>
							<p class="lead"><?php echo esc_attr($slider_detail['sub_title']) ;	?></p>
							<?php endif; ?>
							<p><a class="btn btn-primary" href="<?php echo esc_url($instance['url']) ?>" <?php if(!empty($instance['new_window'])) echo 'target="_blank"'; ?>>
								<?php echo esc_html($instance['text']) ?><i class="fa fa-angle-right"></i>
							</a></p>
						</div>
					</div>
				</div>
			</div>
			<?php $i++; } ?>

		</div>

		<div class="container swiper-button-bottom">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>

	</div>
</header>
<!-- END Site header-->
 