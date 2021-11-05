<div class="container-search">
 <p>
  <?php
  $count = $wp_query->found_posts; //$wp_query est une variable globale contenant les résultats des requêtes
  $several = ($count<=1) ? '' : 's'; //pluriel

if ($count>0) : $output = $count.' résultat'.$several.' pour la recherche';
  else : $output = 'Aucun résultat pour la recherche';
  endif;
  $output .= ' "<span class="terms_search">'. get_search_query() .'</span>"';
  echo $output;
  ?>
  </p>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- 1) S'il y a au moins un résultat -->
  <article class="article_found" id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </article>
  <?php
  endwhile;
  else:
  ?>
    <!-- 2) Si pas de résultat -->
  <p>Votre recherche est infructueuse. Veuillez essayer avec d'autres termes de recherche.</p>
  <?php endif; ?>
 </div>