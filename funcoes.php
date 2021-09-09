<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);
    return $jsonArray;

}

function buscarFuncionário ($funcionarios, $pesquisa){
    
    $funcionariosFiltro = [];

    foreach ($funcionarios as $funcionario) {
        if (strpos($funcionario->first_name, $pesquisa) !== false) {
            $funcionariosFiltro[] = $funcionario;
        } elseif (strpos($funcionario->last_name, $pesquisa) !== false) {
            $funcionariosFiltro[] = $funcionario;
        } elseif (strpos($funcionario->department, $pesquisa) !== false) {
            $funcionariosFiltro[] = $funcionario;
        } 
    }
    return $funcionariosFiltro;
    
}

