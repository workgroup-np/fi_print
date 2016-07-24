<br><br><br>
<ul class="counter color-alt">
	<?php   foreach ( $instance['counter_repeater'] as $counter_repeater ){ ?>
		<li>
			<?php if ( ! empty( $counter_repeater['counter_percent'] ) ) : ?>
				<h5><span data-from ="0" data-to="<?php echo esc_attr( $counter_repeater['counter_percent'] );?>"><?php echo esc_attr( $counter_repeater['counter_percent'] );   ?></span></h5>
			<?php endif; ?>
			<?php if ( ! empty( $counter_repeater['counter_title'] ) ) : ?>
				<h6><?php echo esc_attr( $counter_repeater['counter_title'] );   ?></h6>
			<?php endif; ?>
		</li>
	<?php } ?>
</ul>
