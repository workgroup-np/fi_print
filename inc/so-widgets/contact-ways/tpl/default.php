<section class="bg-secondary section-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-9">
				<ul class="contact-ways">
					<?php foreach($instance['contact_ways_repeater'] as $item) : ?>					
					<li>
						<?php if ( ! empty( $item['title'] ) ) : ?>
							<small><?php echo esc_html($item['title']) ; ?></small>
						<?php endif; ?>
						<?php if ( ! empty( $item['content'] ) ) : ?>
							<h6><?php echo esc_html($item['content']) ; ?></h6>
						<?php endif; ?>
					</li>
				   <?php endforeach; ?>
				</ul>
			</div>

			<div class="col-sm-12 col-md-3 text-xs-right">
				<a class="btn btn-lg btn-primary-only" href="<?php echo esc_url( $instance['get_quote_link'] ); ?>"><?php echo esc_attr( $instance['get_quote_text'] );?></a>
			</div>
		</div>
	</div>
</section>