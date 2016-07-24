<section class="bg-img-light" style="background-image: url(assets/img/img-9.jpg)">
	<div class="container">
		<header class="section-header">
			<?php if (!empty( $instance['title'] )) :?>
				<h2><?php echo esc_attr( $instance['title']) ?></h2>
			<?php endif; ?>
			<?php if (!empty( $instance['sub_title'] )) :?>
				<small><?php echo esc_attr( $instance['sub_title']);?></small>
			<?php endif; ?> 
		</header>
		<div class="row">
		<?php
		$post_number = $instance['post_number'];
		$qargs = array(
			'posts_per_page' => esc_attr( $post_number ),
			'no_found_rows'  => true,
		);
		$all_posts = get_posts( $qargs );
		// echo '<pre>';
		// var_dump($all_posts);
		// echo "</pre>";
		if ( ! empty( $all_posts ) ) :  ?>
		<?php global $post; ?>
		<?php foreach ( $all_posts as $key => $post ) :  
		setup_postdata( $post ); 
		$img_url             = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full'); //get img 
		$src                 = aq_resize( $img_url[0], $width = 255, $height = 258, $crop = true, $single = true, $upscale = true ); 
		$formatted_post_date = get_the_date( $format, $post->ID); 	
		?>
			<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="card card-news" style="background-image: url(<?php echo esc_url( $src );?>)">
					<div class="card-block">
						<time datetime="<?php echo $post->post_date;?>"><?php echo $formatted_post_date ?></time>
						<h5 class="card-title"><a href="<?php the_permalink(); ?>"> <?php the_title() ?></a></h5>
						<p class="card-text"><?php echo wp_trim_words( get_the_content(), 10, '...' );?></p>
						<a class="btn btn-primary-link" href="<?php the_permalink() ?>"><?php _e( 'Continue reading', 'fi_print' ) ?><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>

	</div>
</section>  