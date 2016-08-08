<h5><?php echo esc_attr( $instance['title'] );?></h5>
<dl class="dl-horizontal row">
<?php if($instance['address'] && $instance['address']!="" ):?>
  <dt class="col-xs-4"><?php _e('Address:','fi_print');?></dt>
  <dd class="col-xs-8"><?php echo wp_kses_post( nl2br($instance['address']) );?></dd>
<?php endif; if($instance['phone'] && $instance['phone']!="" ):?>
  <dt class="col-xs-4"><?php _e('Phone:','fi_print');?></dt>
  <dd class="col-xs-8"><?php echo wp_kses_post( nl2br($instance['phone']) );?></dd>
<?php endif; if($instance['email'] && $instance['email']!="" ):?>
  <dt class="col-xs-4"><?php _e('Email:','fi_print');?></dt>
  <dd class="col-xs-8"><?php echo wp_kses_post( nl2br($instance['email']) );?></dd>
<?php endif;?>
</dl>