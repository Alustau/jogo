<?php

/*
 * @author Denis Alustau

  */
require_once 'Arma.php';

//herda as caracteristicas da classe abstrata Arma
class Espada extends Arma {
    protected $tamanho;
    protected $dano = 50;

    //construtor de Espada
    public function __construct($attributes = null) {
        //se for um array
        if(is_array($attributes)){
            //varre o array colocando os valores nos atributos da classe 
            foreach ($attributes as $key => $value){
                $this->{$key} = $value;
            }
            //senão for um array
        } else {
            $this->tamanho = $attributes;
        }
    }
    /* implementando o metodo herdado da classe abstrata Arma, aqui posso implementar
       da forma que uma espada é usada */
    public function usar($nomeDoInimigo) {
        echo '<br>Usuou a '.__CLASS__.' contra '.$nomeDoInimigo;
        return $this->dano;
    }
}
