<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php  global $fi_print_options; ?>
  	<?php if(isset($fi_print_options[ 'footer-on']) && $fi_print_options[ 'footer-on']==1) :?>
		<footer class="footer-2">
	     	<div class="container">
				<?php get_template_part( 'partials/footer-layout'); ?>
			</div>
		</footer>
		<?php if(isset($fi_print_options[ 'secondfooter-on']) && $fi_print_options[ 'secondfooter-on']==1) :?>
			<section class="sub-footer">
				<div class="container">
					<div class="copyright-text col-md-6 col-sm-6 col-xs-12">
						<p><?php echo wp_kses_post($fi_print_options[ 'footer_text']); ?></p>
					</div>
					<div class="designed-by col-md-6 col-sm-6 col-xs-12">
						<p><?php echo wp_kses_post($fi_print_options[ 'footer_text2']); ?></p>
					</div>
				</div>
			</section>
		<?php endif;?>
    <?php endif; ?>
    <a href="#" class="go-top go-top-visible go-top-fade-out"><i class="fa fa-angle-up"></i></a>
  </div>  <!--sidebar-menu-inner-end-->
  </div>  <!--sidebar-menu-push-end-->
  	<nav class="sidebar-menu slide-from-left">
		<div class="nano has-scrollbar">
			<div class="content" tabindex="0">
				<?php
                    $args = array(
                    'theme_location' => 'primary',
                    'items_wrap' => '<nav class="responsive-menu"><ul>%3$s</ul> </nav>',
                    'echo'       => true,
                    'fallback_cb'     => 'wp_page_menu()',
                    // 'walker'  => new fi_print_footer_walker()
                   );
                // wp_nav_menu($args);
		     ?>
			</div>
		</div>
		<div class="pane"><div class="slider"></div></div>
	</nav>
</div><!--sidebar-menu-container-end-->

    <?php wp_footer(); ?>
    </body>
</html>
