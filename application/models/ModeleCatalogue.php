<?php
  class ModeleCatalogue extends CI_Model
  {
      public function __construct()
      {
          $this->load->database();
      }

      public function retournerJoueurs($pRefJoueur = FALSE)
      {
          if($pRefJoueur === FALSE)
          {
              $requete = $this->db->get('joueur');
              return $requete->row_array();
          }
      }
    }
?>
