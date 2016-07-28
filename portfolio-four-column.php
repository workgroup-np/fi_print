<?php
// Template Name: Portfolio Four Column
 // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $wp_query; ?>
<?php  global $fi_print_options;
$paged=(get_query_var('paged'))?get_query_var('paged'):1;
$number=esc_attr($fi_print_options['fi_print_project_number']);
$args=array('post_type'=>'portfolio','posts_per_page'=>$number,'post_status'=>'publish','paged'=>$paged,);
$portfolio_query= query_posts($args);
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
            <div class="col-xs-12 col-md-6 col-lg-3 shuffle-item" data-groups='[<?php echo esc_attr($filters); ?>]'>
                <div class="card card-portfolio-1">
                    <?php $thumbnail = get_post_thumbnail_id($post->ID);
                       $img_url = wp_get_attachment_image_src( $thumbnail,'full'); //get img URL
                       $n_img = aq_resize( $img_url[0], $width = $w, $height = $h, $crop = true, $single = true, $upscale = true );
                    ?><a href="<?php the_permalink();?>"><img class="card-img" src="<?php echo esc_url($n_img);?>" alt=""></a>
                    <?php 
                        $budget=get_post_meta(get_the_ID(), 'portfolio_budget',true);
                        $advisor=get_post_meta(get_the_ID(), 'portfolio_advisor',true);
                        $duration=get_post_meta(get_the_ID(), 'portfolio_duration',true);
                        $satisfaction=get_post_meta(get_the_ID(), 'portfolio_satisfaction',true);
                    ?>
                    <div class="card-img-overlay">
                        <dl>
                            <?php if($budget && $budget!=""){
                                echo '<dt>'.__('Budget:','fi_print').'</dt>';
                                echo '<dd>'.esc_attr($budget).'</dd>';
                            }?>
                            <?php if($advisor && $advisor!=""){
                                echo '<dt>'.__('Advisor:','fi_print').'</dt>';
                                echo '<dd>'.esc_attr($advisor).'</dd>';
                            }?>
                            <?php if($duration && $duration!=""){
                                echo '<dt>'.__('Duration:','fi_print').'</dt>';
                                echo '<dd>'.esc_attr($duration).'</dd>';
                            }?>
                            <?php if($satisfaction && $satisfaction!=""){
                                echo '<dt>'.__('Satisfaction:','fi_print').'</dt>';
                                echo '<dd>'.esc_attr($satisfaction).'</dd>';
                            }  ?>
                        </dl>
                    </div>
                </div>
                <h6><a href="<?php the_permalink();?>"><strong><?php the_title(); ?></strong></a></h6>
                <p><?php
                    $filters = get_the_terms($post->ID,'portfolio_filter');
                    $c_filter = '';
                    if(!empty($filters)){
                        foreach($filters as $f=>$filter){
                            $c_filter .=  ($f==0) ? $filter->name : ', '.$filter->name;
                        }
                        echo esc_html($c_filter);
                    }
                ?></p>
                <br>
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
                'next_text'=>'',
                'prev_text'=>'',
                'prev_next'=>false
                );
              $links= paginate_links($args);
              
              if(count($links)>0) :
                echo '<ul class="pagination">';
                $links=str_replace("span", "a", $links);
                if($paged>1)
                  $i=0;
                else
                  $i=1;
                foreach ($links as $link) {
                  if($i==$paged)
                    $active="class='active'";
                  else
                    $active="";
                  ?>
                    <li class="page-item <?php echo $active; ?>"><span class="page-link"><?php echo $link; ?></span></li>
                <?php
                  # code...
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