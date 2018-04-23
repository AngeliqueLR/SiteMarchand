<html>
    <head>
        <title>De fil en aiguille</title>
        <style type = 'text/css'>
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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('Visiteur/Accueil') ?>"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                        <?php if ($this->session->statut=='Administrateur') : ?>
                            <li class="active"><a href="<?php echo site_url('Administrateur/ajouterUnProduit') ?>">Ajouter un produit</a></li>&nbsp;&nbsp;
                        <?php endif; ?>    
                        <li class="active"><a href="<?php echo site_url('Visiteur/AfficherCatalogue') ?>">Catalogue</a></li>&nbsp;&nbsp;
                        <li class="active"><a href="<?php echo site_url('Visiteur/listerLesArticlesAvecPagination') ?>">Catalogue (par 3)</a></li>&nbsp;&nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($this->session->statut=='Client' or is_null($this->session->statut)) : ?>
                            <li class="active"><a href="<?php echo site_url('Visiteur/Panier') ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>&nbsp;&nbsp; 
                        <?php endif; ?>    
                        <?php if (!is_null($this->session->identifiant)) : ?>
                            <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo ' Bonjour : <B>'.$this->session->prenom.' '.$this->session->nom.'</B>&nbsp;&nbsp;';?></a></li>
                            <li class="active"><a href="<?php echo site_url('Visiteur/seDeconnecter') ?>"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter</a></li>&nbsp;&nbsp; 
                        <?php else : ?>
                            <li class="active"><a href="<?php echo site_url('Visiteur/seConnecter') ?>"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>&nbsp;&nbsp;
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav> 

        <?php
            if($Catalogue == 'oui') :
        ?>
            <br/><br/>
            <div class="container text-center">    
                <div class="row">
                    <div class="col-sm-3 well">
                    <div class="well">
                        <p><a href="#">My Profile</a></p>
                        <img src="<?php echo img_url('LOGO.jpg');?>" class="img-circle" height="65" width="65" alt="Avatar">
                    </div>
                    <div class="well">
                        <p><a href="#">Interests</a></p>
                        <p>
                        <span class="label label-default">News</span>
                        <span class="label label-primary">W3Schools</span>
                        <span class="label label-success">Labels</span>
                        <span class="label label-info">Football</span>
                        <span class="label label-warning">Gaming</span>
                        <span class="label label-danger">Friends</span>
                        </p>
                    </div>
                    <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p><strong>Ey!</strong></p>
                        People are looking at your profile. Find out who.
                    </div>
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                    <p><a href="#">Link</a></p>
                </div>
        <?php
            endif;
        ?>

