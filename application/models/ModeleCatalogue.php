<?php
  class ModeleCatalogue extends CI_Model
  {
      public function __construct()
      {
          $this->load->database();
      }

      public function retournerProduit($pNoProduit = FALSE)
      {
        if($pNoProduit === FALSE)
        {
            $this->db->select('LIBELLE, PRIXHT, TAUXTVA, QUANTITEENSTOCK, NOMIMAGE');
            $requete = $this->db->get('produit');

            return $requete->result_array();
        }

        $this->db->select('LIBELLE, PRIXHT, TAUXTVA, QUANTITEENSTOCK, NOMIMAGE, DETAIL');
        $requete = $this->db->get_where('produit', array('NOPRODUIT' => $pNoProduit));

        return $requete->row_array();
      }
    }
?>
