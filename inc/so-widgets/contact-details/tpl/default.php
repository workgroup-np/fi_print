<section class="section-sm p-t-0">
<div class="row">
        <div class="col-sm-4">
                      <div class="media media-iconic">
                        <div class="media-left">
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="media-body">
                          <p><?php echo wp_kses_post( nl2br($instance['address']) );?></p>
                        </div>
                      </div>
        </div>
        <div class="col-sm-4">
                      <div class="media media-iconic">
                        <div class="media-left">
                          <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                          <p><?php echo wp_kses_post( nl2br($instance['phone']) );?></p>
                        </div>
                      </div>
        </div>
        <div class="col-sm-4">
                      <div class="media media-iconic">
                        <div class="media-left">
                          <i class="fa fa-envelope"></i>
                        </div>
                        <div class="media-body">
                          <p><?php echo wp_kses_post( nl2br($instance['email']) );?></p>
                        </div>
                      </div>
        </div>
    </div>
</section>