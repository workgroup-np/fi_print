<?php $image_url = wp_get_attachment_image_src( $instance['image'], 'full');
if( !empty($image_url) ) echo '<section><div class="card card-imagely" style="background-image: url('.esc_attr($image_url[0]).')">';?>
    <?php if( !empty($instance['title']) ) echo '<h6>'.esc_attr($instance['title']).'</h6>';
         if( !empty($instance['sub_title']) )  echo '<p>'.esc_attr($instance['sub_title']).'</p><br>'; 

         foreach ( $instance['skill_repeater'] as $skill_detail ){ ?>
            <div class="skill">
                <div class="skill-data <?php if( !empty($image_url) ) echo 'color-alt';?>">
                    <?php if ( ! empty( $skill_detail['skill_title'] ) ) : ?>
                        <h6><?php echo esc_attr( $skill_detail['skill_title'] );   ?></h6>
                    <?php endif; ?>

                    <?php if ( ! empty( $skill_detail['skill_percent'] ) ) : ?>
                        <span><?php echo esc_attr( $skill_detail['skill_percent'] ).'%';  ?></span>
                    <?php endif; ?>

                </div>
                <?php if ( ! empty( $skill_detail['skill_percent'] ) ) : ?>
                    <progress class="progress <?php if( empty($image_url) ) echo 'no-border';?>" value="<?php echo esc_attr( $skill_detail['skill_percent'] ); ?>" max="100"><?php echo esc_attr( $skill_detail['skill_percent'] );?></progress>
                <?php endif; ?>    
            </div>
    <?php }
if( !empty($image_url) ) echo '</div></section>';?>

