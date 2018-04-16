<html>
    <head>
        <title>De fil en aiguille</title>
        <style type = 'text/css'>
            div[id=unProduit], select
            {
                width : 32%;
                float: left;
                margin-left : 15px;
            }
            div[id=publicite], select
            {
                width : 25%;
                height : 95%;
            }
            div[id=TousLesProduits], select
            {
                width : 100%;
                float: left;
            }
        </style>
    </head>

<body>

    <?php if (!is_null($this->session->identifiant)) : ?>
        <?php echo 'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?>
            <a href="<?php echo site_url('Visiteur/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;

        <?php if ($this->session->statut=='Administrateur') : ?>
            <a href="<?php echo site_url('Administrateur/ajouterUnProduit') ?>">Ajouter un produit</a>&nbsp;&nbsp;
        <?php endif; ?>
    <?php else : ?>
        <a href="<?php echo site_url('Visiteur/seConnecter') ?>">Se Connecter</a>&nbsp;&nbsp;
    <?php endif; ?>
        <a href="<?php echo site_url('Visiteur/AfficherCatalogue') ?>">Tout voir</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('Visiteur/listerLesArticlesAvecPagination') ?>">Catalogue (par 3)</a>&nbsp;&nbsp;


