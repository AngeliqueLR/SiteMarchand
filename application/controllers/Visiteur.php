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
            $this->load->model('ModeleUtilisateur');          
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

            $this->form_validation->set_rules('txtIdentifiant', 'required');
            $this->form_validation->set_rules('txtMotDePasse', 'required');

            if (!($this->input->post('submit')))
            {
                $this->load->view('templates/Entete');
                $this->load->view('Visiteur/seConnecter', $DonneesInjectees);
                $this->load->view('templates/PiedDePage');
            }
            else
            {  
                $Utilisateur = array( 
                'EMAIL' => $this->input->post('txtIdentifiant'),
                'MOTDEPASSE' => $this->input->post('txtMotDePasse'));

                $UtilisateurRetourne = $this->ModeleUtilisateur->retournerUtilisateur($Utilisateur);

                if (!($UtilisateurRetourne == null))
                { 
                    $this->load->library('session');
                    $this->session->identifiant = $UtilisateurRetourne->EMAIL;
                    $this->session->statut = $UtilisateurRetourne->PROFIL;
                    $this->session->nom = $UtilisateurRetourne->NOM;
                    $this->session->prenom = $UtilisateurRetourne->PRENOM;

                    $DonneesInjectees['Identifiant'] = $Utilisateur['EMAIL'];
                    
                    $this->load->helper('url');
                    redirect('/Visiteur/AfficherCatalogue');    
                }
                else
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('Visiteur/seConnecter', $DonneesInjectees);
                    $this->load->view('templates/PiedDePage');
                }  
            }
        }

        public function Inscription()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('email');

            $DonneesInjectees['TitreDeLaPage'] = 'Inscrivez-vous!';

            $this->form_validation->set_rules('txtNom', 'required');
            $this->form_validation->set_rules('txtPrenom', 'required');
            $this->form_validation->set_rules('txtAdresse', 'required');
            $this->form_validation->set_rules('txtCodePostal', 'required');
            $this->form_validation->set_rules('txtVille', 'required');
            $this->form_validation->set_rules('txtEMail', 'required');
            $this->form_validation->set_rules('txtMotDePasse', 'required');
            $this->form_validation->set_rules('txtConfMotDePasse', 'required');


            if (!($this->input->post('submit')))
            {
                $this->load->view('templates/Entete');
                $this->load->view('Visiteur/Inscription', $DonneesInjectees);
                $this->load->view('templates/PiedDePage');
            }
            else
            {        
                if ($this->input->post('txtMotDePasse') == $this->input->post('txtConfMotDePasse'))  
                {      
                    $Utilisateur = array('EMAIL' => $this->input->post('txtEMail'));

                    $MailRetourne = $this->ModeleUtilisateur->retournerMail($Utilisateur);

                    if ($MailRetourne == null)
                    { 
                        $DonneesAInserer = array('NOM' => $this->input->post('txtNom'), 'PRENOM' => $this->input->post('txtPrenom'),
                        'ADRESSE' => $this->input->post('txtAdresse'), 'VILLE' => $this->input->post('txtVille'), 'CODEPOSTAL' => $this->input->post('txtCodePostal'), 'EMAIL' => $this->input->post('txtEMail'),
                        'MOTDEPASSE' => $this->input->post('txtMotDePasse'), 'PROFIL'=> 'Client');

                        $this->ModeleUtilisateur->sInscrire($DonneesAInserer);

                        $UtilisateurRetourne = $this->ModeleUtilisateur->retournerUtilisateur($Utilisateur);
                        $this->load->library('session');
                        $this->session->identifiant = $UtilisateurRetourne->EMAIL;
                        $this->session->statut = $UtilisateurRetourne->PROFIL;
                        $this->session->nom = $UtilisateurRetourne->NOM;
                        $this->session->prenom = $UtilisateurRetourne->PRENOM;

                        $DonneesInjectees['Identifiant'] = $Utilisateur['EMAIL'];
                        $DonneesInjectees['Nom'] = $this->input->post('Nom');
                        $DonneesInjectees['Prenom'] = $this->input->post('txtPrenom');
                        $DonneesInjectees['MotDePasse'] = $this->input->post('txtMotDePasse');

                        $this->email->from('lerouxangelique.alr@gmail.com', 'De fil en aiguille');
                        $this->email->to($Utilisateur['EMAIL']); 
                        //$this->email->to('angelique.le-roux@gmx.fr');
                        $this->email->subject('Bienvenu sur notre site');
                        $message = 'Bonjour '. $this->input->post('txtPrenom').' '.$this->input->post('txtNom').', ';
                        $message .= ' Nous vous confirmons votre inscription sur notre site "De fil en aiguille". ';
                        $message .= '       Votre identifiant est : '.$Utilisateur['EMAIL'].'. ';
                        $message .= '       Votre mot de passe : '.$this->input->post('txtMotDePasse').'. ';
                        $message .= 'En espérant que vous trouverez votre bonheur chez nous.';
                        $this->email->message($message);	

                        if (!$this->email->send())
                        {
                            $this->email->print_debugger();
                        }
                        
                        $this->load->helper('url');
                        redirect('/Visiteur/AfficherCatalogue');    
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Visiteur/Inscription', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }  
                }
                else
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('Visiteur/Inscription', $DonneesInjectees);
                    $this->load->view('templates/PiedDePage');
                }
            }
        }

        public function seDeConnecter() 
        { 
            $this->session->sess_destroy();
            $this->load->helper('url');
            redirect('/Visiteur/AfficherCatalogue');
        }

        public function listerLesArticlesAvecPagination() 
        {
            $config = array();
            $config["base_url"] = site_url('Visiteur/listerLesArticlesAvecPagination');
            $config["total_rows"] = $this->ModeleArticle->nombreDArticles();
            $config["per_page"] = 3;
            $config["uri_segment"] = 3;

            $config["first_link"] = "<span class='glyphicon glyphicon-backward'></span> ";
            $config["last_link"] = " <span class='glyphicon glyphicon-forward'></span>";
            $config["next_link"] = "  <span class='glyphicon glyphicon-chevron-right'></span>";
            $config["prev_link"] = "<span class='glyphicon glyphicon-chevron-left'></span>  ";

            $this->pagination->initialize($config);

            $noPage = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $DonneesEnvoyees['TitreDeLaPage'] = 'De fil en aiguille trouvez votre petit bonheur par ici';
            $DonneesEnvoyees['LesProduits'] = $this->ModeleArticle->retournerArticlesLimite($config["per_page"], $noPage);
            $DonneesEnvoyees['liensPagination'] = $this->pagination->create_links();
            $this->load->view('templates/Entete');
            $this->load->view('Visiteur/CatalogueAvecPagination', $DonneesEnvoyees);
            $this->load->view('templates/PiedDePage');  
        }
    }
?>