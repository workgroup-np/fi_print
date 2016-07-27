<!-- Testimonial -->
<?php if( 'one' == $instance['testimonial_style'] ) : ?>
	<div class="col-xs-12 col-md-10">
		<header class="section-header">
			<?php if (!empty( $instance['title'] )) :?>
				<h2><?php echo esc_attr( $instance['title']) ?></h2>
			<?php endif; ?>
			<?php if (!empty( $instance['sub_title'] )) :?>
				<small><?php echo esc_attr( $instance['sub_title']);?></small>
			<?php endif; ?>  
		</header>
	</div>

	<div class="col-xs-12 col-md-2 text-xs-right m-t-3">
		<div class="testimonial-button-prev"></div>
		<div class="testimonial-button-next"></div>
	</div>
</div>


<div class="swiper-container testimonial-slider">
	<div class="swiper-wrapper">
		<?php   foreach ( $instance['testimonial_repeater'] as $testimonial_repeater ){ 
			$image_url = wp_get_attachment_image_src( $testimonial_repeater['testimonial_client_image'], 'full' ); 
			?>
			<div class="swiper-slide">
				<div class="person">
					<?php
					if( $image_url ) :?>
					<img src="<?php echo esc_url( $image_url[0] )?>" alt="...">
				<?php  endif;?>
				<?php if ( ! empty( $testimonial_repeater['testimonial_client_name'] ) ) : ?>
					<h5><?php echo esc_attr( $testimonial_repeater['testimonial_client_name'] );?></h5>
				<?php  endif;?>
				<?php if ( ! empty( $testimonial_repeater['testimonial_client_url'] ) ) : ?>
					<small><?php echo esc_attr( $testimonial_repeater['testimonial_client_url'] );?></small>
				<?php  endif;?>
				<?php if ( ! empty( $testimonial_repeater['testimonial_client_site'] ) ) : ?>
					<p><?php echo esc_attr( $testimonial_repeater['testimonial_client_site'] );?></p>
				<?php  endif;?>
			</div>
		</div>
		<?php } ?>
	</div>
<?php endif; ?>
<?php if( 'two' == $instance['testimonial_style'] ) : ?>
	<!-- User speeches -->
	<section>
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-md-5">
					<header class="section-header header-bold">
						<?php if ( ! empty( $instance['title'] ) ) : ?>
							<h2><?php echo esc_html( $instance['title'] ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
							<p><?php echo esc_html( $instance['sub_title'] ); ?></p>
						<?php endif; ?>
					</header>
				</div>

				<div class="col-xs-12 col-md-7">

					<div class="swiper-container speeches-slider">
						<div class="swiper-wrapper">
							<?php   foreach ( $instance['testimonial_repeater'] as $testimonial_repeater ){ 
								$image_url = wp_get_attachment_image_src( $testimonial_repeater['testimonial_client_image'], 'full' ); 
								?>
								<div class="swiper-slide">
									<div class="testimonial">
										<div class="testimonial-img">
											<img src="<?php echo esc_url( $image_url[0] )?>" alt="...">
										</div>

										<div class="testimonial-body">
											<?php if ( ! empty( $testimonial_repeater['testimonial_client_name'] ) ) : ?>
												<h5><?php echo esc_attr( $testimonial_repeater['testimonial_client_name'] );?></h5>
											<?php  endif;?>
											<?php if ( ! empty( $testimonial_repeater['testimonial_client_url'] ) ) : ?>
												<small><?php echo esc_attr( $testimonial_repeater['testimonial_client_url'] );?></small>
											<?php  endif;?>
											<?php if ( ! empty( $testimonial_repeater['testimonial_client_site'] ) ) : ?>
												<p><?php echo esc_attr( $testimonial_repeater['testimonial_client_site'] );?></p>
											<?php  endif;?>
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
		<!-- END User speeches -->


	<?php endif; ?>
<!-- END Testimonial -->