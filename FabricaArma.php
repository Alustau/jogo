<?php

/**
 * @author Denis Alustau

 *  */

abstract class FabricaArma {
    protected $carteira = 0;
    
    /* Estes dois metodos abstratos abaixo, são assinaturas, e serão implementados
     * nas classes concretas que extender essa classe */
    abstract public function getArma($tipo, $parametros = null);
    abstract public function venderArma($tipo);
    
    //retorna o dinheiro
    public function getCarteira(){
        return $this->carteira;
    }
    public function setCarteira($quantidade){
        $this->carteira = $quantidade;
    }
}
