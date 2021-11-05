</div> <!-- fin container -->
<?php
// Ajoute les JS de WordPress et des plugins
wp_footer() ?>
<div class="container-footer">
    <div class="bg-primary py-4">
        <div class="row d-flex justify-content-around">

            <div class="col-lg-2 my-3 ms-3" style="color: white;">
                <div class="logo-footer d-flex  align-self-center justify-content-center">
                    <span class="dashicons dashicons-backup mb-3"></span>
                </div>
                <div class="desc-footer text-center">

                    <h4>Horaires d'ouverture</h4>
                    <p>Lundi / Mardi / Jeudi / Vendredi de 14h à 18h</p>
                    <p>Samedi de 9h à 12h sur rendez-vous</p>
                </div>
            </div>


            <div class="col-lg-2 my-3 ms-3 " style="color: white;">
                <div class="logo-footer d-flex  align-self-center justify-content-center">
                    <span class="dashicons dashicons-phone mb-3"></span>
                </div>
                <div class="desc-footer text-center">

                    <h4>Par téléphone</h4>
                    <p>03 27 45 42 89</p>
                </div>
            </div>

            <div class="col-lg-2 my-3 ms-3" style="color: white;">
                <div class="logo-footer d-flex  align-self-center justify-content-center">
                    <span class="dashicons dashicons-email-alt mb-3"></span>
                </div>
                <div class="desc-footer text-center">

                    <h4>Par Email</h4>


                    <?php dynamic_sidebar('footer-1', 'footer 1') ?>



                </div>
            </div>

            <div class="col-lg-2 my-3 ms-3" style="color: white;">
                <div class="logo-footer d-flex  align-self-center justify-content-center">
                    <span class="dashicons dashicons-location mb-3"></span>
                </div>
                <div class="desc-footer text-center">

                    <h4>Se rendre en mairie</h4>
                    <h6>11 bis rue de l'église</h6>
                    <h6>59163 Saint-Aybert</h6>
                </div>
            </div>


        </div>

        <div class="chartes text-center">
    
            <a href="https://ntotest.fr/politique-de-confidentialite/">Mention légale</a>
            
    
        </div>
    </div>

    
</div>
</body>

</html>