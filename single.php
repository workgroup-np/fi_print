<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php global $fi_print_options;
$single_layout=$fi_print_options['single_blog'];
if($single_layout=='fullwidth'):?>
    <section class="blog-single">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-item col-md-12">
                        <?php get_template_part('partials/article'); ?>
                        <?php if(isset($fi_print_options['article_author']) && $fi_print_options['article_author']==1)get_template_part('partials/article-author');?>
                        <?php if(isset($fi_print_options['article_related']) && $fi_print_options['article_related']==1)get_template_part('partials/article-related');?>
                        <?php comments_template( '', true ); ?>
                    </div>
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
    </section>
<?php else:
if($single_layout=='left'):
    $sidebar='left';
    $content='right';
else:
    $sidebar='right';
    $content='left';
endif;?>
<section class="blog-single">
    <div class="container">
        <div class="pull-<?php echo esc_attr($content);?> col-md-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/article'); ?>
                    <?php if(isset($fi_print_options['article_author']) && $fi_print_options['article_author']==1)get_template_part('partials/article-author');?>
                    <?php if(isset($fi_print_options['article_related']) && $fi_print_options['article_related']==1)get_template_part('partials/article-related');?>
                    <?php comments_template( '', true ); ?>
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
        <?php if ( is_active_sidebar( 'fi_print-widgets-aside-right' ) ) { ?>
            <div class="pull-<?php echo esc_attr($sidebar);?> col-md-4">
                 <div class="side-bar-widget">
                <?php dynamic_sidebar( 'fi_print-widgets-aside-right' );  ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php endif;?>
<?php get_footer(); ?>