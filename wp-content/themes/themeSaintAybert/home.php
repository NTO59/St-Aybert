<?php

// pour afficher chaque article des actualités

get_header(); ?>

<div class="container-article">
    <h1>Actualités</h1>

    <?php

    if (have_posts()) :


        while (have_posts()) : the_post();


    ?>

            <h3 id="post-<?php the_ID(); ?>"><?php the_title() ?></h3>



            <?php the_content(); ?>



        <?php


        endwhile;


    else :
        ?>

    <?php
    endif;
    ?>

</div>


<?php get_footer(); ?>