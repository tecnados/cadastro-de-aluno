<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conectar
 *
 * @author Gledson
 */
define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__) . DS);
require_once BASE_URL . 'config.php';

class Model {

//private $db = $bancoDados;

    public function conect($db) {// Estabelece a conexão com o banco de dados
        $conexao = mysql_connect($bancoDados['servidor'], $bancoDados['usuario'], $bancoDados['senha']) or die("Não foi possível conectar-se com o banco de dados");
        return mysql_select_db($bancoDados['database'], $conexao) or die("Não foi possível encontrar a database " . $bancoDados['database']);
    }

    public function conectar($param) {

    }

}
