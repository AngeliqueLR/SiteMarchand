<?php
    echo '<div id="hautDePage" />';
    echo '<h2>'.$TitreDePage.'<h2>';

    echo '<table>';
    foreach ($lesProduits as $unProduit):
        $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
        echo '<tr><td>'.$unProduit['LIBELLE'].'</td><td>'.$prix.' €</td><td>'.$unProduit['QUANTITEENSTOCK'].'</td><td>'.img($unProduit['NOMIMAGE'], "image1").'</td><td>'.img($unProduit['NOMIMAGEBIS'], "image2").'</td></tr>';
    endforeach;
    echo '</table>';
    echo '<h5>'.anchor('#hautDePage', 'Haut de page').'</h5>';
?>