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
            select[name=tbxCategorieProduit], select
            {
                width : 175px;
                height : 21px;
            }
            select[name=tbxMarqueProduit], select
            {
                width : 175px;
                height : 21px;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar 
            {
                margin-bottom: 0;
                border-radius: 0;
            }
            
            /* Add a gray background color and some padding to the footer */
            footer 
            {
                background-color: #f2f2f2;
                padding: 25px;
            }
            
            .carousel-inner img 
            {
                width: 100%; /* Set width to 100% */
                margin: auto;
                min-height:200px;
            }

            /* Hide the carousel text when the screen is less than 600 pixels wide */
            @media (max-width: 600px) 
            {
                .carousel-caption 
                {
                    display: none; 
                }
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Accueil</a></li>
                <?php if ($this->session->statut=='Administrateur') : ?>
                    <li class="active"><a href="<?php echo site_url('Administrateur/ajouterUnProduit') ?>">Ajouter un produit</a></li>&nbsp;&nbsp;
                <?php endif; ?>    
                <li class="active"><a href="<?php echo site_url('Visiteur/AfficherCatalogue') ?>">Tout voir</a></li>&nbsp;&nbsp;
                <li class="active"><a href="<?php echo site_url('Visiteur/listerLesArticlesAvecPagination') ?>">Catalogue (par 3)</a></li>&nbsp;&nbsp;
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!is_null($this->session->identifiant)) : ?>
                    <li class="active"><a href="#"><?php echo 'Utilisateur connecté : <B>'.$this->session->identifiant.'</B>&nbsp;&nbsp;';?></a></li>
                    <li class="active"><a href="<?php echo site_url('Visiteur/seDeconnecter') ?>"><span class="glyphicon glyphicon-log-in"></span> Se déconnecter</a></li>&nbsp;&nbsp; 
                <?php else : ?>
                    <li class="active"><a href="<?php echo site_url('Visiteur/seConnecter') ?>"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>&nbsp;&nbsp;
                <?php endif; ?>
            </ul>
            </div>
        </div>
        </nav> 

