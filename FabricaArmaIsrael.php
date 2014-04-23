<?php

/*Nesta classe eu estou implementando dois padroes de projeto:
 * Singleton: A aplicação obtem uma única instancia desse objeto;
 * Factory Method:  
 
 */

/**
 * Description of FabricaArmaIsrael
 *
 * @author Denis Alustau
 */
require_once 'FabricaArma.php';
//essa classe herda da classe abstrata FabricaArma
class FabricaArmaIsrael extends FabricaArma {
    //esse atributo tem que ser estático e privado porque ela vai ser unica na aplicação
    private static $instance;
    private static $estoqueFuzil = 3;
    private static $estoqueEspada = 12;
    protected $carteira = 5000;
    
//    public static function  getEstoqueFuzil() 
//    {
//        return self::$estoqueFuzil;
//    }


    //construtor privado para não poder ser instanciado, a não ser atraves do metodo abaixo
    private function __construct() {}
    
    /* como não podemos instanciar essa classe em outros lugares pois o seu 
     * construtor é privado, temos que pegar a instancia atraves desse metodo */
    public static function getInstance()
    {
        //se não tem nenhuma instancia, cria uma instancia e guarda 
        if (!self::$instance) {
            //instancia ela mesma
            self::$instance = new self();
        }
        //retorna a instania
        return self::$instance;
    }
    
    /* Obtem a instancia de acordo com os parametros passado abaixo
     * $tipo = O nome do objeto que quer obter a instancia 
     * $parametros = Os parametros do objeto pode ser uma array
     * Obs: Esse metodo é o Factory Method, pois ele é o responsavel pela c*/
    public function getArma($tipo, $parametros = null) 
    {
         switch($tipo) {
           case 'Fuzil':
               return new Fuzil($parametros); 
           case 'Espada':
               return new Espada($parametros);
           default: 
               /* se não existir o objeto passado pelo o tipo, lança uma exceção 
                * dizendo que que não existe esse objeto nessa Fabrica */
               throw new Exception('Esse tipo de arma nao existe nessa Fabrica!');
       }
    }
    /* Esse metodo é pra retirar do estoque uma arma, que vai ser usada la
       no metodo comprar de Personagem */
    public function venderArma($tipo)
    {
        switch($tipo) {
            case 'Fuzil':
                //verifica se o estoque de Fuzil é maior que zero 
                if(self::$estoqueFuzil <= 0) {
                    throw new Exception('Estoque de '.$tipo.' esta vazio!');
                }
                /* Obs: a quantidade de fuzil está estatico, ou seja, caso houvesse
                * uma conexão com o banco de dados, poderia alterar o valor do 
                * estoque na propria tabela */

                //pega uma instancia do objeto atraves do Factory Method
                $valorFuzil = self::getArma($tipo)->getPreco();
                //aqui adiciona na carteira o valor do Fuzil.
                $this->carteira += $valorFuzil; 
                //retira do estoque o fuzil
                self::$estoqueFuzil--;
                //retorna a quantidade de estoque

                return true;

            case 'Espada':
                if(self::$estoqueEspada <= 0) {
                    throw new Exception('Estoque de '.$tipo.' esta vazio!');
                }

                $valorEspada = self::getArma($tipo)->getPreco();
                $this->carteira += $valorEspada; 
                self::$estoqueEspada--; 

                return true;
            default:
                throw new Exception('Esse tipo de arma nao existe');
        }
    }
    
    public function getEstoqueFuzil() {
        return self::$estoqueFuzil;
    }
    public function setEstoqueFuzil($quantidade){
        $this->estoqueFuzil = $quantidade;
    }
   
}
