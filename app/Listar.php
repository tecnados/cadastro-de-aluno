<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Listar
 *
 * @author Gledson
 */
class Listar {

    function dadosTabela($columns, $draw, $search) {
        global $_SG;
        // Monta uma consulta SQL (query) para procurar dados da tabela
        $busca = strtoupper($search);

        if (empty($busca)) {
            $sql = "SELECT id, codigo, contador FROM produto ORDER BY id";
        } else {
            $sql = "SELECT `id`, `codigo`, `contador` FROM `produto` WHERE `codigo` LIKE '" . $busca . "%'";
        }
        $query = mysqli_query($_SG['link'], $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $result['data'][] = $row;
        }
        $result['draw'] = (empty($draw) ? 1 : $draw);
        $result['recordsFiltered'] = count($result['data']);
        $result['recordsTotal'] = count($result['data']);
        echo json_encode($result);
    }

}
