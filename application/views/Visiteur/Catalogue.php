<?php
    echo '<div id="hautDePage"><h2>'.$TitreDePage.'<h2></div>';

    echo '<div id = "TousLesProduits">';
        foreach ($lesProduits as $unProduit):
            echo '<div id = "unProduit">';
            $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
            echo '<div id = "nomProduit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['LIBELLE']).'</div><div id ="prix produit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $prix.' €').'</div><div id = "quantiteProduit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['QUANTITEENSTOCK']).'</div><div id = "image">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img_onmouseover($unProduit['NOMIMAGE'], $unProduit['NOMIMAGEBIS'])).'</div>';
            echo '</div>';
        endforeach;
    echo '</div>';
    echo '<h5><a href = "#hautDePage">Haut de page</a></h5>';
?>