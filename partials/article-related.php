<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
 <?php $cat = get_the_category($post->ID);
    $category_id = array();
    foreach($cat as $individual_category)
    {
      $category_id[] = $individual_category->term_id;
    }
    $category_link = get_category_link( $category_id[0] );
    $args=array(
        'category__in' => $category_id,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 2,
        'orderby'=>'rand'
        );
      $my_query = new wp_query( $args );
if( $my_query->have_posts() ) :?>
  <div class="similar-posts">
    <h2><?php _e('Similar Posts','fi_print');?></h2>
      <div class="row">
        <?php while( $my_query->have_posts() )  :$my_query->the_post(); ?>
          <div class="similar-item col-md-6">
             <a href="#">
                <?php  $thumbnail = get_post_thumbnail_id();
                   $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                   $n_img = aq_resize( $img_url[0], $width = 350, $height = 236, $crop = true, $single = true, $upscale = true );
                ?><img src="<?php echo esc_url($n_img);?>" class="img-responsive"/>
            </a>
            <h6><a href="<?php the_permalink(); ?>"><?php fi_print_post_title();?></a></h6>
            <span><?php echo get_the_date('d  F  Y') ?> <?php _e('/','fi_print'); ?>   <?php if (get_the_category()) : ?><?php the_category(',');endif; ?></span>
          </div>
        <?php endwhile;?>
    </div>
  </div>
<?php endif; wp_reset_postdata();?>
