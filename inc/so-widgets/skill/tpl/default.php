<section>
<div class="card card-imagely" style="background-image: url(assets/img/img-2.jpg)">
    <h6>We are expert</h6>
    <p>Lorem ipsum dolor sit amet, tuer adipiscing elit, sed diam nonnibh euismod tincidunt ut laoreet</p>
    <br>
    <?php foreach ( $instance['skill_repeater'] as $skill_detail ){ ?>
        <div class="skill">
            <div class="skill-data color-alt">
                <?php if ( ! empty( $skill_detail['skill_title'] ) ) : ?>
                    <h6><?php echo esc_attr( $skill_detail['skill_title'] );   ?></h6>
                <?php endif; ?>

                <?php if ( ! empty( $skill_detail['skill_percent'] ) ) : ?>
                    <span><?php echo esc_attr( $skill_detail['skill_percent'] );  ?></span>
                <?php endif; ?>

            </div>
            <?php if ( ! empty( $skill_detail['skill_percent'] ) ) : ?>
                <progress class="progress" value="<?php echo esc_attr( $skill_detail['skill_percent'] ); ?>" max="100"><?php echo esc_attr( $skill_detail['skill_percent'] );?></progress>
            <?php endif; ?>    
        </div>
    <?php } ?>
</div>
</section>