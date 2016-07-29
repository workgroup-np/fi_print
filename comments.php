<?php // Exit if accessed directly
if ( !defined('ABSPATH') ) {
echo '<h1>Forbidden</h1>'; 
exit();
} 
if ( comments_open() ) : ?>
<div class="comments-area">
    <?php 
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    // Comment Form
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author'  => '<div class="form-group col-xs-12 col-sm-6"><input id="author" type="text" class="form-control" placeholder="Name" name="author" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"'. $aria_req . '/></div>',
        'email'   => '<div class="form-group col-xs-12 col-sm-6"><input id="email" type="text" class="form-control" placeholder="Email address" type="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"'. $aria_req . '/></div>'
    );
    $args = array (
        'title_reply'         => __( '<h3>Post a comment</h3>', 'fi_print' ),
        'id_form'             => 'comments_form',
        'id_submit'           => 'comment-submit',
        'comment_field'       =>  '<div class="form-group col-xs-12"><textarea id="comment" name="comment" class="form-control" placeholder="Comment" aria-required="true"></textarea></div>',
        'class_form'          =>'form-comment row',
        'class_submit'        =>'btn btn-secondary',
        'label_submit'        =>__('Submit','fi_print'),
        'fields'              => apply_filters( 'comment_form_default_fields', $fields ),
        'logged_in_as'        => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','fi_print'), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink($post->ID) ) ) ) . '</p>',

    );
   comment_form($args);    ?>
</div>

<div class="comment-list">
    <?php if ( post_password_required() ) : ?>
        <p class="nopassword">
            <?php _e( 'This post is password protected. Enter the password to view any comments.', 'fi_print' ); ?>
        </p>
    <?php return; endif; ?>
    <?php $ncom = get_comments_number();
    if ($ncom>0) :
        echo '<h3>';
        
         _e('Recent Comments','fi_print');
        echo '</h3>';
        // Comment List
            $args = array (
                'paged' => true,
                'avatar_size'       => 75,
                'callback'=> 'fi_print_comment',
                'style'=> 'ul',
            );
            wp_list_comments($args);
            ?>
        <?php if ($ncom >= get_option('comments_per_page') && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below">
                <?php paginate_comments_links(); ?>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php endif; ?>