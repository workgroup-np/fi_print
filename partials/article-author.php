<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<div class="author-info">
  <h2><?php _e('ABOUT THE AUTHOR','fi-print');?></h2>
  <?php echo str_replace('avatar-130', '', get_avatar(get_the_author_meta('email'),170 )); ?>
  <div class="author-text">
    <h4><?php esc_attr(the_author()); ?></h4>
    <p><?php wp_kses_post(the_author_meta('description')); ?></p>
    <div class="social-icons">
      <ul>
      <?php if(get_the_author_meta('twitter')!=null):?>
        <li><a href="<?php echo esc_url(the_author_meta('twitter'));?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <?php endif;?><?php if(get_the_author_meta('facebook')!=null):?>
        <li><a href="<?php echo esc_url(the_author_meta('facebook'));?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <?php endif;?> <?php if(get_the_author_meta('linkedin')!=null):?>
        <li><a href="<?php echo esc_url(the_author_meta('linkedin'));?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
      <?php endif;?> <?php if(get_the_author_meta('google')!=null):?>
        <li><a href="<?php echo esc_url(the_author_meta('google'));?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
      <?php endif;?><?php if(get_the_author_meta('rss')!=null):?>
        <li><a href="<?php echo esc_url(the_author_meta('rss'));?>" target="_blank"><i class="fa fa-rss"></i></a></li>
      <?php endif;?>
      </ul>
    </div>
  </div>
</div>