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

            $DonneesEnvoyees['TitreDeLaPage'] = 'Ajouter un produit au catalogue';
            
            //regles de validations
            $this->form_validation->set_rules('txtNomProduit', 'Nom du produit', 'required');
            $this->form_validation->set_rules('txtPrixProduit', 'Prix HT du produit', 'required');
            $this->form_validation->set_rules('txtTVAProduit', 'Taux de TVA du produit', 'required');
            $this->form_validation->set_rules('txtPhotoProduit', 'Première photo du produit', 'required');
            $this->form_validation->set_rules('txtPhotoBisProduit', 'Deuxième photo du produit', 'required');
            $this->form_validation->set_rules('tbxQuantiteProduit', 'Quantité en stock', 'required');
            $this->form_validation->set_rules('tbxDetailsProduit', 'Détails', 'required');
            $this->form_validation->set_rules('tbxMarqueProduit', 'Marque du produit', 'required');
            $this->form_validation->set_rules('tbxCategorieProduit', 'Catégorie du produit', 'required');

            $numeroCategorie = $this->ModeleArticle->GetNumeroCategorie($this->input->post('txtCategorieProduit'));
            $numeroMarque = $this->ModeleArticle->GetNumeroMarque($this->input->post('txtMarqueProduit'));
            $dateAjout = date("YY-mm-dd");

            if ($this->form_validation->run() === FALSE)
            {
                //formulaire non validé
                $this->load->view('templates/Entete');
                $this->load->view('Administrateur/ajouterUnProduit', $DonneesEnvoyees);
                $this->load->view('templates/PiedDePage');                                
            } 
            else 
            {
                $DonneesAInserer = array('NOCATEGORIE' => $numeroCategorie, 'NOMARQUE' => $numeroMarque, 
                'LIBELLE' => $this->input->post('txtNomProduit'), 'DETAIL' => $this->input->post('txtDetailsProduit'),
                'PRIXHT' => $this->input->post('txtPrixProduit'), 'TAUXTVA' => $this->input->post('txtTVAProduit'),
                'NOMIMAGE' => $this->input->post('txtPhotoProduit'), 'NOMIMAGEBIS' => $this->input->post('txtPhotoBisProduit'),
                'QUANTITEENSTOCK' => $this->input->post('txtQuantiteProduit'), 'DATEAJOUT' => $dateAjout,
                'DISPONIBLE' => '1', 'Promotion' => '0');

                $this->ModeleArticle->insererUnArticle($DonneesAInserer);
            }
        }
    }
?>