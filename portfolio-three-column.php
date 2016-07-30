<?php
// Template Name: Portfolio Three Column
 // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php  global $fi_print_options;
$number=esc_attr($fi_print_options['portfolio_number']);
$paged=(get_query_var('paged'))?get_query_var('paged'):1;
$args=array(
    'post_type'=>'portfolio',
    'paged'=>$paged,
    'posts_per_page'=>$number,
    'order'=>'DESC',
    'orderby'=>'date'
);
$portfolio_query= query_posts($args); global $wp_query;
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
                <a href="#"  class="active" data-group="all"><?php _e( 'All', 'fi-print' ); ?></a>
                <?php foreach($categories as $i=>$category) { ?>
                <a data-group="<?php echo $category->slug; ?>" href="#"><?php echo $category->name; ?></a>
                <?php } ?>
            </div>
            <?php if (have_posts()) : ?>
          <div id="shuffle-grid" class="row">
            <div class="col-xs-1 shuffle-sizer"></div>
            <?php while (have_posts()) : the_post(); ?>
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
                <div class="card card-portfolio-2">
                    <?php $thumbnail = get_post_thumbnail_id($post->ID);
                       $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                    ?><a href="<?php the_permalink();?>"><img class="card-img" src="<?php echo esc_url($img_url[0]);?>" alt=""></a>
                    <?php 
                        $budget=get_post_meta(get_the_ID(), 'portfolio_budget',true);
                        $advisor=get_post_meta(get_the_ID(), 'portfolio_advisor',true);
                        $duration=get_post_meta(get_the_ID(), 'portfolio_duration',true);
                        $satisfaction=get_post_meta(get_the_ID(), 'portfolio_satisfaction',true);
                    ?>
                    <a class="card-img-overlay" href="<?php the_permalink();?>">
                      <div class="card-block">
                        <h5 class="card-title"><?php the_title();?></h5>
                        <p class="card-text"><?php
                            $filters = get_the_terms($post->ID,'portfolio_filter');
                            $c_filter = '';
                            if(!empty($filters)){
                                foreach($filters as $f=>$filter){
                                    $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                                }
                                echo esc_html($c_filter);
                            }
                        ?></p>
                      </div>
                      <div class="card-plus"><?php _e('+','fi-print');?></div>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <br><br>
        <nav class="text-xs-center" role="pagination">
        <?php $total_pages=$wp_query->max_num_pages; 
        $big=999999999;
        $args=array(
            'base'=>str_replace($big, "%#%", esc_url(get_pagenum_link($big))),
            'current'=>$paged,
            'total'=>$total_pages,
            'type'=>'array',
            'next_text'=>'»',
            'prev_text'=>'«',
            'prev_next'=>false,
            'before_page_number' => '<span class="page-link">',
            'after_page_number' => '</span>',
        );

        $links= paginate_links($args);
        if(count($links)>0) :
        echo '<ul class="pagination">';
        $i=1;
        foreach ($links as $link) {
        if($i==$paged)
            $active="active";
        else
            $active="";
        ?>
        <li class="page-item <?php echo $active; ?>"><?php echo $link; ?></li>
        <?php
        $i++;
        }
        echo '</ul>';
        endif;
        ?>
        </nav>
    <?php else : ?>
        <?php get_template_part('partials/nothing-found'); ?>
    <?php endif; wp_reset_query();?>

    </div>
</section>
<?php get_footer(); ?>