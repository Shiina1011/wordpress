<?php $args = array(
    'walker' => null,
    'max_depth'=> '',
    'style'=>'ol',
    'callback'=>'anime_games_better_comments',
    'end-callback'=> null,
    'type'=>'all',
    'reply_text'=>'',
    'page'=>'',
    'per_page'=>'',
    'avatar_size'=>80,
    'reverse_top_level'=>null,
    'reverse_children'=>'',
    'format'=>'html5',
    'short_ping'=> false,
    'echo'=>true,

);?>



<?php $comments_args = array(
        // Change the title of send button 
        'label_submit' => __( 'Post', 'anime-games' ),
        // Change the title of the reply section
        'title_reply' => __( '','anime-games' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        'logged_in_as' => '',
        // Redefine your own textarea (the comment body).
        'class_form' => 'w-11/12 xl:w-5/6 mx-auto mt-4 mb-4 md:flex justify-between',
        'comment_field' => '<input
        style="
          font-family: Permanent Marker, cursive;
          color: #828282;
          background-color: transparent;
          border: 1px solid #828282;
          border-radius: 7px;
          box-sizing: border-box;
          height: 41px;
        "
        class="pl-5 w-full md:w-9/12 lg:w-10/12 mx-auto form-input"
        placeholder='.esc_attr__("Add a comment",'anime-games').'
        type="text"
        id="comment" name="comment" aria-required="true"
      />',
        'submit_button' => '<button
        class="mt-4 mx-auto md:mt-0"
        name="%1$s" type="submit" id="%2$s"
        style="
          background-color: #157bb0;
          border: 1px solid #157bb0;
          box-sizing: border-box;
          border-radius: 3px;
          color: white;
          width: 120px;
          height: 41px;
          font-family: Permanent Marker, cursive;
        "
      >
        '. esc_html__("Post","anime-games") .'
      </button>'
);?>



<h3
         
          class="text-center mt-9 comments-holder-h3"
        >
          <?php comments_number();?>
        </h3>

<h3 class="text-center mt-9 comments-holder-h3 comments-logged-in "><?php esc_html_e('To comment you need to be logged in!',"anime-games");?></h3>

<?php comment_form( $comments_args );?>

<?php wp_list_comments($args);?>




