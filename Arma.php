<?php

/*
 * @author Denis Alustau

 *  */


abstract class Arma {
   protected $dano;
   protected $preco;
   
   /* Este metodo abstrato abaixo, é assinatura, e sera implementada
    * nas classes concretas que extender essa classe */
   abstract public function usar($nomeDoInimigo); 
   
   
   public function getPreco() {
      return $this->preco;
   }

   public function setPreco($preco) {
        $this->preco = $preco;
   }
  
   
   public function getDano(){
       return $this->dano;
   }
   

}
