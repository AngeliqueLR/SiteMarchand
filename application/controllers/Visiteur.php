<?php
    class Visiteur extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('assets');
            $this->load->library("pagination");
            $this->load->model('ModeleArticle');          
        }

        public function AfficherCatalogue()
        {
            $DonneesEnvoyees['lesProduits'] = $this->ModeleArticle->retournerProduit();
            $DonneesEnvoyees['TitreDePage'] = 'De fil en aiguille trouvez votre petit bonheur par ici';

            $this->load->view('templates/Entete');            
            $this->load->view('Visiteur/Catalogue', $DonneesEnvoyees);
            $this->load->view('templates/PiedDePage');            
        }

        public function voirUnProduit($pNoProduit = NULL)
        {
            $DonneesEnvoyees['unProduit'] = $this->ModeleArticle->retournerProduit($pNoProduit);

            if (empty($DonneesEnvoyees['unProduit']))
            {//pas d'article correspondant à ce numéro
                show_404();
            }

            $DonneesEnvoyees['TitreDePage'] = $DonneesEnvoyees['unProduit']['LIBELLE'];
            //récupère le nom du produit et l'ajoute comme titre

            $this->load->view('templates/Entete');            
            $this->load->view('Visiteur/VoirUnProduit', $DonneesEnvoyees);
            $this->load->view('templates/PiedDePage');            
        }

        public function seConnecter()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $DonneesInjectees['TitreDeLaPage'] = 'Connectez-vous!';

            $this->form_validation->set_rules('txtIdentifiant', 'Identifiant', 'required');
            $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/Entete');
                $this->load->view('Visiteur/seConnecter', $DonneesInjectees);
                $this->load->view('templates/PiedDePage');
            }
            else
            {  
                $Utilisateur = array( 
                'EMAIL' => $this->input->post('txtIdentifiant'),
                'MOTDEPASSE' => $this->input->post('txtMotDePasse'),);

                $UtilisateurRetourne = $this->ModeleUtilisateur->retournerUtilisateur($Utilisateur);

                if (!($UtilisateurRetourne == null))
                { 
                    $this->load->library('session');
                    $this->session->identifiant = $UtilisateurRetourne->EMAIL;
                    $this->session->statut = $UtilisateurRetourne->PROFIL;

                    $DonneesInjectees['Identifiant'] = $Utilisateur['EMAIL'];
                    
                    $this->load->helper('url');
                    redirect('/Utilisateur/Catalogue');
                }
                else
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('visiteur/seConnecter', $DonneesInjectees);
                    $this->load->view('templates/PiedDePage');
                }  
            }
        }

        public function seDeConnecter() 
        { 
            $this->session->sess_destroy();
        }

        public function listerLesArticlesAvecPagination() 
        {
            $config = array();
            $config["base_url"] = site_url('visiteur/CatalogueAvecPagination');
            $config["total_rows"] = $this->ModeleArticle->nombreDArticles();
            $config["per_page"] = 3;
            $config["uri_segment"] = 3;       
           
         
            $config['first_link'] = 'Premier';
            $config['last_link'] = 'Dernier';
            $config['next_link'] = 'Suivant';
            $config['prev_link'] = 'Précédent';
         
            $this->pagination->initialize($config);
            $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
            $DonneesInjectees['lesProduits'] = $this->ModeleArticle->retournerProduit();
            $DonneesInjectees['TitreDeLaPage'] = 'De fil en aiguille trouvez votre petit bonheur par ici';
            //$DonneesInjectees["lesArticles"] = $this->ModeleArticle->retournerArticlesLimite($config["per_page"], $noPage);
            $DonneesInjectees["liensPagination"] = $this->pagination->create_links();
         
            $this->load->view('templates/Entete');
            $this->load->view("Visiteur/CatalogueAvecPagination", $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
    }
?>