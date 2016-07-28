<?php
// Template Name: Portfolio Three Column V2
 // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php  global $fi_print_options;
$number=esc_attr($fi_print_options['portfolio_number']);
$args=array('post_type'=>'portfolio','posts_per_page'=>$number,'post_status'=>'publish');
$portfolio_query=new WP_Query($args);
$w='360';
$h='345';
?>
    <section class="p-t-0">
        <div class="container">
           <?php
            $arguments = array(
            'type'                     => 'portfolio',
            'taxonomy'                 => 'portfolio_filter',
            'pad_counts'               => false
            );
            $categories = get_categories( $arguments );?>
            <div id="projects-filter" class="shuffle-filter">
                <a href="#"  class="active" data-group="all"><?php _e( 'All', 'fi_print' ); ?></a>
                <?php foreach($categories as $i=>$category) { ?>
                <a data-group="<?php echo $category->slug; ?>" href="#"><?php echo $category->name; ?></a>
                <?php } ?>
            </div>
            <?php if ($portfolio_query->have_posts()) : ?>
          <div id="shuffle-grid" class="row">
            <div class="col-xs-1 shuffle-sizer"></div>
            <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
            <?php
            $portfolio_item_title = get_the_title( $post->ID );
            $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
            $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
             $terms = get_the_terms( $post->ID, 'portfolio_filter' );
            if ( $terms && ! is_wp_error( $terms ) ) :
                $term_links = array();
                foreach ( $terms as $term ) {
                    $term_links[] = '"'.$term->slug.'"';
                }

                $filters = join( ",", $term_links );
            endif;
            ?>
            <div class="col-xs-6 col-md-4 shuffle-item" data-groups='[<?php echo esc_attr($filters); ?>]'>
                
                    <?php $thumbnail = get_post_thumbnail_id($post->ID);
                       $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                       $n_img = aq_resize( $img_url[0], $width = $w, $height = $h, $crop = true, $single = true, $upscale = true );
                    ?>
                  <div class="card card-portfolio-3" style="background-image: url(<?php echo esc_url($img_url[0]);?>)">
                    <div class="card-block">
                      <h5 class="card-title">
                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        <small><?php
                            $filters = get_the_terms($post->ID,'portfolio_filter');
                            $c_filter = '';
                            if(!empty($filters)){
                                foreach($filters as $f=>$filter){
                                    $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                }
                                echo esc_html($c_filter);
                            }
                        ?></small>
                      </h5>
                      <p class="card-text"><?php fi_print_the_excerpt_max_charlength(150);?></p>
                    </div>
                  </div>                
            </div>
            <?php endwhile; ?>
        </div>
        <br><br>
        <nav class="text-xs-center">
            <ul class="pagination">
                <?php if ($wp_query->max_num_pages>1) : fi_print_pagination(); endif; ?>
            </ul>
        </nav>
    <?php else : ?>
        <?php get_template_part('partials/nothing-found'); ?>
    <?php endif; wp_reset_query();?>

    </div>
</section>
<?php get_footer(); ?>