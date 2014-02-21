<?php

/*
 * Description of Fuzil
 *
 * @author Denis Alustau
 */
require_once 'Arma.php';

class Fuzil extends Arma {

    protected $quantidadeMunicao;
    protected $dano = 80;
    protected $preco = 1500;
    public function __construct($attributes = null) {
        if(is_array($attributes)){
            foreach ($attributes as $key => $value){
                $this->{$key} = $value;
            }
            
        } else {
            $this->quantidadeMunicao = $attributes;
        }
    }

    public function usar($inimigoNome) {
        $municao = ($this->quantidadeMunicao - 3);
        $this->quantidadeMunicao = $municao;
        
        echo '<br>Deu um tiro de '.__CLASS__.' contra '.$inimigoNome;
        
        return $this->dano;
    }

    public function getQuantidadeMunicao() {
        return $this->quantidadeMunicao;
    }

    public function setQuantidadeMunicao($municao) {
        $this->quantidadeMunicao = $municao;
    }
}
