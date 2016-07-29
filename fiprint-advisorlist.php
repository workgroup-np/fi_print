<?php
/*
 * Template Name: Advisors list template
 *
 */
// Exit if accessed directly
if ( !defined('ABSPATH') ) {
echo '<h1>Forbidden</h1>'; 
exit();
} 
get_header();
$paged = ( get_query_var('paged') );
$args = array(
    'post_type'      =>'advisor',
    'posts_per_page' => -1,
    'paged'          => $paged
    );
$the_query = new WP_Query( $args ); ?>
<section class="p-t-0">
        <div class="container">
          <div class="row">
                <?php if ($the_query->have_posts()) : 
                        while ($the_query->have_posts()) : $the_query->the_post();
                            get_template_part('partials/article-advisor');
                        endwhile;

            if ($the_query->max_num_pages>1) : ?>
                <div class="blog-pagination">
                    <div class="col-md-12 text-center">
                        <div class="blog-button">
                            <div class="border-button">
                                <!-- <a href="#">Load More</a> -->
                                 <?php fi_print_pagination(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; wp_reset_postdata();?>
        </div>
    </div>
<!-- end container -->
</section>
<?php get_footer(); ?>