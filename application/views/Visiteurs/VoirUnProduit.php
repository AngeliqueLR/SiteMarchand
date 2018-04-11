<?php
    echo '<h2>'.$unProduit.'</h2>';
    echo '<p>'.img($unProduit['NOMIMAGE']).'</p>';
    $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
    echo $prix;
    echo $unProduit['QUANTITEENSTOCK'].'</br>'.$unProduit['DETAIL'];
?>