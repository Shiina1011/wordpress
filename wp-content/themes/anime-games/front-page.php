<?php get_header(); ?>

       <main>
           <div class="hero-main w-full">
           <h1
          class="
            text-white
            xl:pt-36
            pt-36
            text-5xl
            sm:text-6xl
            text-center
            w-11/12
            mx-auto
            md:w-auto
            permanent-font
          "
        >
          <?php bloginfo("title"); ?>
        </h1>
        <p
          
          class="text-white text-center mt-4 w-3/5 xl:w-1/3 2xl:w-1/4 mx-auto quicksand-font"
        >
          <?php bloginfo("description"); ?>
        </p>
        <div
          
          class="w-full hero-gradient"
        >
          <a 
           href='<?php echo esc_url(
              get_permalink(get_option("page_for_posts"))
            ); ?>'
            
            class="text-center  mt-8 mx-auto flex justify-center items-center learn-more-button"
          >
          <?php esc_html_e("The Latest Releases", "anime-games"); ?>
          </a>
       
       </main>
       

       <div
       id="content"
          class="
          blogs
          mx-auto
          flex
          items-center
          flex-wrap
          justify-center
          md:justify-between
          
          mt-20
          mb-20
          "
        >
      <?php $query = new WP_Query("posts_per_page=3"); ?>
       <?php if ($query->have_posts()): ?>
        <?php while ($query->have_posts()):
          $query->the_post(); ?>
        <article>
        <div  class="mt-4 mx-auto post-block-home">
          <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail("animegames_post", [
            "class" => "mx-auto mt-5 w-5/6 ",
          ]); ?>
          <?php else: ?>
            <img class="mx-auto mt-5 w-5/6 " src="<?php echo esc_url(
              get_template_directory_uri()
            ); ?>/src/images/placeholder-post.jpg" alt=<?php esc_attr_e(
            "Placeholder post image",
            "anime-games"
            ); ?>/>
          <?php endif; ?>
          
          <h2
            
            class="mt-5 mx-auto text-center permanent-font"
          >
          <?php the_title(); ?>
          </h2>
          <p
            class="text-center text-sm quicksand-font"
          >
          <?php the_time(); ?>
          </p>
          <span
            class="text-center text-base font-semibold w-4/5 mx-auto quicksand-font"
          >
          <?php the_excerpt(); ?>
          </span>
          <a
            class="flex justify-center items-center mx-auto mt-2 post-block-button-home"
           href="<?php the_permalink(); ?>"
          >
            <?php esc_html_e("Continue reading", "anime-games"); ?> 
          </a>
          </article>
          <?php
        endwhile; ?>
        <?php else: ?>
          <?php esc_html_e("Sorry,no posts were found", "anime-games"); ?>
        <?php endif; ?> 
        <div class="w-full text-center mb-8 xl:mb-0">
          <a
          href='<?php echo esc_url(
            get_permalink(get_option("page_for_posts"))
          ); ?>'
            
            class="text-white mx-auto mt-6 learn-more-button flex justify-center items-center"
          >
          <?php esc_html_e("The Latest Releases", "anime-games"); ?>
        </a>
        </div>
        </div>
        <?php wp_reset_postdata(); ?>
        



        <?php
      
      $recent_pages_args = array( 'post_type' => 'page', 'posts_per_page' => 3);
        
      ?>
      <?php $recent_pages = new WP_Query( $recent_pages_args ); ?>
      <?php if ( $recent_pages->have_posts() ) : ?>
        <?php while ( $recent_pages->have_posts() ): 
          $recent_pages->the_post();   ?>
        <section class="mt-10 mb-10">
       
      <div
        class="w-full mb-10 divider-line"
      ></div>
      <div  class="w-full mb-10">
      
        <h3
          class="mt-10 mx-auto text-center text-lg permanent-font"
          
        >
          <?php the_title();?>
        </h3>
        <span
          
          class="text-center mx-auto font-semibold w-3/5 quicksand-font"
        >
          <?php the_excerpt();?>
      </span>
        <a
          href="<?php the_permalink();?>"
         
          class="
            text-white
            mx-auto
            flex
            justify-center
            items-center
            mt-5
            mb-5
            md:mb-0
            contact-form-button
          "
        >
          <?php esc_html_e('Go to page','anime-games');?>
      </a>
      </div>
      <div
        class="w-full mb-10 divider-line"
      ></div>
      
    </section>
    <?php endwhile;?>
      <?php else: ?>
          <?php esc_html_e("Sorry,no posts were found", "anime-games"); ?>
        <?php endif; ?> 
      
       
    <?php wp_reset_postdata(); ?>
  
<?php get_footer(); ?>
