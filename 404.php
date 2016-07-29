<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Fi-Print
 * @since Fi-Print 1.0
 */
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); global $fi_print_options; ?>
<section class="page-heading-owl">
	<div class="container">
		<div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div class="notfound wow fadeIn text-center">
					<h1><?php _e('404','fi-print')?></h1>
                    <h2><?php echo wp_kses_post($fi_print_options['404_text']);?></h2>
                    <div class="submit-coment col-md-12">
                        <div class="border-button">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('BACK TO HOME','fi-print')?></a>
                        </div>
                    </div>
                </div><!-- end welcome -->
            </div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
<?php get_footer(); ?>
