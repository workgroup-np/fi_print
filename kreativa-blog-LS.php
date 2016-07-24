<?php
/*
 * Template Name: Blog Template Left Sidebar
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
<section class="on-blog">
    <div class="container">
        <div class="pull-right  col-md-8 col-sm-8 col-xs-12">
            <?php if (have_posts()) : ?>
                <div class="blog-posts">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('partials/article'); ?>
                    <?php endwhile; ?>
                </div>

            <?php if ($wp_query->max_num_pages>1) : ?>
                <div class="blog-pagination">
                    <?php
                     fi_print_pagination();
                     ?>
                </div>
            <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; ?>
        </div>
        <?php if ( is_active_sidebar( 'fi_print-widgets-aside-right' ) ) { ?>
             <div class="pull-left col-md-4 col-sm-4 col-xs-12">
                <div class="side-bar-widget">
                <?php dynamic_sidebar( 'fi_print-widgets-aside-right' ); ?>
                </div>
            </div>
        <?php } ?>
    </div>
<!-- end container -->
</section>
<?php get_footer(); ?>