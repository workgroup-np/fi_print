<!-- Our services -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<header class="section-header header-bold">
					<?php if ( ! empty( $instance['primary_title'] ) ) : ?>
						<h2><?php echo esc_html( $instance['primary_title'] ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $instance['title_content'] ) ) : ?>
						<p><?php echo esc_html( $instance['title_content'] ); ?></p>
					<?php endif; ?>
				</header>
			</div>

			<div class="col-xs-12 col-md-8">
				<div class="swiper-container services-slider">
					<div class="swiper-wrapper">
						<?php   foreach ( $instance['sliding-services_repeater'] as $services_detail ){ 
							$image_url = wp_get_attachment_image_src($services_detail['image'], 'full');?>
							<div class="swiper-slide">
								<div class="card card-content">
									<a href="#"><img class="card-img" src="<?php echo esc_url( $image_url[0] ); ?>" alt="..."></a>
									<div class="card-block">
										<?php if ( ! empty( $services_detail['title'] ) ) : ?>
											<h5 class="card-title"><a href="#"><?php echo esc_attr( $services_detail['title'] ); ?></a></h5>
										<?php endif; ?>
										<?php if ( ! empty( $services_detail['sub_title'] ) ) : ?>
											<p class="card-text"><?php echo esc_attr($services_detail['sub_title']) ; ?></p>
										<?php endif; ?>
										<?php if( empty($services_detail['readmore_text'])): ?>
										<a class="btn btn-primary-link" href="<?php echo  esc_url( $services_detail['read_more_link'])?>"><?php echo  esc_attr ($services_detail['read_more_text']) ?> <i class="fa fa-angle-right"></i></a>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php } ?>
						</div>

						<div class="swiper-pagination"></div>

					</div>

				</div>

			</div>

		</div>
	</section>
	<!-- END Our services -->
