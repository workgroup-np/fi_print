<?php $src=wp_get_attachment_image_src($instance['image'],'full'); ?>
          
<div class="video-preview">
    <?php if( !empty($src) ):?><img src="<?php echo esc_url($src[0]);?>" alt="..."><?php endif;?>
    <?php if( !empty($instance['url']) ):?><a <?php if( $instance['icon']=='square' ) echo 'class="square"';?> href="<?php echo esc_url( $instance['url'] );?>" data-lity=""></a><?php endif;?>
</div>
