<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="<?php bloginfo('charset');?>"/> 
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <?php wp_head();?>
  </head>
  <body  id="body-main"  <?php body_class('body-bg');?>>
  <?php wp_body_open(); ?>
  <a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'anime-games' ); ?></a>
    <header class="w-full md:h-20 py-5 md:mt-0 border-box header-border">
    <div
        class="
          w-4/5
          md:w-4/5
          mx-auto
          flex flex-wrap
          items-center
          justify-between
          sm:justify-between
        "
      >
        <a
          href="/"
          class="text-black w-60 md:w-40 sm:w-auto sm:mx-0 sm:text-left logo-style"
          ><?php bloginfo('name'); ?> </a
        >
      <nav role="navigation">
        
        <div>
          
          <?php wp_nav_menu(array(
            'container' =>'',
            'theme_location' => 'primary',
            'menu_class' => "navigation-main hidden md:flex  justify-between",
            'menu_id' => 'main-menu',
            ));?>
          </div>
          
          
       <button
            id="hamburger-button"
            class="block text-center md:hidden cursor-pointer "
            onclick="anime_games_toggleHamburger();"
            aria-controls="hidden-main-menu" 
            aria-expanded="false"
          >
            <div class="w-8 h-1 mx-0 mt-1 hamburger-line"></div>
            <div class="w-8 h-1 mx-0 mt-1 hamburger-line"></div>
            <div class="w-8 h-1 mx-0 mt-1 hamburger-line"></div>
          </button>
         
         
       </div> 
       </nav>
       <div id="hidden-menu" class="hidden md:hidden w-full " >
          <?php $args = array(
            'theme_location' => 'primary',
            'menu_class' => "navigation-hidden flex flex-col font-sans text-base items-center p-7",
            'menu_id' => 'hidden-main-menu',
            );?>
          <?php wp_nav_menu($args);?>
        </div>
      
        
    </header>