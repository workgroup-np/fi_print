<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
echo '<h1>Forbidden</h1>'; 
exit();
} 
get_header();
global $fi_print_options;?>
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
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part( 'partials/article', get_post_format() );?>
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
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>