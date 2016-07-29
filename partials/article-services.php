<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
	exit();
} 
$post_id    =get_the_ID();
$description   = get_post_meta( get_the_ID(), 'fi_print_service', true );?>

<div class="col-xs-12 col-md-6 col-lg-3">
	<?php
	$thumbnail = get_post_thumbnail_id($post_id);
	$img_url   = wp_get_attachment_image_src( $thumbnail,'full');
	$alt       = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);
	if( $img_url ){
		$n_img = aq_resize( $img_url[0], $width =600, $height = 400, $crop = true, $single = true, $upscale = true ); 
	}?>

	<div class="card card-service" <?php if( $img_url ):?>style="background-image: url(<?php echo esc_url($n_img);?>)" <?php endif;?>>
		<div class="card-block">
			<p class="card-text"><?php echo esc_attr( $description );?></p>
			<a class="btn btn-primary-link" href="<?php the_permalink(); ?>"><?php _e('Read more','fi-print')?> <i class="fa fa-angle-right"></i></a>
			<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		</div>
	</div>
</div>

