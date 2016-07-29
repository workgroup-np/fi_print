<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<?php global $fi_print_options;?>

<section class="p-t-0">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
            <div class="col-xs-12 col-lg-3">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
            <?php } ?>

            <div class="col-xs-12 col-lg-9">
                <article class="post">
                    <?php if (has_post_thumbnail()) :
                    
                        $att = get_post_meta(get_the_ID(),'_thumbnail_id',true);
                        $thumb = get_post($att);
                        if (is_object($thumb)) { $att_ID = $thumb->ID; $att_url = $thumb->guid; }
                        else { $att_ID = $post->ID; $att_url = $post->guid; }
                        $att_title = (!empty(get_post($att_ID)->post_excerpt)) ? get_post($att_ID)->post_excerpt : get_the_title($att_ID);
                        $thumbnail = get_post_thumbnail_id();
                        $fi_print_img_url = wp_get_attachment_image_src( $thumbnail,'full');
                        $fi_print_n_img = aq_resize($fi_print_img_url[0], $width = 825, $height =  429, $crop = true, $single = true, $upscale = true);
                        ?>
                                        
                        <div class="post-thumbnail">
                            <img src=<?php echo esc_url($fi_print_n_img); ?> alt="...">
                        </div>
                    <?php endif; ?> 
                                    
                                    
                    <header class="entry-header">
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <ul class="entry-header-meta">
                            <li><?php the_time('jS F, Y') ?></li>
                            <li><?php _e('By: ', 'fi_print'); ?> <a href=" <?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php  echo  the_author_meta( 'display_name',$author_id );?></a></li>
                        </ul>
                    </header>
                                    
                    <div class="entry-content">
                        <?php echo the_content();?>
                    </div>
                                    
                    <?php 
                    $categories = get_the_category();
                    $separator = ',';
                    $output = '';
                    if ( ! empty( $categories ) ) {
                        foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ). '">' . esc_html( $category->name ) . '</a>' . $separator;
                        }
                    }
                    $tags=get_the_tags(get_the_ID());
                    if( $tags && ! is_wp_error( $tags ) )
                    {
                        foreach ( $tags as $tag ) {
                        $output_tags .= '<a href="' . esc_url( get_category_link( $tag->term_id ) ). '">' . esc_html( $tag->name ) . '</a>' . $separator;
                        }
                    }?>
                    <footer class="entry-meta">
                    <p class="categories"><strong><?php _e('Categories:','fi_print')?></strong> <?php echo trim( $output, $separator );?>
                    <?php if( !empty($output_tags) ):?><p class="categories"><strong><?php _e('Tags:','fi_print')?></strong> <?php echo trim( $output_tags, $separator );?></p><?php endif;?>
                    </footer>

                </article>

                <?php if(isset($fi_print_options['article_author']) && $fi_print_options['article_author']==1)get_template_part('partials/article-author');?>
                <?php if(isset($fi_print_options['article_related']) && $fi_print_options['article_related']==1)get_template_part('partials/article-related');?>
                <?php comments_template( '', true ); ?>
            </div>    

        </div><!--end row -->
    </div><!-- end container -->
</section>

<?php get_footer(); ?>