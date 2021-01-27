<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header">
    <div class="logo text-center">
      <a href="<?php echo home_url( '/' ); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-auberge-arc-en-ciel.jpg" alt="Logo">
      </a>  
    </div>
    <nav>
      <?php 
          wp_nav_menu( 
              array( 
                  'theme_location' => 'main', 
                  'container' => 'ul', // afin d'éviter d'avoir une div autour 
                  'menu_class' => 'site__header__menu', // ma classe personnalisée 
              ) 
          ); 
      ?>
    </nav>
  </header>
    
    <?php wp_body_open(); ?>