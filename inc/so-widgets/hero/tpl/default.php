<?php $image_url = wp_get_attachment_image_src($instance['image'], 'full'); ?>
  <div class="col-xs-12 col-md-6 vh-center hero" style="background-image: url(<?php echo esc_url( $image_url[0] ); ?>">
  <?php echo $instance['content']; ?>
</div>