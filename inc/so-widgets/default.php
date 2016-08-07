<section class="section-xs bg-img">
<div class="col-xs-12 col-md-9">
  <header class="section-header border-left m-b-0">
    <h3><?php echo __( $instance['primary_title'] ); ?></h3>
    <small><?php echo esc_html( $instance['secondary_title'] ); ?></small>
  </header>
</div>

<div class="col-xs-12 col-md-3 text-xs-right m-t-1">
  <p><a <?php echo ($instance['target']?'target="_blank"':'');?> class="btn btn-lg btn-secondary-only" href="<?php echo esc_url( $instance['btnurl'] ); ?>"><?php echo esc_attr( $instance['btntext'] ); ?></a></p>
</div>
</section>