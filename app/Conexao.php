<?php

/*
 * Estabelece a conexão com banco de dados MySQL!
 */
$servidor = 'localhost'; // Inseri host
$usuario = 'root'; // Inseri usuário
$senha = ''; // Inseri senha
$database = 'cfcsystem'; // Inseri banco de dados

function conectar($servidor, $usuario, $senha, $database) {
    $conn = mysqli_connect($servidor, $usuario, $senha) or die("MySQL: Não foi possível conectar-se ao servidor [" . $servidor . "].");
    mysqli_select_db($conn, $database) or die("MySQL: Não foi possível conectar-se ao banco de dados [" . $database . "].");
    return $conn;
}

$conn = conectar($servidor, $usuario, $senha, $database); // Adicionar a conexão com banco na variavel conn!
