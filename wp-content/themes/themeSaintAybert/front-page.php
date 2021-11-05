<!-- la page d'acceuil -->
<?php get_header() ?>



<div class="content">

    <?= the_content(); // page d'accueil Elementor?> 


    <?php $loop = new WP_Query(array(
        'post_type' => 'les-comptes-rendus',
        'posts_per_page' => '6',
        'order' => 'ASC',

    )); ?>

    <?php while ($loop->have_posts()) : $loop->the_post(); 
    
   
    
    ?>

        <div class="comptes-rendus d-inline-flex my-3">

            <div class="comptes-rendus-card justify-content-center">


                <div class="title text-center">
                    <h5><?php the_title() ?></h5>
                </div>

                <div class="card my-2 mx-2" style="width: 25rem;">
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?? null; ?>

                    <img class="card-img-top" src="<?= $image; ?>" alt="<?php the_title(); ?>">
                    <div class="card-body d-grid text-center">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>

        </div>

    <?php endwhile; ?>

    <?php wp_reset_query(); ?>
</div>


<?php get_footer() ?>