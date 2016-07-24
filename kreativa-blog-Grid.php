<?php
/*
 * Template Name: Blog Template Grid Style
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
<section class="on-blog-grid">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('partials/article-grid'); ?>
            <?php endwhile; ?>
        <?php if ($wp_query->max_num_pages>1) : ?>
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
        <?php endif; ?>
    </div>
<!-- end container -->
</section>
<?php get_footer(); ?>