<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
	exit();
}
global $fi_print_options; 
if( !empty($fi_print_options['fi_print_footer_background']) ){
$image_url=wp_get_attachment_url($fi_print_options['fi_print_footer_background']['id']);
}?>

</main>
<footer class="site-footer" <?php if( $image_url ){ echo 'style="background-image: url('.$image_url.')"';}?>>
	<?php if( isset($fi_print_options[ 'fi_print_footer_widgetswitch']) && $fi_print_options[ 'fi_print_footer_widgetswitch']==0 ) :?>
		<div class ="footer-top" style="background-color:<?php echo esc_html($fi_print_options[ 'fi_print_footer_background_color']['rgba']);?>">
			<div class ="container">
				<div class ="row">
					<?php get_template_part( 'partials/footer-layout'); ?>
				</div>
			</div>
		</div>
	<?php endif;?>
		<?php if(isset( $fi_print_options[ 'fi_print_footer_bottom']) && $fi_print_options[ 'fi_print_footer_bottom']==0)  :?>
		<div class ="footer-bottom">
			<div class ="container">
				<div class ="row">
					<div class="col-xs-12 col-sm-6">
					<p class="text-xs-center text-sm-left"><?php echo wp_kses_post($fi_print_options[ 'fi_print_footer_text1']); ?></p>
					</div>

					<div class="col-xs-12 col-sm-6">
					<p class="text-xs-center text-sm-right"><?php echo wp_kses_post($fi_print_options[ 'fi_print_footer_text2']); ?></p>
					</div>
				</div>
			</div>	
		</div>
		<?php endif;?>
</footer>
<?php wp_footer(); ?>
    </body>
</html>
