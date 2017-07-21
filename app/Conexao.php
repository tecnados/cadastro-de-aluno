<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connect
 *
 * @author Gledson
 */
class Conexao {

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'cfcsystem';
    public $dbc;

    public function connect() {
        $this->dbc = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error: não é possivel se conectar ao Banco de dados');
    }

    public function query($sql) {
        return mysqli_query($this->dbc, $sql) or die('Erro query do Banco de dados');
    }

    public function fetch($sql) {
        $array = mysqli_fetch_array($this->query($sql));
        return $array;
    }

    public function close() {
        return mysqli_close($this->dbc);
    }

}
