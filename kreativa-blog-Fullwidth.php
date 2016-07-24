<?php
/*
 * Template Name: Blog Template Fullwidth
 *
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); ?>
<section class="on-blog">
    <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/article'); ?>
                <?php endwhile; ?>
            <?php if ($wp_query->max_num_pages>1) : ?>
                <div class="blog-pagination">
                    <?php fi_print_pagination(); ?>
                </div>
            <?php endif; ?>
            <?php else : ?>
                <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; ?>
    </div>
<!-- end container -->
</section>
<?php get_footer(); ?>