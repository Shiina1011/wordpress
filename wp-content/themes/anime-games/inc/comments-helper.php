<?php
if( ! function_exists( 'anime_games_better_comments' ) ):
function anime_games_better_comments($comment, $args, $depth) {
    ?>
    
   
       
        <div  id="li-comment-<?php comment_ID() ?>" class="flex  w-11/12 xl:w-5/6 mx-auto mb-9">
        <span class="w-14 h-14">
          <?php echo get_avatar(get_the_author_meta('ID'),48,"","The profile pic");?>
</span>
          
          <div class="ml-5 mr-2">
            <p
              class="text-sm page-content-h1"
              
            >
            <?php echo esc_html(get_comment_author()); ?>
            </p>
            <span
              class="font-medium comment-text" 
            >
            <?php comment_text() ?>
</span>
            <div class="mt-2 flex items-center">
              <span class="text-xs comment-date" >
              <?php echo esc_html(get_comment_date(),"anime-games");?>
</span>
              <div
              
                class="rounded-full ml-2 comment-divider"
              ></div>
            
              <button
                class="ml-2 text-xs comment-reply comment-reply-link"
                
              >
              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
              </button>
            </div>
          </div>
        </div>
   

<?php
        }
endif;