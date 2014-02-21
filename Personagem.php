<?php

/*
 *  @author Denis Alustau 
 */
require_once 'FabricaArma.php';
require_once 'FabricaArmaIsrael.php';


abstract class Personagem {
    protected $ataque = 10;
    protected $nome;
    protected $life = 100;
    protected $arma;
    protected $armasValidas;
    protected $carteira;
    protected $precisao;
    
    /* este metodo vai ser implementando em cada tipo de Personagem, porque cada um 
       tem sua maneira de atacar */
    abstract public function atacar(Personagem $inimigo);

    abstract public function falar();
    
    /* Este metodo implementa o ataque de acordo com a precisao, como o metodo 
     * atacar cada tipo de personagem implementa o seu, e a precisao é igual pra 
     * todos, coloquei a precisao aqui, e chamei o metodo atacar.
     * Desse jeito quanto maior a precisao, maior é a chance de acertar o ataque
     * no inimigo que também é um Personagem */
    public function ataque(Personagem $inimigo){
        
        $precisao = $this->precisao;
        //pega um numero aleatorio entre 1 e 10
        $numeroRand = rand(1,10);
        //se esse numero for menor ou igual a precisao do personagem 
        if($numeroRand <= $precisao){ 
            //o personagem ataca
            return $this->atacar($inimigo);
        //senao ele erra o ataque 
        }else{
            echo '<br>'. $this->getNome() .' errou o ataque';
            return false;
        }
        
    }
    public function getArma() {
        return $this->arma;
    }
    
    //Este metodo seta a arma de acordo com as armas validas 
    public function setArma(Arma $arma){
        //se arma passada nao existir dentro do array armasValidas 
        if (!in_array(get_class($arma), (array) $this->armasValidas)) {
            //cria uma exceção com a mensagema abaixo
            throw new Exception($this->nome.' nao pode usar arma do tipo ' . get_class($arma));
        }
        //coloca a arma no Personagem 
        $this->arma = $arma;
        echo '<br>'.$this->nome.' comprou um(a) '.get_class($arma);
        
        return true;
    }
    
    /* Este metodo abaixo faz uma compra a uma fabrica!
     * 
     * Parametros: FabricaArma $fabricaArma: A fabrica em que vai se fazer a compra;
     * $tipoDeArma: O tipo da arma;
     * $parametros : pode ser um array com os atributos da arma 
     */
    public function comprar(FabricaArma $fabricaArma,$tipoDeArma, $parametros = null){    
        //guarda a carteira
        $carteira = $this->carteira;
        //se tiver dinheiro na carteira 
        if($carteira > 0 ){
            //se ja tiver arma 
            if($this->arma != null){
                //cria uma exceção com a mensagem abaixo
                throw new Exception('Voce ja possui um(a) '.  get_class($this->arma));
            //se não tiver arma
            }else{
                //pega uma arma atraves do Factory Method com o tipo e os parametros
                $arma = $fabricaArma->getArma($tipoDeArma,$parametros);
                //se existir a arma 
                if($arma){
                    //pega o valor dela
                    $valorArma = $arma->getPreco();
                    
                    /* se o valor da arma eh menor ou igual do que o valor que 
                     * esta na carteira */
                    if($valorArma <= $this->carteira){
                        
                        $aux = $fabricaArma->venderArma(get_class($arma));
                        //se setar a arma
                        if($aux){
                            if($this->setArma($arma)){
                            //retira o valor da arma da carteira
                            $this->carteira -= $valorArma;
                            //retira do estoque da fabrica  
                            }
                        }
                        
                    //senao ele cria uma exceção com a mensagem abaixo    
                    }else{
                        throw new Exception('Voce nao possui dinheiro suficiente para compra um(a)'.  get_class($arma));
                    }
                }
            }
        //senao ele cria uma exceção com a mensagem abaixo
        }else{
            throw new Exception('Voce esta sem dinheiro na carteira');
        }
    }
    
    public function getLife(){
        return $this->life;
    }
    
    public function setLife($life){
        $this->life = $life;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getCarteira(){
        return $this->carteira;
    }
    
    public function setCarteira($carteira){
        $this->carteira = $carteira;
    }
    
    public function getPrecisao(){
        return $this->precisao;
    }
    
    public function setPrecisao($precisao){
        $this->precisao = $precisao;
    }
    
//    public function __get($name)
//    {
//        if (!property_exists($this, 'id') && $name == 'id') {
//            $name = $this->_primary;
//        }
//        if (property_exists($this, $name)) {
//            return $this->$name;
//        }
//    }
//    
//    public function __set($name, $value)
//    {
//        $methodName = 'set';
//        if (strstr($name, '_')) {
//            $parts = explode('_', $name);
//            foreach($parts as $part) {
//                $methodName .= ucfirst($part);
//            }
//        }
//    }

}
