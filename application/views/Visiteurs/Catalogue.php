<?php
    echo '<div id="hautDePage" />';
    echo '<h2>'.$TitreDePage.'<h2>';

    foreach ($lesProduits as $unProduit):
        $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
        echo '<tr><td>'.$unProduit['LIBELLE'].'</td><td>'.$prix.'</td><td>'.$unProduit['QUANTITEENSTOCK'].'</td><td>'.img($unProduit['NOMIMAGE']).'</td></tr>';
    endforeach;
    echo '<h5>'.anchor('#hautDePage', 'Haut de page').'</h5>';
?>