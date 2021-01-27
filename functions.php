<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Définir la taille des images mises en avant
set_post_thumbnail_size( 2000, 400, true );

// Définir d'autres tailles d'images
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );

register_sidebar( array(
    'id' => 'widget-1',
    'name' => 'widget-1',
    'before_widget'  => '<div class="site__sidebar__widget %2$s">',
    'after_widget'  => '</div>',
    'before_title' => '<p class="site__sidebar__widget__title">',
    'after_title' => '</p>',
  ) );

function register_assets() {
    
    wp_deregister_script( 'jquery' ); // On annule l'inscription du jQuery de WP
    wp_enqueue_script( // On déclare une version plus moderne
        'jquery', 
        'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', 
        false, 
        '3.3.1', 
        true 
    );

    // fancyapps JS
    wp_enqueue_script( 
        'fancyapps', 
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', 
        false,
        array( 'jquery' ), 
        '3.5.7', 
        true
    ); 	
    
    // rellax
    wp_enqueue_script( 
        'rellax', 
        'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js',   
        false,      
        '1.12.1', 
        true
    ); 	

    if( is_front_page() )
    {
        wp_enqueue_script( 'owl', 
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', 
        false,
        '2.3.4', 
        true );
        wp_enqueue_style( 'owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', false );
        wp_enqueue_style( 'owl-css-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', false );
    }

    // Déclarer le JS
	wp_enqueue_script( 
        'app', 
        get_template_directory_uri() . '/js/app.min.js', 
        false,
        '1.0', 
        true
    ); 	
    
    // Foundation CDN
    wp_enqueue_style( 
        'foundation', 
        'https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css',
        array(), 
        '1.0'
    );

    // fancyapps CDN
    wp_enqueue_style( 
        'fancyapps', 
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css',
        array(), 
        '1.0',
    );

    // Déclarer un autre fichier CSS
    wp_enqueue_style( 
        'style', 
        get_template_directory_uri() . '/css/app.min.css',
        array(), 
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'register_assets' );

add_filter('use_block_editor_for_post', '__return_false', 10);



/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Les chambres', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'La chambre', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Les chambres'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les chambres'),
		'view_item'           => __( 'Voir les chambres'),
		'add_new_item'        => __( 'Ajouter une nouvelle chambre'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la chambre'),
		'update_item'         => __( 'Modifier la chambre'),
		'search_items'        => __( 'Rechercher une chambre'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Les chambres'),
		'description'         => __( ''),
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-palmtree',
        'menu_position'       => 25,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'chambres'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "les chambres" et ses arguments
	register_post_type( 'chambres', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );
