<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);
    return $jsonArray;

}

function buscarFuncionário ($funcionarios, $pesquisa){
    
    $funcionariosFiltro = [];

    foreach ($funcionarios as $funcionario) {
        if ($funcionario->first_name == $pesquisa) {
            $funcionariosFiltro[] = $funcionario;
        } elseif ($funcionario->last_name == $pesquisa) {
            $funcionariosFiltro[] = $funcionario;
        } elseif ($funcionario->department == $pesquisa) {
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
    
}

