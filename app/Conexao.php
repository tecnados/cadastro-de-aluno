<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'cfcsystem';

function conectar($servidor, $usuario, $senha, $database) {
    $conn = mysqli_connect($servidor, $usuario, $senha) or die("MySQL: Não foi possível conectar-se ao servidor [" . $servidor . "].");
    mysqli_select_db($conn, $database) or die("MySQL: Não foi possível conectar-se ao banco de dados [" . $database . "].");
    return $conn;
}

$conn = conectar($servidor, $usuario, $senha, $database);
