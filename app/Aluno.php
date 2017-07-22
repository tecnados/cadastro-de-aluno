<?php

/*
 * Cria os metodos para interação com os Alunos!
 */

require_once 'Conexao.php'; // Requisita a variavel de conexão $conn

if ($_REQUEST['metodo'] == 'listar') { // Se for o metodo listar dos alunos executa a função selectAlunos()!
    $draw = filter_input(INPUT_POST, 'draw', FILTER_SANITIZE_NUMBER_INT);
    $search = filter_input(INPUT_POST, 'search', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    selectAlunos($conn, $draw, $search);
}
if ($_REQUEST['metodo'] == 'cadastrar') { // Se for o metodo cadatrar aluno executa a função insertAluno()!
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $idade = $_REQUEST['idade'];

    insertAluno($conn, $nome, $cpf, $idade);
}
if ($_REQUEST['metodo'] == 'editar') { // Se for o metodo editar aluno executa a função updateAluno()!
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $idade = $_REQUEST['idade'];

    updateAluno($conn, $id, $nome, $cpf, $idade);
}
if ($_REQUEST['metodo'] == 'excluir') { // Se for o metodo excluir aluno executa a função removeAluno()!
    $id = $_REQUEST['id'];

    removeAluno($conn, $id);
}
if ($_REQUEST['metodo'] == 'aluno') { // Se for o metodo aluno ele busca o aluno executando a função selectAluno()!
    $id = $_REQUEST['id'];

    selectAluno($conn, $id);
}

/**
 * Função retorna os dados para listagem dos alunos!
 */
function selectAlunos($conn, $draw, $search) {
    // Monta uma consulta SQL (query) para procurar dados da tabela
    $busca = strtoupper($search);

    if (empty($busca)) {
        $sql = "SELECT id, nome, cpf, idade FROM aluno ORDER BY nome";
    } else {
        $sql = "SELECT `id`, `nome`, `cpf`, `idade` FROM `aluno` WHERE `nome` LIKE '" . $busca . "%'";
    }
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $result['data'][] = $row;
    }
    $result['draw'] = (empty($draw) ? 1 : $draw);
    $result['recordsFiltered'] = count($result['data']);
    $result['recordsTotal'] = count($result['data']);
    echo json_encode($result);
}

/**
 * Função retorna os dados do aluno do banco de dadoa!
 */
function selectAluno($conn, $id) {

    $sql = "SELECT id, nome, cpf, idade FROM aluno WHERE id=" . $id;
    $query = mysqli_query($conn, $sql);
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $result['data'][] = $row;
    }
    if ($result) {
        echo json_encode($result);
    } else {
        echo 'Erro na consulta de aluno';
    }
}

/**
 * Função inseri aluno no banco de dados!
 */
function insertAluno($conn, $nome, $cpf, $idade) {
    $sql = "INSERT INTO aluno(nome, cpf, idade) VALUES('" . $nome . "', '" . $cpf . "', '" . $idade . "')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Aluno cadastrado com sucesso!';
    } else {
        echo 'Erro ao cadastrar: CPF já cadastrado!';
    }
}

/**
 * Função atualiza dados do aluno no banco de dados!
 */
function updateAluno($conn, $id, $nome, $cpf, $idade) {
    $sql = "UPDATE aluno
            SET nome = '" . $nome . "', cpf = '" . $cpf . "', idade = '" . $idade . "'
            WHERE id =" . $id;
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Edição realizada com sucesso!';
    } else {
        echo 'Erro ao editar!';
    }
}

/**
 * Função remove aluno do banco de dados!
 */
function removeAluno($conn, $id) {
    $sql = "DELETE FROM aluno WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Aluno excluido com sucesso!';
    } else {
        echo 'Erro ao excluir aluno!';
    }
}
