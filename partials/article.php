<?php // Exit if accessed directly
if ( !defined('ABSPATH') )
{
echo '<h1>Forbidden</h1>';
exit();
} 
global $post; $author_id=$post->post_author;?>

<div class="col-xs-12 col-md-6 col-lg-4">
	<div class="card card-content">
		<?php if ( has_post_thumbnail() ) :

			$att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
			$thumb = get_post($att);
			if ( is_object($thumb) ) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
			else { $att_ID = $post->ID; $att_url = $post->guid; }
			$att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
			$thumbnail = get_post_thumbnail_id();
			$fi_print_img_url = wp_get_attachment_image_src( $thumbnail,'full');
			$fi_print_n_img = aq_resize($fi_print_img_url[0], $width = 255, $height =  170, $crop = true, $single = true, $upscale = true);
            ?>
            
           <a href="<?php the_permalink(); ?>"><img class="card-img" src="<?php echo esc_url($fi_print_n_img); ?>" alt="..."></a>
        <?php endif; ?>

        <div class="card-block">
          <h5 class="card-title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h5>
          <time datetime="<?php the_time();?>"><?php the_time('jS F, Y') ?></time>
          <p class="card-text"><?php echo the_excerpt();?></p>
          <a class="btn btn-primary-link" href="<?php the_permalink(); ?>"><?php _e('Continue reading ', 'fi_print'); ?><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
</div>
