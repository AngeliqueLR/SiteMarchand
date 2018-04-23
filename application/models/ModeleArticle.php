<?php
    class ModeleArticle extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function retournerProduit($pNoProduit = FALSE)
        {
            if($pNoProduit === FALSE)
            {
                $this->db->select('NOPRODUIT, LIBELLE, PRIXHT, TAUXTVA, NOMIMAGE, NOMIMAGEBIS');
                $requete = $this->db->get('produit');

                return $requete->result_array();
            }

            $this->db->select('LIBELLE, PRIXHT, TAUXTVA, QUANTITEENSTOCK, NOMIMAGE, NOMIMAGEBIS, DETAIL');
            $requete = $this->db->get_where('produit', array('NOPRODUIT' => $pNoProduit));

            return $requete->row_array();
        }

        public function insererUnProduit($pDonneesAInserer)
        {
            return $this->db->insert('PRODUIT', $pDonneesAInserer);
        }

        public function retournerArticlesLimite($nombreDeLignesARetourner, $noPremiereLigneARetourner)
        {
            $this->db->limit($nombreDeLignesARetourner, $noPremiereLigneARetourner);
            $requete = $this->db->get("PRODUIT");

            if($requete->num_rows() > 0)
            {
                foreach ($requete->result() as $ligne)
                {
                    return $requete->result_array(); 
                }
            }
            return false;
        }

        public function nombreDArticles() 
        {
            return $this->db->count_all("PRODUIT");
        }

        public function retournerArticlesParCategorie($pCategorieChoisie)
        {
            $this->db->select('NOPRODUIT, LIBELLE, PRIXHT, TAUXTVA, NOMIMAGE, NOMIMAGEBIS');
            $requete = $this->db->get_where('produit', array('NOCATEGORIE' => $pCategorieChoisie));

            return $requete->row_array();
        }

        public function retournerArticlesParMarque($pMarqueChoisie)
        {
            $this->db->select('NOPRODUIT, LIBELLE, PRIXHT, TAUXTVA, NOMIMAGE, NOMIMAGEBIS');
            $requete = $this->db->get_where('produit', array('NOMARQUE' => $pMarqueChoisie));

            return $requete->row_array();
        }

        public function retournerArticlesParDates($pDate)
        {
            $this->db->select('NOPRODUIT, LIBELLE, PRIXHT, TAUXTVA, NOMIMAGE, NOMIMAGEBIS');
            $requete = $this->db->get_where('produit', array('DA' => $pMarqueChoisie));

            return $requete->row_array();
        }
    }
?>