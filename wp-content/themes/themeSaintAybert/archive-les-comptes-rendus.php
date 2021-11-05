<?php get_header();

//Pour afficher les CR dans la page comptes-rendus

?>


<div class="container-cr">

    <div class="title text-center">

        <h1>Les comptes-rendus du conseil municipal</h1>

    </div>

    <div class="container-article-cr">




        <?php $loop = new WP_Query(array(
            'post_type' => 'les-comptes-rendus',
            'posts_per_page' => '-1', // mettre -1 pour afficher tous les CR sur la page
            'orderby' => 'meta_value',
            'order' => 'ASC',

        )); ?>

        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="cr d-inline-flex my-2" style="height: 80vh">

                <div class="cr-card justify-content-center" style="width: 100%; height:100%">


                    <div class="title text-center">
                        <h5><?php the_title() ?></h5>
                    </div>

                    <div class="card my-2 mx-2" style="width: 25rem;">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?? null; ?>

                        <img class="card-img-top" src="<?= $image; ?>" alt="<?php the_title(); ?>">
                        <div class="card-body text-center mb-3">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>

            </div>

        <?php endwhile; ?>



    </div>
</div>

<?php get_footer(); ?>