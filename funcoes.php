<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArray = json_decode($arquivo);
    return $arquivoArray;

}

function buscarFuncionario ($funcionarios, $pesquisa){
    
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

function deletarFuncionário($nomeArquivo, $idFuncionario)
{
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));
    file_put_contents($nomeArquivo, $json);

}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario)
{
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            return $funcionario;
        }
    }

    return false;

}

function editarFuncionario($nomeArquivo, $funcionarioEditado)
{
    
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado["id"]) {
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $json = json_encode(array_values($funcionarios));
    file_put_contents($nomeArquivo, $json);

}

function realizarLogin($usuario, $senha, $dados)
{
    foreach ($dados as $dado) {
        if ($dado->usuario == $usuario && $dado->senha == $senha) {
            
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date("d/m/Y - h:i:s");

            header("location: funcionarios.php");
            exit;

        } 
        
    }
    
    header("location: index.php");
}

function verificarLogin()
{
    if(($_SESSION["id"] != session_id()) || (empty($_SESSION["id"]))){
        header("location: index.php");
    }

}

function finalizarLogin()
{
    session_unset();
    session_destroy();

    header("location: index.php");
}