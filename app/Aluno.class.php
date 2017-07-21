<?php
require_once 'Conexao.php';
/**
 * Description of Aluno
 *
 * @author Gledson
 */
class Aluno {

    private $con;
    private $idAluno;
    private $nome;
    private $cpf;
    private $idade;

    public function __construct() {
        $this->con = new Conexao();
    }

    public function __set($atributo, $valor) {

        $this->$atributo = $valor;
    }

    public function __get($atributo) {

        return $this->$atributo;
    }
    public function insertAluno($dados) {
        $this->nome = $dados['nome'];
        $this->cpf = $dados['cpf'];
        $this->idade = $dados['idade'];
    }
    public function updateAluno($dados) {
        
    }
    public function deleteAluno($dados) {
        
    }
    
    
    
    

}
