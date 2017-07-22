<?php

require_once 'Conexao.php';

if ($_REQUEST['metodo'] == 'listar') {
    $draw = filter_input(INPUT_POST, 'draw', FILTER_SANITIZE_NUMBER_INT);
    $search = filter_input(INPUT_POST, 'search', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    selectAlunos($conn, $draw, $search);
}
if ($_REQUEST['metodo'] == 'cadastrar') {
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $idade = $_REQUEST['idade'];

    insertAluno($conn, $nome, $cpf, $idade);
}
if ($_REQUEST['metodo'] == 'editar') {
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $idade = $_REQUEST['idade'];

    updateAluno($conn, $nome, $cpf, $idade);
}
if ($_REQUEST['metodo'] == 'excluir') {
    $id = $_REQUEST['id'];

    removeAluno($conn, $id);
}

/**
 * Função que retorna os dados da tabela!
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

function insertAluno($conn, $nome, $cpf, $idade) {
    // Monta uma consulta SQL (query) para inserir codigo
    $sql = "INSERT INTO aluno(nome, cpf, idade) VALUES('" . $nome . "', '" . $cpf . "', '" . $idade . "')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Aluno cadastrado com sucesso!';
    } else {
        echo 'Erro ao cadastrar: CPF já cadastrado!';
    }
}

function updateAluno($conn, $id, $nome, $cpf, $idade) {
    // Monta uma consulta SQL (query) para inserir codigo
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

function removeAluno($conn, $id) {
    // Monta uma consulta SQL (query) para inserir codigo
    $sql = "DELETE FROM aluno WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo 'Aluno excluido com sucesso!';
    } else {
        echo 'Erro ao excluir aluno!';
    }
}
