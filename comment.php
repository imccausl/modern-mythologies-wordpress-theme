<?php
  function comment($comment, $args, $depth) {
    global $post;
    
    $author_id = $post->post_author;
    $GLOBALS['comment'] = $comment;

    switch($comment->comment_type) :
      case 'pingback':
      case 'trackback':
      // display trackbacks differently than normal comments ?>
      <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e('Pingback: '. 'mmwordpresstheme'); ?></span> <?php comment_author_link(); ?></div>
      </li>
    <?php
      break;
      default:
        // proceed with regular comments: ?>
        <li id="li-comment-<?php comment_ID(); ?>">
          <article id="comment-<?php comment_ID(); ?>" <?php comment_class('clr'); ?>>
            <div class="comment-author vcard">
              <?php echo get_avatar($comment, 45); ?>
            </div> <!-- .comment-author -->
          
            <div class="comment-body clr">
              <header class="comment-meta">
                <div class="comment-complete-meta">
                Posted on 
                <span class="comment-date">
                  <?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                esc_url(get_comment_link($comment->comment_ID)),
                                get_comment_time('c'),
                                sprintf(_x('%1$s', '1: date', 'mmwordpresstheme'), get_comment_date())
                              ); ?>
                </span> <!-- .comment-date -->
                by <cite class="fn"><?php comment_author_link(); ?></cite>
                </div> <!-- .comment-complete-meta -->
              </header> <!-- .comment-meta -->

              <?php if('0' == $comment->comment_approved) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation', 'mmwordpresstheme'); ?></p>
              <?php endif; ?>
              
              <div class="comment-content entry clr">
                <?php comment_text(); ?>
              </div> <!-- .comment-content -->

              <div class="reply comment-reply-link">
                <?php comment_reply_link(array_merge($args, array(
                  'reply_text' => esc_html__('Reply', 'mmwordpresstheme'),
                  'depth'      => $depth,
                  'max_depth'  => $args['max_depth'] )
                ) ); ?>
              </div> <!-- .comment-reply-link -->
            </div> <!-- .comment-details -->
          </article> <!-- #comment-## -->
        </li>
    <?php
    endswitch;    
  }