    <?php if( !empty($instance['title']) ) echo '<h5><strong>'.esc_attr($instance['title']).'</strong></h5>';
         if( !empty($instance['sub_title']) )  echo '<p>'.esc_attr($instance['sub_title']).'</p><br>';?>

        <ul class="faq">
        <?php foreach ( $instance['faq_repeater'] as $i => $faq ){ ?>
                <li class="<?php if( $i==0 ) echo 'open';?>">
                    <?php if ( ! empty( $faq['question'] ) ) : ?>
                        <h6><?php echo esc_attr( $faq['question'] );   ?></h6>
                    <?php endif; ?>

                    <?php if ( ! empty( $faq['answer'] ) ) : ?>
                        <p class="faq-body"><?php echo esc_attr( $faq['answer'] );  ?></p>
                    <?php endif; ?>

                </li>   
        <?php }?>
        </ul>


