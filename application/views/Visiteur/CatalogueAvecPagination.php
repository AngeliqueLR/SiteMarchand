<div class="col-sm-9">

        <?php
            echo '<h2>'.$TitreDeLaPage.'</h2><br/><br/>';
            $nbProduits = 0;

            echo '<div class="row">';
            foreach ($LesProduits as $unProduit):
                echo '<div class="col-sm-4">';
                $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
                echo '<p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['LIBELLE']).'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $prix.' €').'</p><p><span class="glyphicon glyphicon-shopping-cart"></span></p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img_onmouseover($unProduit['NOMIMAGE'], $unProduit['NOMIMAGEBIS'])).'</p>';
                echo '</div>';
                $nbProduits = $nbProduits + 1;
                if ($nbProduits%3 == 0)
                {
                    echo '</div><br/>';
                    echo '<div class="row">';
                }
            endforeach;        
            echo '</div>';
    ?>

    <p><?php echo $liensPagination; ?></p>
</div>