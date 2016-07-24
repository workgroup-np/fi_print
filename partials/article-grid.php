<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} $var_quote='';?>
 <div id="post-<?php the_ID(); ?>" <?php if ( has_post_format('quote') ): post_class("blog-quote-item col-md-4"); else : post_class("blog-item col-md-4"); endif;?>>
    <?php $check_video=0; $check_gallery=0; $check_audio=0;  $check_link=0; $var_quote=0;?>
        <!-- Gallery Post Format -->
          <?php if ( has_post_format('gallery') ) : $check_gallery=1; ?>

               <?php if ( get_post_gallery() ) :
                    $gallery = get_post_gallery( get_the_ID(), false ); ?>
                      <div class="fullwidthbanner-container">
                        <div class="fullwidthbanner">
                          <ul>
                            <?php foreach( $gallery['src'] AS $src ):
                              $img_url = wp_get_attachment_image_src( $src);
                              $n_img = aq_resize( $src, $width = 730, $height =  284, $crop = true, $single = true, $upscale = true ); ?>
                              <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                                <img class="img-responsive" src="<?php echo esc_url($n_img); ?>"  alt="" data-fullwidthcentering="on" alt="slide">
                              </li>
                            <?php endforeach;?>
                          </ul>
                        </div>
                      </div>
                <?php   endif;?>

        <?php   endif;  ?>
         <!-- Video Post Format -->
        <?php if (has_post_format('video')) :
        $check_video=1;
        $videoID = get_post_meta( $post->ID, 'video_id', true );?>
        <div class="iframe-responsive">
            <?php echo wp_oembed_get(esc_url($videoID));?>
        </div>
        <?php endif; ?>
        <!-- Audio Post Format -->
        <?php if (has_post_format('audio')) :
        $check_audio=1;
        ?>
        <div class="audio-responsive">
            <?php
            $audioID = get_post_meta( $post->ID, 'audio_id', true );
            echo wp_oembed_get( esc_url($audioID) );
            ?>
        </div>
        <?php endif; ?>
        <!-- Quote Post Format -->
        <?php if (has_post_format('quote')) :
        $var_quote=1; ?>
            <a href="<?php the_permalink();?>">

                    <div class="blog-text">
                    <p>"<?php echo esc_attr(get_post_meta( $post->ID, 'q_content', true )); ?>"</p>
                    <h6><?php echo esc_attr(get_post_meta( $post->ID, 'q_author', true )); ?></h6>
                    </div>

            </a>
        <?php endif; ?>
        <!-- Link Post Format -->
        <?php if (has_post_format('link')) :
        $check_link=1; ?>
            <div class="link">
                <span class="link-title"><?php echo esc_attr(get_post_meta( $post->ID, 'link_title', true )); ?><?php _e( ':','fi_print');?></span>
                <a href="<?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?>"><strong><?php echo esc_attr(get_post_meta( $post->ID, 'link_url', true )); ?></strong></a>
            </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail() && (!is_single() || !is_page()) && ($check_video==0 && $check_gallery==0 && $check_audio==0 && $var_quote==0 && $check_link==0 )) :
            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
            $thumb = get_post($att);
            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
            else { $att_ID = $post->ID; $att_url = $post->guid; }
            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
            ?>
            <a href="<?php the_permalink();?>">
                <?php  $thumbnail = get_post_thumbnail_id();
                   $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                   $n_img = aq_resize( $img_url[0], $width = 350, $height = 236, $crop = true, $single = true, $upscale = true );
                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/>
            </a>
        <?php endif; ?>

        <?php if($var_quote==0):?>
            <div class="blog-text">
            <div class="icon-single">
                <?php if (has_post_format('image')) :  ?>
                <i class="fa fa-image"></i>
                <?php elseif (has_post_format('video')) : ?>
                <i class="fa fa-film"></i>
                <?php elseif (has_post_format('gallery')) :  ?>
                <i class="fa fa-picture-o"></i>
                <?php elseif (has_post_format('audio')) :  ?>
                <i class="fa fa-volume-up"></i>
                <?php elseif (has_post_format('link')) :  ?>
                <i class="fa fa-link"></i>
                <?php else :  ?>
                <i class="fa fa-pencil"></i>
                <?php endif; ?>
            </div>
                <h6><a href="<?php the_permalink(); ?>"><?php fi_print_post_title();?></a></h6>
                <span><?php echo get_the_date('d  F  Y') ?> <?php _e('/','fi_print'); ?> <?php comments_number( '0', '1', '%' ); ?> <?php _e('/','fi_print'); ?>  <?php if (get_the_category()) : ?><?php the_category(',');endif; ?></span>
                <?php the_excerpt(); ?>
                <div class="border-button"><a href="<?php the_permalink(); ?>"><?php _e('Read more','fi_print'); ?></a></div>
            </div>
        <?php endif;?>
    </div><!-- end blog -->
