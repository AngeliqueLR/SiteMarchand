<?php
    class Administrateur extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModeleArticle');

            $this->load->library('session');
            if ($this->session->statut==0)
            {
                $this->load->helper('url');
                redirect('/Visiteur/seConnecter');
            }
        }

        public function ajouterUnProduit()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $DonneesEnvoyees['TitreDeLaPage'] = 'Ajouter un article';
            
            //regles de validations
            $this->form_validation->set_rules('txtNomProduit', 'Nom du produit', 'required');
            $this->form_validation->set_rules('txtPrixProduit', 'Prix HT du produit', 'required');
            $this->form_validation->set_rules('txtTVAProduit', 'Taux de TVA du produit', 'required');
            $this->form_validation->set_rules('txtPhotoProduit', 'Première photo du produit', 'required');
            $this->form_validation->set_rules('txtPhotoBisProduit', 'Deuxième photo du produit', 'required');
            $this->form_validation->set_rules('tbxQuantiteProduit', 'Quantité de produit disponible', 'required');
            
            
            
            
        }
    }
?>