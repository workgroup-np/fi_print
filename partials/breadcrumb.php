<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
    echo '<h1>Forbidden</h1>'; 
    exit(); 
}
$pageid                =get_the_ID();
$page_setting_title    =get_post_meta( $pageid, 'fi_print_title',true);
$page_setting_image    =get_post_meta( $pageid, 'fi_print_image',true);
$section_class="page-header";
$ol_class="breadcrumb";
if( !empty($page_setting_image) ){

    $section_class="page-header bg-img";
    $ol_class="breadcrumb color-alt";

}
?>
<!-- Page header -->
      <section class="<?php echo esc_html($section_class); ?>" <?php if( !empty($page_setting_image) ){ echo 'style="background-image: url('.$page_setting_image.')"';}?>>
        <div class="container">
          <header class="section-header border-bottom">
            <ol class="<?php echo $ol_class;?>">
              <li><a href="<?php echo esc_url(home_url());?>"><?php _e('Home', 'fi_print'); ?></a></li>
              <li class="active"><?php the_title();?></li>
            </ol>
            <h1><?php if( is_single() ){ the_title();} else { echo esc_html($page_setting_title); }?></h1>
          </header>
        </div>
      </section>
<!-- END Page header -->