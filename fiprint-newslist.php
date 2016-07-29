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
                    <div class="row">
                        <?php 
                        $paged = ( get_query_var('paged') );
                        $args = array(
                            'post_type'      =>'post',
                            'paged'          => $paged
                            );
                        $the_query = new WP_Query( $args ); 

                        if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <?php get_template_part('partials/article'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                        <?php if ($wp_query->max_num_pages>1) : ?>
                            <nav class="col-xs-12">
                                <?php fi_print_pagination();  ?>
                            </nav>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                    <?php endif; ?>
                </div><!-- end row -->    
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php get_footer(); ?>