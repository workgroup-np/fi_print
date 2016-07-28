<?php
/**
 * Load SO Bundle Widgets.
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {

 $so_widgets = array(
  'slider'           => 'slider/slider.php',
  'services'         =>'services/services.php',
  'skill'            =>'skill/skill.php',
  'title'            => 'title/title.php',
  'counter'          => 'counter/counter.php',
  'testimonial'      => 'testimonial/testimonial.php',
  'client'           =>'client/client.php',
  'post'             =>'post/post.php',
  'address'          =>'address/address.php',
  'graph'            => 'graph/graph.php',
  'highlights'       =>'company-highlights/highlights.php',
  'sliding-services' =>'sliding-services/sliding-services.php',
  'tabs'  =>'tabs/tabs.php',
  'form-map'  =>'form-map/form-map.php',
  'download-btn'  =>'download-btn/download-btn.php',
 );

 $temp_dir = get_template_directory();
 foreach ($so_widgets as $key => $value) {

  require $temp_dir . '/inc/so-widgets/'. $value;

 }

}