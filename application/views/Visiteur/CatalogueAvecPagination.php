<h2><?php echo $TitreDeLaPage ?></h2>

<?php 

    foreach ($lesProduits as $unProduit):
        echo '<div id = "unProduit">';
        $prix = array($unProduit['PRIXHT'] + ($unProduit['PRIXHT'] * $unProduit['TAUXTVA'] / 100));
        echo '<div id = "nomProduit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['LIBELLE']).'</div><div id ="prix produit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $prix.' €').'</div><div id = "quantiteProduit">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], $unProduit['QUANTITEENSTOCK']).'</div><div id = "image">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img($unProduit['NOMIMAGE'], "image1")).'</div><div id = "imageBis">'.anchor('Visiteur/VoirUnProduit/'.$unProduit['NOPRODUIT'], img($unProduit['NOMIMAGEBIS'], "image2")).'</div>';
        echo '</div>';
    endforeach;

    foreach ($lesArticles as $unArticle):
         echo '<h3>'.anchor('visiteur/voirUnProduit/'.$unArticle->cNo,$unArticle->cTitre).'</h3>';
    endforeach
?>

<p><?php echo $liensPagination; ?></p>