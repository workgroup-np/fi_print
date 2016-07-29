<?php
if ( !defined('ABSPATH') ) {
	echo '<h1>Forbidden</h1>'; 
	exit();
} 
get_header();
?>


<section class="p-t-0">
        <div class="container">
          <div class="row">
          <?php the_content();?>
          </div>
        </div>
      </section>

<?php get_footer();?>
