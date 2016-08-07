<div class="col-xs-12 col-md-8 col-xl-9">

    <div class="row">

        <?php   foreach ( $instance['services_repeater'] as $services_detail ){ 

            $image_url = wp_get_attachment_image_src($services_detail['image'], 'full'); ?>

            <div class="col-xs-12 col-lg-6"> 

                <div class="media">

                    <a class="media-left" href="#">

                        <img class="media-object" src="<?php echo esc_url( $image_url[0] ); ?>" alt="...">

                    </a>

                    <div class="media-body">

                        <?php if ( ! empty( $services_detail['title'] ) ) : ?>

                            <h4 class="media-heading"><?php echo esc_attr( $services_detail['title'] );   ?></h4>

                        <?php endif; ?>

                        <?php if ( ! empty( $services_detail['sub_title'] ) ) : ?>

                            <p><?php echo esc_attr($services_detail['sub_title']) ; ?></p>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <?php } ?>

        </div>

    </div>
