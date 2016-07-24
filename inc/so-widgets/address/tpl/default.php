<section class="section-sm">
        <header class="section-header">
        <?php
        if ( ! empty( $instance['title'] ) ) : ?>
        <h5><?php echo  esc_html( $instance['title'] )?></h5>
        <?php endif; ?>
        </header>

        <div class="row">
        <?php if( ! empty( $instance['address_repeater'] ) ) : ?>
            <?php foreach($instance['address_repeater'] as $item) : ?>
            <div class="col-sm-4">
                <div class="media media-iconic">
                    <?php if ( ! empty( $item['icon'] ) ) : ?>
                        <div class="media-left">
                            <?php echo siteorigin_widget_get_icon( $item['icon'] );?>
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $item['contact'] ) ) : ?>
                    <div class="media-body">
                     <p><?php echo esc_html($item['contact']) ; ?></p>
                    </div>
                       <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif ?>
        </div>
</section>