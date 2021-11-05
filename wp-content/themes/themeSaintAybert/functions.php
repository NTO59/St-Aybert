<?php


function my_theme_enqueue_styles()
{
    wp_enqueue_style('Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');

    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', [], time()); // time il sert à ne pas vider le cache

    // On integre le  JS de bootstrap
    // Le dernier parametre true permet de mettre la balise script dans le footer et non dans le body
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', [], false, true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


/**
 * Ajout du logo
 */
add_theme_support('custom-logo');
add_theme_support('custom-logo2');


/**
 * Afficher les images à la une
 */
add_theme_support('post-thumbnails');


/**
 * Breadcrumb (fil d'ariane)
 */
function the_breadcrumb()
{
    echo '<div id="crumbs">';

    if (!is_front_page()) {
        echo '<p><a href="';
        echo get_bloginfo('url');
        echo '">';
        echo 'Accueil ' . " > " . ' ';
        echo "</a></p>";
        if (is_category() || is_archive()) {
            echo '<p>';
            the_category(' </p><p> ');
            if (is_single()){
                echo "</p><p>";
                ' ' . the_title();
                echo '</p>';
                
            }if(is_post_type_archive('les-comptes-rendus')){
                echo ' '.'<p > Les comptes-rendus du conseil municipal </p>';
            }else if(is_post_type_archive('travaux')){
                echo ' '.'<p> Travaux </p>';
            }
        } elseif (is_page() ) {
            echo '<a>';
            echo the_title();
            echo '</a>';
        } elseif (is_home()) {
            echo '<a>';
            echo 'Actualités';
            echo '</a>';
        }
    }
    echo '</div>';
}

/**
 * sidebar pour le footer
 */
register_sidebar([
    'id' => 'footer-1',
    'name' => 'footer 1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>'
]);


/**
 * NavBar du header
 */
function register_my_menu()
{
    register_nav_menu('main-menu', 'Menu principal');
}

add_action('init', 'register_my_menu');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/**
 * Barre de recherche
 */
function my_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    
    <input type="text" placeholder="Chercher..." class="rounded-3 form-control" value="' . get_search_query() . '" name="s" id="s" />
   
   <button type="submit" id="searchsubmit" class="glyphicon glyphicon-search btn btn-outline-warning">Rechercher</button>
    
    </form>';

    return $form;
}
add_filter('get_search_form', 'my_search_form');

// filtre de recherche
function my_search_filter($query)
{
    if (!is_admin()) {
        if ($query->is_search) {
            $query->set('category__not_in', array(37));
        }
        return $query;
    }
}
add_filter('pre_get_posts', 'my_search_filter');


/**
 * Ajouter les comptes-rendus dans le dashboard
 */
function register_my_cpt()
{

    register_post_type('les-comptes-rendus', [
        'label' => 'les-comptes-rendus',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'menu_position' => 4
    ]);

    
}
add_action('init', 'register_my_cpt');

/**
 * Ajouter les comptes-rendus dans le dashboard
 */
function register_travaux()
{

    register_post_type('travaux', [
        'label' => 'travaux',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-hammer',
        'menu_position' => 5
    ]);

    
}
add_action('init', 'register_travaux');
