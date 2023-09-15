<?php wp_footer();?>

<footer>
<div class="w-full footer-div m-auto ">
        <img class="text-center mx-auto pt-5" src="<?php echo esc_url(
              get_template_directory_uri()
            ); ?>/src/images/logo.png" />
        <nav class="mx-auto flex justify-center mt-5">
          <div>
          <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_class' => "navigation-main navigation-footer flex  justify-between",
            'menu_id' => 'footer-menu',
            ));?>
          
          
   
            
       
       
      </div>
      </nav>
     <?php animegames_setTimeFrame();?>
          </div>
             </footer>
   
  </body>
</html>