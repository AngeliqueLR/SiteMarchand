<?php
    echo '<h2>'.$unProduit['LIBELLE'].'</h2>';
    echo '<p>'.img($unProduit['NOMIMAGE']).' '.img($unProduit['NOMIMAGEBIS']).'</p>';
    $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
    echo $prix.' € </br>';
    echo 'Quantité en stock : '.$unProduit['QUANTITEENSTOCK'].'</br> Informations sur le produit : '.$unProduit['DETAIL'];
?>