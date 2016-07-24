<?php
// Template Name: Portfolio Four Column
 // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php  global $fi_print_options;
$number=esc_attr($fi_print_options['portfolio_number']);
query_posts('post_type=portfolio&posts_per_page='.$number.'&post_status=publish&paged='. get_query_var('paged'));
$w='360';
$h='345';
?>
<section class="on-homepage portfolio">
<div class="container">
    <?php
    $arguments = array(
    'type'                     => 'portfolio',
    'taxonomy'                 => 'portfolio_filter',
    'pad_counts'               => false
    );
    $categories = get_categories( $arguments );?>
    <div id="projects-filter" class="text-left">
        <a href="#"  data-filter="*" class="active"><?php _e( 'All', 'fi_print' ); ?></a>
        <?php foreach($categories as $i=>$category) { ?>
        <a data-filter=".<?php echo $category->slug; ?>" href="#"><em><?php echo '0'.++$i.'.';?></em><?php echo $category->name; ?></a>
        <?php } ?>
    </div>

    <?php if (have_posts()) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row" id="portfolio-grid">
                    <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $portfolio_item_title = get_the_title( $post->ID );
                    $image_url= wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
                    $thumb =  wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                     $terms = get_the_terms( $post->ID, 'portfolio_filter' );
                    if ( $terms && ! is_wp_error( $terms ) ) :
                        $term_links = array();
                        foreach ( $terms as $term ) {
                            $term_links[] = $term->slug;
                        }

                        $filters = join( " ", $term_links );
                    endif;
                    ?>
                    <div class="item col-md-3 col-sm-6 col-xs-12 <?php echo esc_attr($filters); ?>">
                        <div class="thumb-holder">
                            <?php $thumbnail = get_post_thumbnail_id($post->ID);
                               $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                               $n_img = aq_resize( $img_url[0], $width = $w, $height = $h, $crop = true, $single = true, $upscale = true );
                            ?><img src="<?php echo esc_url($n_img);?>" alt="">
                            <div class="thumb-content">
                                <div class="thumb-likes">
                                    <!-- <span><i class="fa fa-heart-o"></i>29</span> -->
                                </div>
                                <div class="thumb-text">
                                    <a href="<?php echo the_permalink();?>"><h4><?php fi_print_post_title(); ?></h4></a>
                                    <span><i class="fa fa-folder-o"></i>
                                    <?php
                                        $filters = get_the_terms($post->ID,'portfolio_filter');
                                        $c_filter = '';
                                        if(!empty($filters)){
                                            foreach($filters as $f=>$filter){
                                                $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                            }
                                            echo esc_html($c_filter);
                                        }
                                    ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <div class="work-button">
                    <?php if ($wp_query->max_num_pages>1) : ?>
                        <div class="blog-pagination">
                        <?php fi_print_pagination(); ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
    <?php else : ?>
        <?php get_template_part('partials/nothing-found'); ?>
    <?php endif; wp_reset_query();?>

</div>
</section>
<?php get_footer(); ?>