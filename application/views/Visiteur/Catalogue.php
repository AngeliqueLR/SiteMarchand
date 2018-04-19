<?php
    echo '<div id="hautDePage"><h2>'.$TitreDePage.'<h2></div>';

    echo '<div class="row">';
    foreach ($lesProduits as $unProduit):
        echo '<div class="col-sm-4">';
        $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
        echo '<p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['LIBELLE']).'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $prix.' €').'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['QUANTITEENSTOCK']).'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img_onmouseover($unProduit['NOMIMAGE'], $unProduit['NOMIMAGEBIS'])).'</p>';
        echo '</div>';
    endforeach;
    echo '</div>';
    echo '<h5><a href = "#hautDePage">Haut de page</a></h5>';
?>