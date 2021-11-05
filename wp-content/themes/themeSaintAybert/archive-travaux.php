<?php get_header();

//Pour afficher les travaux dans la page Les travaux en cour

?>
<div class="container-travaux">

    <div class="title text-center mb-2">

        <h1>Les travaux en cours</h1>
        
    </div>


    <div class="container-article-travaux">




        <?php $loop = new WP_Query(array(
            'post_type' => 'travaux',
            'posts_per_page' => '-1', // mettre -1 pour afficher tous les travaux en cour
            'orderby' => 'meta_value',
            'order' => 'DESC',

        )); ?>

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="travaux d-inline-flex my-3" style="height: 90vh">

                <div class="travaux-card justify-content-center" style="width: 100%;">


                    <div class="title text-center">
                        <h5><?php the_title() ?></h5>
                    </div>

                    <div class="card my-2 mx-2" style="width: 25rem;">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?? null; ?>

                        <img class="card-img-top" src="<?= $image; ?>" alt="<?php the_title(); ?>">
                        <div class="card-body mb-3">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>

            </div>

        <?php endwhile; ?>

    </div>
</div>

<?php get_footer(); ?>