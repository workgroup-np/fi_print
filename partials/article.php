<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} 
global $post; $author_id=$post->post_author;?>
<?php if (is_single()): ?>
	<article class="post">
			<?php if (has_post_thumbnail()) :

                $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                $thumb = get_post($att);
                if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                else { $att_ID = $post->ID; $att_url = $post->guid; }
                $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                ?>
            
                    <div class="post-thumbnail">
                 <?php echo get_the_post_thumbnail(get_the_ID(), 'fi_print-single-news'); ?>
                    </div>
                 <?php endif; ?> 

	         
	                <header class="entry-header">
	                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	                  <ul class="entry-header-meta">
	                    <li><?php the_time('jS F, Y') ?></li>
	                    <li><?php _e('By: ', 'fi_print'); ?> <a href=" <?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php  echo  the_author_meta( 'display_name',$author_id );?></a></li>
	                  </ul>
	                </header>

	                <div class="entry-content">
	                  <?php echo the_content();?>
	                </div>

	                <?php 
	                $categories = get_the_category();
					$separator = ',';
					$output = '';
					if ( ! empty( $categories ) ) {
	    				foreach( $categories as $category ) {
	        			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ). '">' . esc_html( $category->name ) . '</a>' . $separator;
    					}
    				}?>

	                <footer class="entry-meta">
	                  <p class="categories"><strong>Category:</strong> <?php echo trim( $output, $separator );?></p>
	                </footer>
	</article>

<?php else:?>
<div class="col-xs-12 col-md-6 col-lg-4">
	<div class="card card-content">
		<?php if (has_post_thumbnail()) :

            $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
            $thumb = get_post($att);
            if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
            else { $att_ID = $post->ID; $att_url = $post->guid; }
            $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
            ?>
            
           <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'fi_print-news-thumb', array('class' => 'card-img')); ?></a>
        <?php endif; ?>

        <div class="card-block">
          <h5 class="card-title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h5>
          <time datetime="<?php the_time();?>"><?php the_time('jS F, Y') ?></time>
          <p class="card-text"><?php echo the_excerpt();?></p>
          <a class="btn btn-primary-link" href="<?php the_permalink(); ?>"><?php _e('Continue reading ', 'fi_print'); ?><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
</div>
<?php endif;?>