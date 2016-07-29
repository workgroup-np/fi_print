<?php
if(!function_exists('fi_print_related_media')){
    function fi_print_related_media($w,$h){
        ?>
        <div class="ImageWrapper">
           <?php if ( get_post_gallery() ) :
                $fi_print_gallery = get_post_gallery( get_the_ID(), false ); ?>
                <div class="slider">
                  <div class="fullwidthbanner-container">
                    <div class="fullwidthbanner">
                      <ul>
                        <?php foreach( $fi_print_gallery['src'] AS $src ):
                          $fi_print_img_url = wp_get_attachment_image_src( $src);
                          $fi_print_n_img = aq_resize( $src, $width = $w, $height =  $h, $crop = true, $single = true, $upscale = true ); ?>
                          <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                            <img class="img-responsive" src="<?php echo esc_url($fi_print_n_img); ?>" alt="" data-fullwidthcentering="on" alt="slide">
                          </li>
                        <?php endforeach;?>
                      </ul>
                    </div>
                  </div>
                </div>
            <?php endif;?>
            <?php if( has_post_thumbnail() && !get_post_gallery()):
              $thumbnail = get_post_thumbnail_id();
               $fi_print_img_url = wp_get_attachment_image_src( $thumbnail,'full');
               $fi_print_n_img = aq_resize( $fi_print_img_url[0], $width =  $w, $height =  $h, $crop = true, $single = true, $upscale = true ); //get img URL
            ?><div class="portfolio-media"> <img src="<?php echo esc_url($fi_print_n_img);?>" class="img-responsive"/></div>
            <?php endif;?>
        </div>
        <?php
  }
}
//Related metas
if(!function_exists('fi_print_related_meta')){
    function fi_print_related_meta(){
        global $post;
        if(is_home()){
            $pageid=get_option('page_for_posts');
        } else {
            $pageid=get_the_ID();
        }
        $name=esc_attr(get_post_meta( $pageid, 'fi_print_portfolio_name',true));
        $terms = get_the_terms( $post->ID, 'portfolio_filter' );
        $subtitle = esc_html( get_post_meta($pageid, 'fi_print_portfolio_subtitle',true));
        $facebook=esc_attr(get_post_meta( $pageid, 'fi_print_facebook',true));
        $twitter=esc_attr(get_post_meta( $pageid, 'fi_print_twitter',true));
        $google=esc_attr(get_post_meta( $pageid, 'fi_print_google',true));
        $linkedin=esc_attr(get_post_meta( $pageid, 'fi_print_linkedin',true));
        $rss=esc_attr(get_post_meta( $pageid, 'fi_print_rss',true));
        $youtube=esc_attr(get_post_meta( $pageid, 'fi_print_youtube',true));
        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));?>
        <div class="project-details">
          <h6><?php the_title();?></h6>
          <?php if($subtitle):?>
            <span><?php echo wp_kses_post($subtitle);?></span>
          <?php endif;?>
          <?php echo wp_kses_post($postContentStr); ?>
          <div class="share-project">
            <div class="social-icons">
              <ul>
                <?php if (!empty($twitter)) : ?>
                   <li><a href="<?php echo esc_url( $twitter);?>" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                <?php endif;?>
                <?php if (!empty($facebook)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                <?php endif;?>
                <?php if (!empty($google)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-google"></i></a></li>
                <?php endif;?>
                <?php if (!empty($rss)) : ?>
                   <li><a href="<?php echo esc_url( $rss);?>" target="_blank" ><i class="fa fa-rss"></i></a></li>
                <?php endif;?>
                <?php if (!empty($linkedin)) : ?>
                  <li><a href="<?php echo esc_url( $linkedin);?>" target="_blank" ><i class="fa fa-linkedin"></i></a></li>
                <?php endif;?>
                <?php if (!empty($youtube)) : ?>
                  <li><a href="<?php echo esc_url( $youtube);?>" target="_blank" ><i class="fa fa-youtube"></i></a></li>
                <?php endif;?>
              </ul>
            </div>
          </div>
        </div><!-- end title -->
        <?php
  }
}
if(!function_exists('fi_print_related_team_meta')){
    function fi_print_related_team_meta(){
        global $post;
        if(is_home()){
            $pageid=get_option('page_for_posts');
        } else {
            $pageid=get_the_ID();
        }

        $terms = get_the_terms( $post->ID, 'team_post' );
        $facebook=esc_attr(get_post_meta( $pageid, 'fi_print_facebook',true));
        $twitter=esc_attr(get_post_meta( $pageid, 'fi_print_twitter',true));
        $linkedin=esc_attr(get_post_meta( $pageid, 'fi_print_linkedin',true));
        $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));?>
        <div class="project-details">
          <h6><?php the_title();?></h6>
          <?php if($subtitle):?>
          <?php endif;?>
          <?php echo wp_kses_post($postContentStr); ?>
          <div class="share-project">
            <div class="social-icons">
              <ul>
                <?php if (!empty($twitter)) : ?>
                   <li><a href="<?php echo esc_url( $twitter);?>" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                <?php endif;?>
                <?php if (!empty($facebook)) : ?>
                  <li><a href="<?php echo esc_url( $facebook);?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                <?php endif;?>
                <?php if (!empty($linkedin)) : ?>
                  <li><a href="<?php echo esc_url( $linkedin);?>" target="_blank" ><i class="fa fa-linkedin"></i></a></li>
                <?php endif;?>
              </ul>
            </div>
          </div>
        </div><!-- end title -->
        <?php
  }
}
//Title
function fi_print_post_title(){
    global $post;
    $title = get_the_title();
    $count=(str_word_count($title));
    if($count>=6) :
        $title =substr($title, 0,35);
        echo wp_kses_post($title.'...');
    else:
        echo wp_kses_post($title);
    endif;

}
// fi_print Pagination
// Code taken from: http://wp-snippets.com/pagination-for-twitter-bootstrap/
function fi_print_pagination ($before = '', $after = '') {
    global $fi_print_options;
    echo $before;

        global $wpdb, $wp_query;
        $request = $wp_query->request;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
        if ($numposts <= $posts_per_page) return;
        if (empty($paged) || $paged == 0) $paged = 1;
        $pages_to_show = 7;
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1 / 2);
        $half_page_end = ceil($pages_to_show_minus_1 / 2);
        $start_page = $paged - $half_page_start;
        if ($start_page <= 0) $start_page = 1;
        $end_page = $paged + $half_page_end;
        if (($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if ($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if ($start_page <= 0) $start_page = 1;

            echo'<ul >';
            $var=$paged;

            if($paged!=$start_page)
                echo ( '<li><a href="'.get_pagenum_link(--$var).'" >'.__('Previous','fi-print').'</a></li>' );
            else
                echo ( '<li class="disabled"><a href="#">'.__('Previous','fi-print').'</a></li>' );
            for ($i = $start_page; $i <= $end_page; $i++) {

                if ($i == $paged)
                    echo ' <li><a href="#" class="current">' .$i. '</a></li>';
                else{
                    echo ' <li><a href="'.get_pagenum_link($i).'">' . $i . '</a></li>';
                            }
            }
            $var2=$paged;
            if($paged==$end_page)

                echo ( '&nbsp;<li class="disabled"><a href="#">'.__('Next','fi-print').'</a></li>' );
            else
                echo ( '&nbsp;<li><a href="'.get_pagenum_link(++$var2).'">'.__('Next','fi-print').'</a></li>' );

            echo '</ul>';
    echo $after;
    return;
}
function fi_print_add_custom_user_profile_fields( $user ) {
?>          <h3><?php _e('Personal Address','fi-print');?></h3>
          <table class="form-table">
            <tr>
                <th> <label for="address"><?php _e('Facebook', 'fi-print'); ?></label></th>
                <td><input type="url" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br /></td>
            </tr>
            <tr>
                <th> <label for="address"><?php _e('Twitter', 'fi-print'); ?></label></th>
                <td><input type="url" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br /></td>
            </tr>
            <tr>
                <th> <label for="address"><?php _e('Linkedin', 'fi-print'); ?></label></th>
                <td><input type="url" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br /></td>
            </tr>
            <tr>
                <th> <label for="address"><?php _e('Google+', 'fi-print'); ?></label></th>
                <td><input type="url" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br /></td>
            </tr>
            <tr>
                <th> <label for="address"><?php _e('Rss', 'fi-print'); ?></label></th>
                <td><input type="url" name="rss" id="rss" value="<?php echo esc_attr( get_the_author_meta( 'rss', $user->ID ) ); ?>" class="regular-text" /><br /></td>
            </tr>

          </table>

<?php }
function fi_print_save_custom_user_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return FALSE;

    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'google', $_POST['google'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'rss', $_POST['rss'] );
}
add_action( 'show_user_profile', 'fi_print_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fi_print_add_custom_user_profile_fields' );
add_action( 'personal_options_update', 'fi_print_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fi_print_save_custom_user_profile_fields' );