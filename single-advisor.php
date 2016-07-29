<?php
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
	exit();
} 
get_header();
$age        = get_post_meta( get_the_ID(), 'fi_print_age', true );
$expert_in  = get_post_meta( get_the_ID(), 'fi_print_expertin', true );
$experience = get_post_meta( get_the_ID(), 'fi_print_experience', true );
$phone      = get_post_meta( get_the_ID(), 'fi_print_phone', true );
$email      = get_post_meta( get_the_ID(), 'fi_print_email', true );
$attributes = get_post_meta( get_the_ID(), 'fi_print_advisor_attribute_repeat_group', true );
?>


<section class="p-t-0">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-7">
              <div class="media media-advisor">
				<?php
				$thumbnail = get_post_thumbnail_id( get_the_ID() );
				$img_url   = wp_get_attachment_image_src( $thumbnail,'full');
				$alt       = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);
				if($img_url):
				$n_img = aq_resize( $img_url[0], $width =270, $height = 270, $crop = true, $single = true, $upscale = true );?>
                <a class="media-left" href="#">
                  <img class="media-object img-thumbnail img-shadow" src="<?php echo esc_url($n_img);?>" alt="<?php echo esc_attr($alt);?>">
                </a>
            	<?php endif;?>
                <div class="media-body v-center">
                  <ul class="advisor-detail">
                    <li><strong><?php _e('Name:','fi_print')?></strong><?php the_title();?></li>

                    <?php if($expert_in):?>
                    <li><strong><?php _e('Expert in:','fi_print')?></strong><?php echo esc_attr( $expert_in );?></li>
                	<?php endif;?>
                    
                    <?php if($age):?>
                    <li><strong><?php _e('Age:','fi_print')?></strong><?php echo esc_attr( $age );?></li>
                    <?php endif;?>
                    
                    <?php if($experience):?>
                    <li><strong><?php _e('Experiences:','fi_print')?></strong><?php echo esc_attr( $experience );?></li>
                    <?php endif;?>
                    
                    <?php if($email):?>
                    <li><strong><?php _e('Email:','fi_print')?></strong><?php echo esc_attr( $email );?></li>
                    <?php endif;?>
                    
                    <?php if($phone):?>
                    <li><strong><?php _e('Phone:','fi_print')?></strong><?php echo esc_attr( $phone );?></li>
                    <?php endif;?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-lg-5">
				<?php setup_postdata( get_the_ID() );
				the_content();
				wp_reset_postdata( get_the_ID() ); ?>
            </div>
          </div>
        </div>
      </section>

      <section class="p-t-0">
        <div class="container">
          <div class="row">

          <?php foreach ($attributes as $key => $attribute):
				if ( isset( $attribute['title'] ) )
				$title = esc_html( $attribute['title'] );
				
				if ( isset( $attribute['description'] ) )
				$description = esc_html( $attribute['description'] );?>
				
         
            <div class="col-xs-12 col-md-4">
              <?php if( $title ):?><h5 class="border-bottom"><?php echo esc_attr( $title );?></h5><?php endif;?>
              <?php if( $description ):?><p><?php echo nl2br( esc_attr( $description ) );?></p><?php endif;

          	if( isset( $attribute['bullet_points'] ) && !empty( $attribute['bullet_points'] ) ):?>

              <ul class="ul-bold">

              	<?php foreach ($attribute['bullet_points'] as $i => $point):?>              	
                
                	<li><?php echo esc_attr($point);?></li>

            	<?php endforeach;?>
              </ul>

          	<?php endif;?>

            </div>

        	<?php endforeach;?>

          </div>
        </div>
      </section>

<?php get_footer();?>
