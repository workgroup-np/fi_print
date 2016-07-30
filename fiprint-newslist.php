<?php
/*
* Template Name: News List template with Left Sidebar
*
*/
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    echo '<h1>Forbidden</h1>'; 
    exit();
}
global $wp_query;
get_header();
?>
<section class="p-t-0">
    <div class="container">
        <div class="row">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="col-xs-12 col-lg-3">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
                <?php endif; ?>

                <div class="col-xs-12 col-lg-9">                    
                        <?php 
                        $paged=(get_query_var('paged'))?get_query_var('paged'):1;
                        $args=array(
                            'post_type'=>'post',
                            'paged'=>$paged,
                            'order'=>'DESC',
                            'orderby'=>'date'
                        );
                        $the_query= query_posts($args); 
                        if (have_posts()) : ?>
                        <div class="row">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('partials/article'); ?>
                        <?php endwhile; ?>  
                        </div><!-- end row -->                         
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
                    <?php endif;  wp_reset_query(); ?>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php get_footer(); ?>