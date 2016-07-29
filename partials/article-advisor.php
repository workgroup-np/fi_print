<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
	exit();
} 
$post_id    =get_the_ID();
$age        = get_post_meta( get_the_ID(), 'fi_print_age', true );
$expert_in  = get_post_meta( get_the_ID(), 'fi_print_expertin', true );
$experience = get_post_meta( get_the_ID(), 'fi_print_experience', true );
$phone      = get_post_meta( get_the_ID(), 'fi_print_phone', true );
$email      = get_post_meta( get_the_ID(), 'fi_print_email', true );
$facebook   = get_post_meta( get_the_ID(), 'fi_print_facebook', true );
$twitter    = get_post_meta( get_the_ID(), 'fi_print_twitter', true );
$googlep    = get_post_meta( get_the_ID(), 'fi_print_googlep', true );
$linkedin   = get_post_meta( get_the_ID(), 'fi_print_linkedin', true );

$terms = get_the_terms( get_the_ID(), 'advisor_post' );
if ( $terms && ! is_wp_error( $terms ) ) : 
 
    $categories = array();
 
    foreach ( $terms as $term ) {
        $categories[] = $term->name;
    }
                         
    $designation = join( ", ", $categories );
    ?>
<?php endif; ?>

<div class="col-xs-12 col-md-6 col-lg-3">
	<?php
	$thumbnail = get_post_thumbnail_id($post_id);
	$img_url   = wp_get_attachment_image_src( $thumbnail,'full');
	$alt       = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);
	if($img_url):
		$n_img = aq_resize( $img_url[0], $width =255, $height = 275, $crop = true, $single = true, $upscale = true );?>

	<div class="card card-advisor">
		<a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php echo esc_url($n_img);?>" alt="<?php echo esc_attr($alt);?>"></a>
	<?php endif;?>
	<div class="card-block">
	<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p class="card-text"><?php echo esc_attr( $designation );?></p>
		<ul class="social-icons size-sm">
			<?php if( $facebook ):?>
				<li><a href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook"></i></a></li>
			<?php endif;?>

			<?php if( $twitter ):?>
				<li><a href="<?php echo esc_url($twitter);?>"><i class="fa fa-twitter"></i></a></li>
			<?php endif;?>

			<?php if( $googlep ):?>
				<li><a href="<?php echo esc_url($facebook);?>"><i class="fa fa-google-plus"></i></a></li>
			<?php endif;?>

			<?php if( $linkedin ):?>
				<li><a href="<?php echo esc_url($facebook);?>"><i class="fa fa-linkedin"></i></a></li>
			<?php endif;?>
		</ul>
	</div>
</div>
</div>
