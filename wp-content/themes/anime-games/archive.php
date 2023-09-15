<?php get_header();?>
<main>
<form
          class="w-2/3 md:w-1/3 mx-auto relative mb-10 lg:mb-0"
          method="get"
          action="<?php echo esc_url(home_url('/'));?>"
        >
        <i
          style="color: #828282"
          class="fas fa-search icon mt-12 absolute top-20 left-2"
        ></i>
          <input
          class="
            mx-auto
            p-2
            outline-none
            pl-10
            w-full
            flex
            justify-center
            mt-12
            search-bar
          "
            type="text"
            name="s"
            placeholder=<?php esc_attr_e("Search...","anime-games")?>
          />

       
        </form>
       
        <?php if(is_author()):?>
      <div style="font-family: 'Open Sans', sans-serif;" class="flex flex-row mb-6 place-self-start ml-36 capitalize text-2xl"><p style="font-family: 'Open Sans', sans-serif;" class="mr-3">Posts made by:</p> <?php the_author();?></div> 
      <?php endif;?>
      <?php if(is_category()):?>
        <div style="font-family: 'Open Sans', sans-serif;" class="flex flex-row  mb-6 place-self-start ml-36 capitalize text-yellow-600 text-2xl"><p style="font-family: 'Open Sans', sans-serif;" class="mr-3 text-white">Category:</p><?php the_category(' , ');?></div> 
        <?php endif;?> 
        <div
          class="
            blogs
            mx-auto
            flex
            items-center
            flex-wrap
            justify-between
            mt-20
            mb-30
          "
        >
        <?php if(have_posts()) : ?>
        <?php while(have_posts() ) : the_post(); ?>
        <article>
          <div
          id="post-<?php the_ID();?>" <?php post_class('mt-4 mx-auto article-box overflow-auto');?>
        
            
          >
          <?php if(has_post_thumbnail()):?>
            <span
              class="mx-auto mt-5 w-5/6 max-h-40 "
            >
            <?php  the_post_thumbnail('animegames_post', [
            "class" => "mx-auto mt-5 w-5/6 max-h-40 ",
          ]);?></span>
            <?php else:?>
            <img class="mx-auto mt-5 w-5/6 " src="<?php echo esc_url(get_template_directory_uri());?>/src/images/placeholder-post.jpg" alt=<?php esc_attr_e("Placeholder post image","anime-games");?>/>
          <?php endif;?>
            <h2
             
              class="mt-5 mx-auto text-center permanent-font overflow-hidden"
            >
              <?php the_title();?>
            </h2>
            <p
              
              class="text-center text-sm quicksand-font"
            >
              <?php the_date();?>
            </p>
            <span
            
              class="text-center text-base font-semibold w-4/5 mx-auto article-excerpt"
            >
              <?php the_excerpt();?>
            </span>
            <a
              class="flex justify-center items-center mx-auto mt-2 article-button"
              href='<?php the_permalink();?>'
            >
              <?php esc_html_e('Continue reading','anime-games');?>
            </a>
          </div>
</article>
<?php  endwhile; ?>
        <?php else : ?>
          <?php esc_html_e('Sorry,no posts were found',"anime-games");?>
        <?php endif; ?> 

       
</div>

<div class="flex flex-row justify-center items-center mt-10 mb-10">
        
        <a href="<?php echo esc_url(get_previous_posts_page_link());?>" class="hover:underline focus:underline"  ><img src="<?php echo esc_url(get_template_directory_uri()); ?>/src/images/left.png" alt=<?php esc_attr_e("Arrow pointing left","anime-games")?> /></a>
     
        <a href="<?php echo esc_url(get_next_posts_page_link());?>"  class="hover:underline focus:underline" ><img src="<?php echo esc_url(get_template_directory_uri()); ?>/src/images/right.png" alt=<?php esc_attr_e("Arrow pointing right","anime-games")?> /></a>
    </div>

    </main>




    
  
  
<?php get_footer();?>