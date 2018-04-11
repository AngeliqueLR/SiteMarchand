<?php
    class Visiteur extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('assets');
            $this->load->library("pagination");
            $this->load->model('ModeleCatalogue');          
        }

        public function AfficherCatalogue()
        {
            $DonneesEnvoyees['lesProduits'] = $this->ModeleCatalogue->retournerProduit();
            $DonneesEnvoyees['TitreDePage'] = 'De fil en aiguille trouvez votre petit bonheur par ici';

            $this->load->view('Visiteur/Catalogue', $DonneesEnvoyees);
        }

        public function voirUnProduit($pNoProduit = NULL)
        {
            $DonneesEnvoyees['unProduit'] = $this->ModeleCatalogue->retournerProduit($pNoProduit);

            if (empty($DonneesEnvoyees['unProduit']))
            {//pas d'article correspondant à ce numéro
                show_404();
            }

            $DonneesEnvoyees['TitreDePage'] = $DonneesEnvoyees['unProduit']['LIBELLE'];
            //récupère le nom du produit et l'ajoute comme titre

            $this->load->view('Visiteur/VoirProduit', $DonneesEnvoyees);
        }

    }
?>