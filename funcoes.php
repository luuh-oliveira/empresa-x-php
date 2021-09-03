<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);
    return $jsonArray;

}


