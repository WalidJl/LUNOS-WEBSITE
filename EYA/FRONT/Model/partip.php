<?php 

  class partip{
      private  $id ;
      private  $nom ;
   private  $prenom ;
       private  $idev ;
      
      
      function __construct( $id, $nom,$prenom,$idev){
         

         $this->id=$id;
         $this->nom=$nom;
         $this->prenom=$prenom;
         $this->idev=$idev;
     
         
      }
      
      function getid(){
         return $this->id;
      }
      function getnom(){
         return $this->nom;
      }
      function getprenom() {
         return $this->prenom;
      }
     
       function getidev() {
         return $this->idev;
      }
      

      
      
   }



?>