<html>
    <head>
        <title>De fil en aiguille</title>
    </head>

<body>

    <?php if (!is_null($this->session->identifiant)) : ?>
        <?php echo 'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?>
            <a href="<?php echo site_url('Visiteur/seDeconnecter') ?>">Se déconnecter</a>&nbsp;&nbsp;

        <?php if ($this->session->statut==1) : ?>
            <a href="<?php echo site_url('administrateur/ajouterUnArticle') ?>">Ajouter un article</a>&nbsp;&nbsp;
        <?php endif; ?>
    <?php else : ?>
        <a href="<?php echo site_url('Visiteur/seConnecter') ?>">Se Connecter</a>&nbsp;&nbsp;
    <?php endif; ?>
        <a href="<?php echo site_url('Visiteur/AfficherCatalogue') ?>">Tout voir</a>&nbsp;&nbsp;
        <a href="<?php echo site_url('Visiteur/listerLesArticlesAvecPagination') ?>">Catalogue (par 3)</a>&nbsp;&nbsp;


