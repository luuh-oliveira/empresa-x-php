<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArray = json_decode($arquivo);
    return $arquivoArray;

}

function buscarFuncionário ($funcionarios, $pesquisa){
    
    $funcionariosFiltro = [];

    foreach ($funcionarios as $funcionario) {
        if (
            strpos($funcionario->first_name, $pesquisa) !== false
            ||
            strpos($funcionario->last_name, $pesquisa) !== false
            ||
            strpos($funcionario->department, $pesquisa) !== false
        ) {
            $funcionariosFiltro[] = $funcionario;
        } 
    }
    return $funcionariosFiltro;
    
}

function adicionarFuncionario($nomeArquivo, $novoFuncionario){
    
    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);

}