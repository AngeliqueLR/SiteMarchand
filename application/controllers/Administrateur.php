<?php
    class Administrateur extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModeleArticle');

            $this->load->library('session');
            if ($this->session->statut=='Client')
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
            $DonneesEnvoyees['LesMarques'] = $this->ModeleArticle->retournerMarque();
            $DonneesEnvoyees['LesCategories'] = $this->ModeleArticle->retournerCategorie();
            
            //regles de validations
            $this->form_validation->set_rules('txtNomProduit', 'required');
            $this->form_validation->set_rules('txtPrixProduit', 'required');
            $this->form_validation->set_rules('txtTVAProduit', 'required');
            $this->form_validation->set_rules('txtPhotoProduit', 'required');
            $this->form_validation->set_rules('txtPhotoBisProduit', 'required');
            $this->form_validation->set_rules('tbxQuantiteProduit', 'required');
            $this->form_validation->set_rules('tbxDetailsProduit', 'required');
            $this->form_validation->set_rules('tbxMarqueProduit', 'required');
            $this->form_validation->set_rules('tbxCategorieProduit', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                //formulaire non validé
                $this->load->view('templates/Entete');
                $this->load->view('Administrateur/ajouterUnProduit', $DonneesEnvoyees);
                $this->load->view('templates/PiedDePage');                                
            } 
            else 
            {
                $dateAjout = date("YY-mm-dd");

                $DonneesAInserer = array('NOCATEGORIE' => $this->input->post('txtCategorieProduit'), 'NOMARQUE' => $this->input->post('txtMarqueProduit'), 
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