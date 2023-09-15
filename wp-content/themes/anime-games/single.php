<?php get_header();?>
<main>
<?php the_post();?>
      <div
        class="w-5/6 mx-auto mt-10 mb-10 page-content"
      >
        <p
          class="mx-auto text-center text-xs mt-10 page-content-paragraph"
        >
          <?php esc_html_e('Published',"anime-games");?> <?php the_date();?>
        </p>
        <h1
         
          class="text-center mt-2 mb-2 page-content-header"
        >
          <?php the_title();?>
        </h1>
        <?php if(has_post_thumbnail()):?>
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID()); ?>
            <img class="w-auto mx-auto max-w-7xl  " src="<?php echo esc_url($featured_img_url)?>" alt="The post thumbnail"/>
            <?php endif;?>
        
        <div class="w-11/12 mx-auto mb-10 clearfix">
          <?php the_content();?>
        
      </div>
        </div>
        <?php
$args = array (
    'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'anime-games' ) . '</span>',
    'after'             => '</div>',
    'link_before'       => '<span class="page-link">',
    'link_after'        => '</span>',
    'next_or_number'    => 'next',
    'separator'         => ' | ',
    'nextpagelink'      => __( 'Next &raquo', 'anime-games' ),
    'previouspagelink'  => __( '&laquo Previous', 'anime-games' ),
);
 
wp_link_pages( $args );
?>
<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
          </div> 
            

    </main>
    <section>
      <div
        
        class="w-5/6 mx-auto mb-10 comments-holder"
      >
      <?php comments_template();?>
        </div>
    </section>
     

     

     
<?php get_footer();?>