<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php if (comments_open()) : ?>
<div id="comments-single" class="blog-comments">
    <?php if ( post_password_required() ) : ?>
        <p class="nopassword">
            <?php _e( 'This post is password protected. Enter the password to view any comments.', 'fi_print' ); ?>
        </p>
    <?php return; endif; ?>
    <?php $ncom = get_comments_number();
    if ($ncom>0) :
        echo '<h2>';
        if ($ncom==1) _e('1 ', 'fi_print'); else echo sprintf (__('%s ','fi_print'), $ncom);
         _e('Comments','fi_print');
        echo '</h2>';
        if ($ncom >= get_option('comments_per_page') && get_option('page_comments')) : ?>
            <nav id="comment-nav-above">
                <?php paginate_comments_links(); ?>
            </nav>
        <?php endif; ?>
        <ul class="media-list">
            <?php
            // Comment List
            $args = array (
                'paged' => true,
                'avatar_size'       => 75,
                'callback'=> 'fi_print_comment',
                'style'=> 'ul',
            );
            wp_list_comments($args);
            ?>
        </ul>
        <?php if ($ncom >= get_option('comments_per_page') && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below">
                <?php paginate_comments_links(); ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>
<div class="leave-comment">
    <?php global $req,$commenter;
    // Comment Form
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<div class="col-md-4 col-sm-4 col-xs-6"><input id="author" placeholder="Your name..." class="blog-search-field" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="col-md-4 col-sm-4 col-xs-6"><input id="email" class="blog-search-field" name="email" placeholder="Your email..." type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'service'  => '<div class="col-md-4 col-sm-4 col-xs-6"><input id="service" class="blog-search-field" name="service" placeholder="Your service..." type="text"  size="30"/></div>'
    );
    $args = array (
        'title_reply'          => have_comments() ? __( '<h3>LEAVE A COMMENT</h3>', 'fi_print' ) : __( '<h3>LEAVE A COMMENT</h3>', 'fi_print' ) ,

        'id_form' => 'comments_form',
        'id_submit' => 'comment-submit',
        'comment_field' =>  '<div class="col-md-12 col-sm-12"><textarea id="comment" class="input" name="comment" placeholder="Comment..."></textarea></div>',
        'comment_notes_after' => '<div class="submit-coment col-md-12">
                                            <div class="border-button"><button class="single-button" type="submit" id="submit">'.__('Submit now','fi_print').'</button>
                                            </div>
                                        </div>' ,
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','fi_print'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</p>',

    );
   comment_form($args);    ?>
</div>
<?php endif; ?>