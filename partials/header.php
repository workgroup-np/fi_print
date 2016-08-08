 <?php 
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
  exit();
	}
global $fi_print_options;
$flag=0;
$pageid        =get_the_ID();
$pagemenucheck =get_post_meta( $pageid, 'fi_print_menucheck',true);
$pagemenustyle =get_post_meta( $pageid, 'fi_print_menustyle',true);
$pagesearch =get_post_meta( $pageid, 'fi_print_search',true);
if(isset($pagemenucheck) && $pagemenucheck=='on'){
  $flag=1;?>
  <div class="<?php if( $pagemenustyle=='navbar navbar-type-2' ): echo 'container'; else: echo 'container-fluid'; endif;?>"><?php
}
else{?>
      <div class="<?php if( $fi_print_options['fi_print_menu_style']=='navbar navbar-type-2' ): echo 'container'; else: echo 'container-fluid'; endif;?>"><?php
}
?>
          <div class="navbar-left">
            <?php
              if( isset( $fi_print_options['logo'] ) && $fi_print_options['logo']['url']!='') :?>
              <a class="navbar-brand" href="<?php echo esc_url( site_url() ); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>">
              	<img src="<?php echo esc_url( $fi_print_options['logo']['url']) ; ?>"  alt="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
              </a>
              <?php  else: ?>
                  <a class="navbar-brand" href="<?php echo esc_url( site_url() ); ?>" title="<?php echo esc_attr( get_bloginfo('name') ); ?>"> </a>
              <?php endif ?>
          </div>

          <div class="navbar-right">
     			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header">&#9776;</button>
              	<?php get_template_part('partials/navbar');
              if(isset($pagemenucheck) && $pagemenucheck=='on' && $pagemenustyle!='navbar' && $pagesearch=="on"){?>
                <div class="navbar-search">
                  <button class="navbar-btn"><i class="fa fa-search"></i></button>
                  <form method="get" id="searchfrom">
                  <input type="text" name="s" placeholder="<?php _e('Enter your keyword...','fi_print');?>">
                  </form>
                </div><?php
              }
      		    if( isset($fi_print_options['fi_print_header_searchswitch'] ) && 
                $fi_print_options['fi_print_header_searchswitch']==1 && $flag==0 ):?>
                <div class="navbar-search">
                  <button class="navbar-btn"><i class="fa fa-search"></i></button>
                  <form method="get" id="searchfrom">
                  <input type="text" name="s" placeholder="<?php _e('Enter your keyword...','fi_print');?>">
                  </form>
                </div>
              <?php endif;?>
          </div>
      	
      </div>
