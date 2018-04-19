<h2><?php echo $TitreDeLaPage ?></h2>

<?php 
    echo '<div class="row">';
    foreach ($LesProduits as $unProduit):
        echo '<div class="col-sm-4">';
        $prix = $unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100);
        echo '<p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['LIBELLE']).'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $prix.' €').'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['QUANTITEENSTOCK']).'</p><p>'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img_onmouseover($unProduit['NOMIMAGE'], $unProduit['NOMIMAGEBIS'])).'</p>';
        echo '</div>';
    endforeach;
    echo '</div>';
?>

<p><?php echo $liensPagination; ?></p>