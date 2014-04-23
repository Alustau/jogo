<?php

//use Personagem;



require_once 'Samurai.php';
require_once 'Soldado.php';
require_once 'Fuzil.php';
require_once 'Espada.php';
require_once 'FabricaArmaIsrael.php';

$jogador1 = new Soldado('Denis');
$jogador2 = new Samurai('Kevin');

$fabricaArmaIsrael = FabricaArmaIsrael::getInstance();
try{
    $jogador1->comprar($fabricaArmaIsrael,'Espada');
}catch (Exception $e){
    $compra = '<br>'.$e->getMessage();
    echo $compra;
}
$jogador1->ataque($jogador2);


//try{
//    $jogador1->comprar($fabricaArmaIsrael,'Espada');
//}catch (Exception $e){
//    $compra = '<br>'.$e->getMessage();
//    echo $compra;
//}
//
//try{
//    $jogador1->comprar($fabricaArmaIsrael,'Fuzil',12);
//}catch (Exception $e){
//    $compra = '<br>'.$e->getMessage();
//}
//
//$jogador2->ataque($jogador1);
//echo '<br> Dinheiro da fabrica: '.$fabricaArmaIsrael->getCarteira();
//echo '<br> Dinheiro de '.$jogador2->getNome().' : '.$jogador2->getCarteira();
//$jogador1->atacar($jogador2);

//$jogador1->atacar($jogador2);

//echo '<br> Life do jogador2 = '.$jogador2->getLife();
//echo '<br>'.$jogador2->getLife();
//echo '<br>'.$personagem->getArma()->getQuantidadeMunicao();
//var_dump($personagem->getArma());


//echo '<br>O life de '.$jogador1->getNome().' eh '.$jogador1->getLife().'%';
//echo '<br>O life de '.$jogador2->getNome().' eh '.$jogador2->getLife().'%';
//echo '<br>O Dinheiro de '.$jogador1->getNome().' eh R$'.$jogador1->getCarteira();
//echo '<br>O Dinheiro de '.$jogador2->getNome().' eh R$'.$jogador2->getCarteira();
//echo '<br>O Dinheiro da Fabrica '.$fabricaArmaIsrael->getCarteira();
//echo '<br>';
//echo rand(1,10);exit;