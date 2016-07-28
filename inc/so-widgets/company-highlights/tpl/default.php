<section class="border-bottom company-highlights">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 col-md-6 col-lg-3">
              <header class="section-header header-bold">
					<?php if ( ! empty( $instance['primary_title'] ) ) : ?>
					<h2><?php echo esc_html( $instance['primary_title'] ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $instance['title_content'] ) ) : ?>
					<p><?php echo esc_html( $instance['title_content'] ); ?></p>
					<?php endif; ?>
              </header>
            </div>
        	<?php foreach($instance['company_highlights_repeater'] as $item) : ?>
		  		<div class="col-xs-12 col-md-6 col-lg-3 feature">
				<?php if ( ! empty( $item['icon'] ) ) : ?>
				<?php echo siteorigin_widget_get_icon( $item['icon'] );?>
				<?php endif; ?>
				<?php if ( ! empty( $item['title'] ) ) : ?>
				<h5><?php echo esc_html($item['title']) ; ?></h5>
				<?php endif; ?>
				<?php if ( ! empty( $item['sub_title'] ) ) : ?>
				<p><?php echo esc_html($item['sub_title']) ; ?></p>
				<?php endif; ?>
            	</div>
			 <?php endforeach; ?>
        </div>
    </div>
</section>