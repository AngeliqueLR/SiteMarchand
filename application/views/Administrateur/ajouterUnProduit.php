<h2><?php echo $TitreDeLaPage ?></h2>
<?php 
    echo validation_errors();
    echo form_open('administrateur/ajouterUnArticle') 
?>
    <label for="txtNomProduit">Nom du produit</label>
        <input type="input" name="txtNomProduit" value="<?php echo set_value('txtNomProduit'); ?>" /><br/>

    <label for="tbxDetailsProduit">Détails de l'article</label>
        <textarea name="tbxDetailsProduit" value="<?php echo set_value('tbxDetailsProduit'); ?>"></textarea><br/>

    <label for="txtPhotoProduit">Première photo du produit</label>
        <input type="input" name="txtPhotoProduit" value="<?php echo set_value('txtPhotoProduit'); ?>" /><br/>

    <label for="txtPhotoBisProduit">Deuxième photo du produit</label>
        <input type="input" name="txtPhotoBisProduit" value="<?php echo set_value('txtPhotoBisProduit'); ?>" /><br/>

    <label for="tbxQuantiteProduit">Quantité en stock</label>
        <input type="input" name="tbxQuantiteProduit" value="<?php echo set_value('tbxQuantiteProduit'); ?>" /><br/>

    <label for="tbxMarqueProduit">Marque du produit</label>
        <select name="tbxMarqueProduit" value="<?php echo set_value('tbxMarqueProduit'); ?>" /><br/>

    <label for="tbxCategorieProduit">Catégorie du produit</label>
        <select name="tbxCategorieProduit" value="<?php echo set_value('tbxCategorieProduit'); ?>" /><br/>

    <input type="submit" name="submit" value="Ajouter un article" />
    
</form>