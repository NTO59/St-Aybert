<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <?php wp_head(); ?>


    <title>
        <?php bloginfo('name') . wp_title('-', true, 'left');?>
    </title>

</head>

<body>
    
    
    <div class="container-fluid container-header bg-primary">
        <nav class="navbar navbar-expand-lg navbar-dark ">

            <a class="navbar-brand text-center" href="<?= home_url() ?>">
                <?php
                $logoId = get_theme_mod('custom_logo');
                $logoImg = wp_get_attachment_image_url($logoId, 'full');

                ?>

                <?php if ($logoImg) { ?>

                    <img src="http://localhost/saint-aybert/wordpress/wp-content/uploads/2021/05/blason_st-aybert.png" height="40" alt="<?= bloginfo('name') ?>">
                    <img src="<?= $logoImg ?>" height="50" alt="<?= bloginfo('name') ?>">

                    <p style="color: #ffc107; border-color: #ffc107; background: transparent ">Saint-Aybert</p>



                <?php } else {
                    bloginfo('name');
                } ?>


                <span class="site-description"> <?php bloginfo('description'); ?> </span>
            </a>



            <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'depth' => 2, // profondeur du menu
                    'container' => false,
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navbarSupportedContent',
                    'menu_class' => 'navbar-nav',
                    'walker' => new WP_Bootstrap_Navwalker()
                ]);
                ?>


            </div>

            <?php get_search_form(); // barre de recherche ?>

            <!-- bouton menu hamburger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <?php the_breadcrumb(); // fil d'ariane ?>
    </div>
    <div class="container">