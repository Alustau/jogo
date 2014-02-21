<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Description of Soldado
 *
 * @author Denis Alustau
 */
require_once 'Personagem.php';
require_once 'Arma.php';

class Soldado extends Personagem {
    protected $ataque = 5;
    protected $carteira = 3000;
    protected $armasValidas = array(
        'Fuzil'
    );
    protected $precisao = 3;
    public function __construct($attributes = null) {
        if(is_array($attributes)){
            foreach ($attributes as $key => $value){
                $this->{$key} = $value;
            }
        } else {
            $this->nome = $attributes;
        }
    }
    public function atacar(Personagem $inimigo) {
        
        $arma = $this->getArma();
        $inimigoLife = $inimigo->getLife();
        
        if($arma){
            $dano = $arma->usar($inimigo->getNome());
            $life = $inimigoLife - $dano;
            $inimigo->setLife($life);

            echo '<br>O life de '. $inimigo->getNome() .' foi para = '.$inimigo->getLife().'%';
        }else{
            $dano = $this->ataque;
            $life = $inimigoLife - $dano;
            $inimigo->setLife($life);
            echo '<br>'.$this->nome.' atacou '. $inimigo->getNome() .' com seus golpes.';
            echo '<br>O life de '. $inimigo->getNome() .' foi para = '.$inimigo->getLife().'%';
        } 
        
    }

    public function falar() {
        echo 'Eu sou um ' . __CLASS__ . '!';
    }

//    public function comer(){}
}
