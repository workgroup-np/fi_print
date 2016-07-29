<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<article class="media well">
    <header class="media-body">
        <h2 class="media-heading">
            <?php _e('Nothing found', 'fi-print'); ?>
        </h2>
    </header>

        <?php _e('Ops! there is nothing here...', 'fi-print'); ?>
        <hr />
        <?php get_search_form(TRUE); ?>

        <div class="border-button">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('BACK TO HOME','fi-print')?></a>
        </div>
</article>